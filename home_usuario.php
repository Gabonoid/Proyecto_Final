<?php
session_start();
include 'lib/conexion.php';

ini_set('error_reporting', 0);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXITO</title>
</head>

<body>
    <?php

    echo "<h1>Bienvenido, " . $nombre . "</h1>";
    ?>
    <a href="logout.php">Cerrar Sesion</a>
</body>

</html>