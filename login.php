<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="login-register.css">
</head>
<body>
    <div class="login-container">
        <?php
        session_start();
        require('connection.php');
        ?>
        <h1>INICIAR SESIÓN</h1>
        <form action="do_login.php" method="POST">
            <div class="input-group">
                <input type="text" name="user" placeholder="Usuario" required>
            </div>
            <div class="input-group">
                <input type="password" name="pwd" placeholder="Contraseña" required>
            </div>
            <input type="submit" name="submit" value="LOGIN">
        </form>
        <p class="register-link">¿No tienes cuenta? <a href="register.php">Regístrate</a></p>
    </div>
</body>
</html>

