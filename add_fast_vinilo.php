<?php
session_start();
if ($_SESSION['login'] != 1) {
    header('Location: vinilos.php');
    exit();
}

require('connection.php');

$nombre = 'Casanova Deluxe';
$artista = 'Recycled J';
$genero = 'Hip Hop';
$precio = 20.00;
$fecha_lanzamiento = '01/12/2024';
$imagen = 'https://cdn.grupoelcorteingles.es/SGFM/dctm/MEDIA03/202309/04/00105112232672____2__1200x1200.jpg';

$date = DateTime::createFromFormat('d/m/Y', $fecha_lanzamiento);
if ($date === FALSE) {
    echo "La fecha de lanzamiento no es válida. Asegúrate de que esté en el formato dd/mm/yyyy.";
    exit();
}

$fecha_lanzamiento_mysql = $date->format('Y-m-d');

$query = "INSERT INTO vinyls (nombre_vinilo, nombre_artista, genero, precio, fecha_lanzamiento, url_imagen) 
          VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssssss", $nombre, $artista, $genero, $precio, $fecha_lanzamiento_mysql, $imagen);

if ($stmt->execute()) {
    echo "Vinilo agregado correctamente.";
    header("Location: vinilos.php");
    exit;
} else {
    echo "Error al agregar el vinilo: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

