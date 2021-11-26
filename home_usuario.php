<?php
session_start();
include 'lib/conexion.php';

ini_set('error_reporting', 0);
if (isset($_SESSION['usuario'])) {
    header("Location: index.php");
}
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

    <h1>Bienvenido, <?php $_SESSION['usuario']; ?> </h1>

    <a href="logout.php">Cerrar Sesion</a>
</body>

</html>