<?php
session_start();
include 'lib/conexion.php';

ini_set('error_reporting', 0);
if (!isset($_SESSION['usuario'])) {
	header("Location: index.php");
}
?>

<?php
$IdVeterinario = ($_GET['id']) + 1;
$IdSesion = $_SESSION['id'];
$consultaVeterinario = "SELECT * FROM veterinario WHERE Id_Veterinario = '$IdVeterinario';";
$queryVeterinario = mysqli_query($conexion, $consultaVeterinario);
$rowVeterinario = mysqli_fetch_array($queryVeterinario);
$nombreCompletoVeterinario = $rowVeterinario['Nombre'] . " " . $rowVeterinario['Paterno'] . " " . $rowVeterinario['Materno'];
$direccionCompletaVeterinario = $rowVeterinario['Calle'] . ", " . $rowVeterinario['Estado'] . ", " . $rowVeterinario['CP'];

$consulta =  "SELECT * FROM duenio WHERE Id_Duenio = '$IdSesion';";
$query = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_array($query);
$nombreCompleto = $row['Nombre'] . " " . $row['Paterno'] . " " . $row['Materno'];
$telefono = $row['Telefono'];
$direccionCompleta = $row['Calle'] . ", " . $row['Estado'] . ", " . $row['CP'];

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
		<form method="post">
			<div class="informacion_veterinario">
				<div class="campo_informacion_largo">
					<h3>Mascota</h3>
					<select name="mascota">
						<?php
						$idDuenio = $_SESSION['id'];
						$cadena = "SELECT mascota.* FROM mascota, duenio_mascota WHERE (duenio_mascota" . "." . "Id_Mascota = mascota" . "." . "Id_Mascota AND duenio_mascota" . "." . "Id_Duenio = $idDuenio); ";
						$query = mysqli_query($conexion, $cadena);
						while ($row = mysqli_fetch_array($query)) {
							echo '<option value="' . $row['Id_Mascota'] . '">' . $row['Nombre'] . '</option>';
						} ?>
					</select>
				</div>
				<div class="campo_informacion">
					<h3>Fecha</h3>
					<input type="date" name="fecha" />
				</div>
				<div class="campo_informacion_largo">
					<h3>Horario</h3>
					<select name="horario">
						<option value="mascota">--Escoje tu horario--</option>
						<option value="12:00:00">12:00</option>
						<option value="13:00:00">13:00</option>
						<option value="14:00:00">14:00</option>
						<option value="15:00:00">15:00</option>
						<option value="16:00:00">16:00</option>
						<option value="17:00:00">17:00</option>
						<option value="18:00:00">18:00</option>
						<option value="19:00:00">19:00</option>
						<option value="20:00:00">20:00</option>
					</select>
				</div>
				<div class="campo_informacion">
					<h3>Veterinario</h3>
					<input type="text" name="veterinario" value="<?php $IdVeterinario; ?>" placeholder="<?php echo $nombreCompletoVeterinario; ?>" readonly />
				</div>
				<div class="campo_informacion">
					<h3>Dirección</h3>
					<input type="text" name="direccion" placeholder="<?php echo $direccionCompletaVeterinario; ?>" readonly />
				</div>
				<button type="submit" name="agendar" class="btn_modificar">Agendar</button>
			</div>
		</form>
		<?php
		if (isset($_POST['agendar'])) {

			$mascota = mysqli_real_escape_string($conexion, $_POST['mascota']);
			$fecha = date("Y-m-d", strtotime($_POST['fecha']));
			$horario = mysqli_real_escape_string($conexion, $_POST['horario']);
			$veterinario = mysqli_real_escape_string($conexion, $_POST['veterinario']);

			$insertar = mysqli_query($conexion, "INSERT INTO cita VALUES (default, $IdSesion, $IdVeterinario, $mascota, '$fecha', '$horario', 'Pendiente');");

			if ($insertar) {
				header("Refresh: 1; url = ../logueo.php");
			} else {
				echo "No se registro correctamente";
			}
		}
		?>
	</main>
</body>

</html>