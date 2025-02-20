<?php
session_start();
require('connection.php');

$query = "SELECT * FROM vinyls;";
$registros = $conn->query($query);

$array_vinilos = [];
if ($registros->num_rows > 0) {
    while ($fila = $registros->fetch_assoc()) {
        $array_vinilos[] = $fila;
    }
}

if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];

    switch ($filter) {
        case 'artista_asc':
            usort($array_vinilos, function ($a, $b) {
                return strcmp($a['nombre_artista'], $b['nombre_artista']);
            });
            break;
        case 'artista_desc':
            usort($array_vinilos, function ($a, $b) {
                return strcmp($b['nombre_artista'], $a['nombre_artista']);
            });
            break;
        case 'vinilo_asc':
            usort($array_vinilos, function ($a, $b) {
                return strcmp($a['nombre_vinilo'], $b['nombre_vinilo']);
            });
            break;
        case 'vinilo_desc':
            usort($array_vinilos, function ($a, $b) {
                return strcmp($b['nombre_vinilo'], $a['nombre_vinilo']);
            });
            break;
        case 'precio_asc':
            usort($array_vinilos, function ($a, $b) {
                return $a['precio'] - $b['precio'];
            });
            break;
        case 'precio_desc':
            usort($array_vinilos, function ($a, $b) {
                return $b['precio'] - $a['precio'];
            });
            break;
        case 'fecha_asc':
            usort($array_vinilos, function ($a, $b) {
                return strtotime($a['fecha_lanzamiento']) - strtotime($b['fecha_lanzamiento']);
            });
            break;
        case 'fecha_desc':
            usort($array_vinilos, function ($a, $b) {
                return strtotime($b['fecha_lanzamiento']) - strtotime($a['fecha_lanzamiento']);
            });
            break;
    }
}
?>

<html>
<head>
    <title>HOME</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="container">
        <img src="img/logoizeta.png" alt="IZETA3 VINILOS" class="logo-img">
     
    	<div class="question-container">
        <form action="set_cookie.php" method="POST">
            <label for="artist">¿Cuál es tu artista preferido?</label>
            <input type="text" name="artist" id="artist" placeholder="Escribe aquí..." required>
            <input type="submit" value="Guardar">
        </form>
        <?php
        if (isset($_COOKIE['favorite_artist'])) {
            echo "<div><strong>Tu artista preferido es: </strong>" . htmlspecialchars($_COOKIE['favorite_artist']) . "</div>";
        }
        ?>
    	</div>
    	
        <div class="filters-container">
            <form method="GET" action="vinilos.php">
                <select name="filter">
                    <option value="">Filtrar por...</option>
                    <option value="artista_asc" <?php if (isset($filter) && $filter == 'artista_asc') echo 'selected'; ?>>Artista A-Z</option>
                    <option value="artista_desc" <?php if (isset($filter) && $filter == 'artista_desc') echo 'selected'; ?>>Artista Z-A</option>
                    <option value="vinilo_asc" <?php if (isset($filter) && $filter == 'vinilo_asc') echo 'selected'; ?>>Vinilo A-Z</option>
                    <option value="vinilo_desc" <?php if (isset($filter) && $filter == 'vinilo_desc') echo 'selected'; ?>>Vinilo Z-A</option>
                    <option value="precio_asc" <?php if (isset($filter) && $filter == 'precio_asc') echo 'selected'; ?>>Precio (menor a mayor)</option>
                    <option value="precio_desc" <?php if (isset($filter) && $filter == 'precio_desc') echo 'selected'; ?>>Precio (mayor a menor)</option>
                    <option value="fecha_asc" <?php if (isset($filter) && $filter == 'fecha_asc') echo 'selected'; ?>>Fecha (más antigua a más nueva)</option>
                    <option value="fecha_desc" <?php if (isset($filter) && $filter == 'fecha_desc') echo 'selected'; ?>>Fecha (más nueva a más antigua)</option>
                </select>
                <input type="submit" value="Aplicar Filtro">
            </form>
        </div>

        <ul>
        <?php
        if (empty($array_vinilos)) {
            echo "<div class='no-vinyl-message'>No hay vinilos añadidos, ¡añade ya uno!</div>";
        } else {
            foreach ($array_vinilos as $vinilo) {
                echo "<li>
                        <div><strong>Nombre del vinilo:</strong> ".$vinilo['nombre_vinilo']."</div>
                        <div><strong>Nombre del artista:</strong> ".$vinilo['nombre_artista']."</div>
                        <div><strong>Género:</strong> ".$vinilo['genero']."</div>
                        <div><strong>Precio:</strong> ".$vinilo['precio']."</div>
                        <div><strong>Fecha de lanzamiento:</strong> ".$vinilo['fecha_lanzamiento']."</div>
                        <div><img src='".$vinilo['url_imagen']."' alt='".$vinilo['nombre_vinilo']."' style='max-width: 200px; height: auto;'></div>
                        <div class='btn-container'>
                            <form action='del_vinilo.php' method='POST' style='display:inline;'>
                                <input type='hidden' name='id' value='".$vinilo['id']."'>
                                <input type='submit' name='submit' value='ELIMINAR' class='small-btn'>
                            </form>
                            <form action='form_update_vinilos.php' method='POST' style='display:inline;'>
                                <input type='hidden' name='id' value='".$vinilo['id']."'>
                                <input type='submit' name='submit' value='EDITAR' class='small-btn'>
                            </form>
                        </div>
                    </li>";
            }
        }
        ?>
        </ul>

        <div class="login-register-btns">
            <a href="login.php" class="btn-link">Login</a>
            <a href="register.php" class="btn-link">Register</a>
        </div>

        <div class="add-vinyl-btn">
            <a href="form_add_vinilos.php" class="btn-link">Añadir</a>
            <a href="add_fast_vinilo.php" class="btn-link">Añadir Rápido</a>
        </div>
    </div>
</body>
</html>

