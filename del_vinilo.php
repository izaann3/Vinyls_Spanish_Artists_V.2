<?php
require('connection.php');

if (isset($_POST['submit'])) {
    $vinilo_id = $_POST['id'];

    $query = "DELETE FROM vinyls WHERE id = ?";
    if ($stmt = $conn->prepare($query)) {
        // Enlazar el parámetro
        $stmt->bind_param("i", $vinilo_id);
        
        if ($stmt->execute()) {
            header("Location: vinilos.php");
            exit;
        } else {
            echo "Error al eliminar el vinilo: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }
}

$conn->close();
?>

