<html>
<head>
<title>LOGIN VINILOS</title>
</head>
<body>
<?php
# Creamos sesión
session_start();

require('connection.php');

$user = $_POST['user'];
$passwd = $_POST['pwd'];

$stmt = $conn->prepare('SELECT contrasena FROM users WHERE nombre_usuario = ?;');
$stmt->bind_param("s", $user);
$stmt->execute();
$resultado = $stmt->get_result();

$fila = $resultado->fetch_assoc();

if ($fila) {
    // Verificar la contraseña usando password_verify
    if (password_verify($passwd, $fila['contrasena'])) {
        echo "Login correcto";
        $_SESSION['login'] = 1;
        $_SESSION['user'] = $user;
        // Redirigir a la página de vinilos
        header('Location: vinilos.php');
        exit();
    } else {
        echo "Login incorrecto. Contraseña incorrecta.";
    }
} else {
    echo "Login incorrecto. Usuario no encontrado.";
}

echo $_SESSION['login'];
echo $_SESSION['user'];

$stmt->close();
$conn->close();
?>  
<a href='vinilos.php'>Ir a la principal</a>
</body>
</html>

