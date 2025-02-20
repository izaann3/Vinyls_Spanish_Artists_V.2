<html>
<head>
<title>FORM VINILOS</title>
</head>
<body>
<?php
#creamos sesion
session_start();

require('connection.php');

$user = $_POST['user'];
$passwd = $_POST['pwd'];
$hash = password_hash($passwd,PASSWORD_DEFAULT);

$stmt = $conn->prepare('INSERT INTO users (nombre_usuario,contrasena) VALUES (?,?);');
$stmt->bind_param("ss",$user,$hash);

$stmt->execute();

$stmt->close();
$conn->close();
//$registros = $conn->query($query);
echo "registro completado"
?>	
<a href='vinilos.php'>ir a principal</a>
</body>
</html>
