<?php
session_start();
include 'lib/conexion.php';

ini_set('error_reporting', 0);
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='img/icon_dog.png' rel='shortcut icon' type='image/png'>
    <link rel="stylesheet" href="css/mis_mascotas.css" />
    <title>Mi peek | Mis Mascotas</title>
</head>

<body>
    <header>
        <a href="index.php"><img src="img/Logo_MiPeek.png" alt="Logo Mi Peek" class="logo" /></a>
        <nav class="nav_menu">
            <a href="mis_mascotas.php" class="nav_menu-btn">Mis mascotas</a>
            <a href="mis_citas.php" class="nav_menu-btn">Historial</a>
            <a href="mapa.php" class="nav_menu-btn">Agendar</a>
            <a href="home_usuario.php" class="nav_menu-btn"><img src="img/Perfil.png" alt="logo perfil" /></a>
        </nav>
    </header>
    <main>
        <h1>Mis Mascotas</h1>
        <div class="mascotas">
            <?php
            $idDuenio = $_SESSION['id'];
            $cadena = "SELECT mascota.* FROM mascota, duenio_mascota WHERE (duenio_mascota" . "." . "Id_Mascota = mascota" . "." . "Id_Mascota AND duenio_mascota" . "." . "Id_Duenio = $idDuenio); ";
            $query = mysqli_query($conexion, $cadena);
            while ($row = mysqli_fetch_array($query)) {
                echo '<div class = "mascota">';
                echo '<a href="perfil_mascota.php/?id=' . $row['Id_Mascota'] . '"><img src="img/default_mascota.png" /></a>';
                echo '<h2>' . $row['Nombre'] . '</h2>';
                echo '</div>';
            }
            ?>
        </div>
        <div class="btn">
            <a href="registro_mascota.php" class="registrar">Registrar Mascota</a>
        </div>
    </main>
</body>

</html>