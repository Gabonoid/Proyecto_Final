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
    <link rel="stylesheet" href="css/mis_citas.css">
    <title>Mi Peek | Mis Citas</title>
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
        <table class="tabla">
            <tr class="tabla_head">
                <th>Folio</th>
                <th>Mascota</th>
                <th>Veterinario</th>
                <th>Fecha</th>
                <th>Horario</th>
                <th>Estatus</th>
            </tr>
            <?php
            $idDuenio = $_SESSION['id'];
            $cadena = "SELECT * FROM cita WHERE (Id_Duenio = $idDuenio); ";
            $query = mysqli_query($conexion, $cadena);

            while ($row = mysqli_fetch_array($query)) {

                echo '<tr>';
                echo '<td>' . $row['Folio'] . '</td>';

                $idMascota = $row['Id_Mascota'];
                $cadenaMascota = "SELECT * FROM mascota WHERE (Id_Mascota = $idMascota); ";
                $queryMascota = mysqli_query($conexion, $cadenaMascota);
                $rowMascota = mysqli_fetch_array($queryMascota);

                echo '<td>' . $rowMascota['Nombre'] . '</td>';

                $idVeterinario = $row['Id_Veterinario'];
                $cadenaVeterinario = "SELECT * FROM veterinario WHERE (Id_Veterinario = $idVeterinario); ";
                $queryVeterinario = mysqli_query($conexion, $cadenaVeterinario);
                $rowVeterinario = mysqli_fetch_array($queryVeterinario);
                $nombreVeterinario = $rowVeterinario['Nombre'] . " " . $rowVeterinario['Paterno'] . " " . $rowVeterinario['Materno'];
                echo '<td>' . $nombreVeterinario . '</td>';
                echo '<td>' . $row['Fecha'] . '</td>';
                echo '<td>' . $row['Horario'] . '</td>';
                echo '<td>' . $row['Estatus'] . '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </main>
</body>

</html>