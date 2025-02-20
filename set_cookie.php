<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['artist'])) {
    $artist = htmlspecialchars($_POST['artist'], ENT_QUOTES, 'UTF-8');
    setcookie("favorite_artist", $artist, time() + 10, "/");
    header("Location: vinilos.php");
    exit();
}
?>

