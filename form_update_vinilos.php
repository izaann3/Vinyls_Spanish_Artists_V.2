<?php
session_start();
require('connection.php');

if ($_SESSION['login'] != 1) {
    header('Location: vinilos.php');
    exit();
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "SELECT * FROM vinyls WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $vinilo = $result->fetch_assoc();
    } else {
        echo "Vinilo no encontrado";
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        $nombre_vinilo = $_POST['nombre_vinilo'];
        $nombre_artista = $_POST['nombre_artista'];
        $genero = $_POST['genero'];
        $precio = $_POST['precio'];
        $fecha_lanzamiento = $_POST['fecha_lanzamiento'];
        $url_imagen = $_POST['url_imagen'];

        $updateQuery = "UPDATE vinyls SET nombre_vinilo = ?, nombre_artista = ?, genero = ?, precio = ?, fecha_lanzamiento = ?, url_imagen = ? WHERE id = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("ssssssi", $nombre_vinilo, $nombre_artista, $genero, $precio, $fecha_lanzamiento, $url_imagen, $id);

        if ($updateStmt->execute()) {
            header("Location: vinilos.php"); // Redirige a vinilos.php después de la actualización
            exit();
        } else {
            echo "Error al actualizar el vinilo: " . $conn->error;
        }
    }
} else {
    echo "ID no válido";
    exit();
}

$conn->close();
?>
<html>
<head>
    <title>Editar Vinilo</title>
    <link rel="stylesheet" href="añadir.css">
</head>
<body>
    <div class="container">
        <h1>EDITAR VINILO</h1>
        <form action="form_update_vinilos.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $vinilo['id']; ?>">

            <div class="input-group">
                <input type="text" name="nombre_vinilo" value="<?php echo $vinilo['nombre_vinilo']; ?>" placeholder="Nombre del Vinilo" required>
            </div>

            <div class="input-group">
                <input type="text" name="nombre_artista" value="<?php echo $vinilo['nombre_artista']; ?>" placeholder="Nombre del Artista" required>
            </div>

            <div class="input-group">
                <input type="text" name="genero" value="<?php echo $vinilo['genero']; ?>" placeholder="Género" required>
            </div>

            <div class="input-group">
                <input type="number" name="precio" value="<?php echo $vinilo['precio']; ?>" placeholder="Precio" required>
            </div>

            <div class="input-group">
                <input type="date" name="fecha_lanzamiento" value="<?php echo $vinilo['fecha_lanzamiento']; ?>" placeholder="Fecha de Lanzamiento" required>
            </div>

            <div class="input-group">
                <input type="text" name="url_imagen" value="<?php echo $vinilo['url_imagen']; ?>" placeholder="URL de la Imagen" required>
            </div>

            <div class="input-group">
                <input type="submit" name="update" value="Actualizar Vinilo">
            </div>
        </form>
    </div>
</body>
</html>

