<?php
session_start();
include 'lib/conexion.php';

ini_set('error_reporting', 0);
if (!isset($_SESSION['usuario'])) {
	header("Location: index.php");
}
?>

<?php
$IdVeterinario = ($_GET['id'])+1;
$IdSesion = $_SESSION['id'];
$consultaVeterinario = "SELECT * FROM veterinario WHERE Id_Veterinario = '$IdVeterinario';";
$queryVeterinario = mysqli_query($conexion, $consultaVeterinario);
$rowVeterinario = mysqli_fetch_array($queryVeterinario);
$nombreCompletoVeterinario = $rowVeterinario['Nombre']." ".$rowVeterinario['Paterno']." ".$rowVeterinario['Materno'];
$direccionCompletaVeterinario = $rowVeterinario['Calle'].", ".$rowVeterinario['Estado'].", ".$rowVeterinario['CP'];

$consulta =  "SELECT * FROM duenio WHERE Id_Duenio = '$IdSesion';";
$query = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_array($query);
$nombreCompleto = $row['Nombre']." ".$row['Paterno']." ".$row['Materno'];
$telefono = $row['Telefono'];
$direccionCompleta = $row['Calle'].", ".$row['Estado'].", ".$row['CP'];

$consultaVeterinario =  "SELECT * FROM duenio WHERE Id_Duenio = '$IdSesion';";

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="css/style_veterinario.css" />
	<link href='img/icon_dog.png' rel='shortcut icon' type='image/png'>
	<title>Mi Peek | Agendar Cita</title>
</head>

<body>
	<header>
		<a href="index.html"><img src="img/Logo_MiPeek.png" alt="Logo Mi Peek" class="logo" /></a>
		<nav class="nav_menu">
			<a href="#" class="nav_menu-btn">Citas</a>
			<a href="#" class="nav_menu-btn">Historial</a>
			<a href="#" class="nav_menu-btn"><img src="img/Perfil.png" alt="logo perfil" /></a>
		</nav>
	</header>
	<main>
		<h1>Agendar Cita</h1>

		<div class="informacion_veterinario">
			<div class="campo_informacion_largo">
				<h3>Mascota</h3>
				<select name="mascota">
					<option value="mascota">--Escoje tu mascota--</option>
					<option value="mascota">Mascota 1</option>
				</select>
			</div>
			<div class="campo_informacion">
				<h3>Fecha</h3>
				<input type="date" />
			</div>
			<div class="campo_informacion_largo">
				<h3>Horario</h3>
				<select name="horario">
				<option value="mascota">--Escoje tu horario--</option>
					<option value="12:00">12:00</option>
					<option value="13:00">13:00</option>
					<option value="14:00">14:00</option>
					<option value="15:00">15:00</option>
					<option value="16:00">16:00</option>
					<option value="17:00">17:00</option>
					<option value="18:00">18:00</option>
					<option value="19:00">19:00</option>
					<option value="20:00">20:00</option>
				</select>
			</div>
			<div class="campo_informacion_largo">
				<h3>Veterinario</h3>
				<input type="text" value="<?php echo $nombreCompletoVeterinario; ?>" readonly />
			</div>
			<div class="campo_informacion_largo">
				<h3>Dirección</h3>
				<input type="text" value="<?php echo $direccionCompletaVeterinario; ?>" readonly />
			</div>
			<button class="btn_modificar">Agendar</button>
		</div>
		</div>
	</main>
</body>

</html>