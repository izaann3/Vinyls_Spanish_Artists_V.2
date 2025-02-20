<?php
session_start();
require('connection.php');

if (isset($_POST['submit'])) {

    $nombre_vinilo = $_POST['nombre_vinilo'];
    $nombre_artista = $_POST['nombre_artista'];
    $genero = $_POST['genero'];
    $precio = $_POST['precio'];
    $fecha_lanzamiento = $_POST['fecha_lanzamiento'];
    $url_imagen = $_POST['url_imagen'];

    $stmt = $conn->prepare("INSERT INTO vinyls (nombre_vinilo, nombre_artista, genero, precio, fecha_lanzamiento, url_imagen) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nombre_vinilo, $nombre_artista, $genero, $precio, $fecha_lanzamiento, $url_imagen);

    if ($stmt->execute()) {
        echo "Vinilo agregado con éxito.";
    } else {
        echo "Error al agregar el vinilo: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No se enviaron datos del formulario.";
}
?>

<a href='vinilos.php'>Volver a la página principal</a>
