<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO</title>
    <link rel="stylesheet" href="login-register.css">
</head>
<body>
    <div class="login-container">
        <?php
        session_start();
        require('connection.php');
        ?>
        <h1>REGISTRARSE</h1>
        <form action="do_register.php" method="POST">
            <div class="input-group">
                <input type="text" name="user" placeholder="Usuario" required>
            </div>
            <div class="input-group">
                <input type="password" name="pwd" placeholder="Contraseña" required>
            </div>
            <input type="submit" name="submit" value="REGISTRAR">
        </form>
        <p class="register-link">¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
    </div>
</body>
</html>

