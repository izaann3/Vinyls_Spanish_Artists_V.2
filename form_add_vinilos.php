<?php
session_start();
if ($_SESSION['login'] != 1) {
    header('Location:vinilos.php');
    exit();
}
?>
<html>
<head>
<title>AÑADIR VINILO</title>
<link rel="stylesheet" href="añadir.css">
</head>
<body>
<div class="container">
    <h1>AGREGAR VINILO NUEVO</h1>
    <form action="add_vinilos.php" method="POST">
        
        <div class="input-group">
            <input type="text" id="nombre_vinilo" name="nombre_vinilo" placeholder="Nombre del Vinilo" required>
        </div>

        <div class="input-group">
            <input type="text" id="nombre_artista" name="nombre_artista" placeholder="Nombre del Artista" required>
        </div>

        <div class="input-group">
            <input type="text" id="genero" name="genero" placeholder="Género">
        </div>

        <div class="input-group">
            <input type="text" id="precio" name="precio" placeholder="Precio" required>
        </div>

        <div class="input-group">
            <input type="date" id="fecha_lanzamiento" name="fecha_lanzamiento" placeholder="Fecha de Lanzamiento">
        </div>

        <div class="input-group">
            <input type="text" id="url_imagen" name="url_imagen" placeholder="URL de la Imagen">
        </div>

        <div class="input-group">
            <input type="submit" name="submit" value="Agregar Vinilo">
        </div>
        
    </form>
</div>
</body>
</html>

