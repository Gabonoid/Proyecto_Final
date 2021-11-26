<?php
include 'conexion.php';
session_start();

$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
$especie = mysqli_real_escape_string($conexion, $_POST['especie']);
$raza = mysqli_real_escape_string($conexion, $_POST['raza']);
$color = mysqli_real_escape_string($conexion, $_POST['color']);
$sexo = mysqli_real_escape_string($conexion, $_POST['sexo']);
$micro = mysqli_real_escape_string($conexion, $_POST['microchip']);
$pedigri = mysqli_real_escape_string($conexion, $_POST['pedigri']);
$tatuaje = mysqli_real_escape_string($conexion, $_POST['tatuaje']);
$senias = mysqli_real_escape_string($conexion, $_POST['senias']);

$insertar = mysqli_query($conexion, "INSERT INTO mascota VALUES (default, '$nombre', '$especie', '$raza', '$color', '$sexo', $micro, $pedigri, $tatuaje, '$senias');");

$row = mysqli_fetch_array(mysqli_query($conexion, "SELECT * FROM mascota WHERE (Nombre = '$nombre' AND Especie = '$especie' AND Raza = '$raza' AND Color = '$color' AND Sexo = '$sexo' AND Microchip = $micro AND Pedigri = $pedigri AND Tatuaje = $tatuaje AND Senias_Particulares = '$senias' );"));

echo $_SESSION['id'] . "<br>";

$IdUsuario = $_SESSION['id'];
$IdMascota = $row['Id_Mascota'];

$insertarImpositora = mysqli_query($conexion, "INSERT INTO duenio_mascota VALUES ($IdUsuario, $IdMascota);");

if ($insertar && $insertarImpositora) {
    echo "Se registro correctamente '$nombre'";
    header("Refresh: 1; url = ../logueo.php");
} else {
    echo "No se registro correctamente";
}
