<?php
include('conexion.php');
$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$correo = $_POST['correo'];
$contraseña =  $_POST['contraseña'];
$repContraseña = $_POST['repContraseña'];
$telefono = $_POST['telefono'];
$estado = $_POST['estado'];
$codigoPostal = $_POST['codigoPostal'];
$calle = $_POST['calle'];

# $comprobarCorreo = mysqli_num_rows(mysqli_query($conexion, "SELECT Correo FROM dueño WHERE Correo = '$correo'"));
/*
if ($comprobarCorreo >= 1) {
    echo "El correo ya se encuentra registrado. Pruebe ingresar";
} else {

    if ($contraseña != $repContraseña) {
        echo "La contraseñas no coinciden";
    } else {

        $query = "INSERT INTO dueño (Nombre, Paterno, Materno, Telefono, Correo, Contraseña, Pais, Estado, CP, Calle) VALUES ('$nombre', '$paterno', '$materno', '$telefono', '$correo', '$contraseña', 'MX', '$estado', '$codigoPostal', '$calle');";

        echo $query;

        $insertar = mysqli_query($conexion, $query);

        if ($insertar) {
            echo "Se registro correctamente '$nombre'";
        } else {
            echo "NOOOO se registro correctamente";
        }
    }
}
*/

$query = "INSERT INTO dueño (Nombre, Paterno, Materno, Telefono, Correo, Contraseña, Pais, Estado, CP, Calle) VALUES ('$nombre', '$paterno', '$materno', '$telefono', '$correo', '$contraseña', 'MX', '$estado', '$codigoPostal', '$calle');";

echo $query;

$insertar = mysqli_query($conexion, $query);




$nombre = $_POST['nombre'];
					$paterno = $_POST['paterno'];
					$materno = $_POST['materno'];
					$correo =  $_POST['correo'];
					$contraseña = ($_POST['contraseña']);
					$repContraseña = ($_POST['repContraseña']);
					$telefono = $_POST['telefono'];
					$estado = $_POST['estado'];
					$codigoPostal = $_POST['codigoPostal'];
					$calle = $_POST['calle'];

					$comprobarCorreo = "SELECT Correo FROM duenio WHERE Correo = '$correo'";

					$SQL = mysqli_connect("localhost", "root", "", "web_mi_peek");
					$query = "INSERT INTO duenio VALUES (default, '$nombre', '$paterno', '$materno', '$telefono', '$correo', '$contraseña', 'MX', '$estado', '$codigoPostal', '$calle');";

					$insertar = mysqli_query($SQL, $query);

					echo $insertar;
