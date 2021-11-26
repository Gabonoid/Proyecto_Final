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
    <title>Mi peek | Mis Mascotas</title>
</head>

<body>
<h1>Mis Mascotas</h1>

<?php
$idDuenio = $_SESSION['id'];
$cadena = "SELECT mascota.* FROM mascota, duenio_mascota WHERE (duenio_mascota"."."."Id_Mascota = mascota"."."."Id_Mascota AND duenio_mascota"."."."Id_Duenio = $idDuenio); ";
$query = mysqli_query($conexion, $cadena);
while ($row = mysqli_fetch_array($query)) {
    echo '<a href="perfil_mascota.php/?id='.$row['Id_Mascota'].'">'.$row['Nombre'].'</a>';
}
?>
<br>
<a href="registro_mascota.php">Registrar Mascota</a>

</body>

</html>