<?php
session_start();
include 'lib/conexion.php';

ini_set('error_reporting', 0);
if (!isset($_SESSION['usuario'])) {
	header("Location: index.php");
}
?>
<?php
$IdMascota = $_GET['id'];
$IdSesion = $_SESSION['id'];
$consultaVeterinario = "SELECT * FROM mascota WHERE Id_Mascota = '$IdMascota';";
$queryMascota = mysqli_query($conexion, $consultaVeterinario);
$rowMascota = mysqli_fetch_array($queryMascota);

?>

<?php
function convertidorBolleano($boleano)
{
	$valor = '';
	if ($boleano = 1) {
		$valor = 'Si';
	} else {
		$valor = 'No';
	}
	return $valor;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="css/style_mascotas.css" />
	<link href='img/icon_dog.png' rel='shortcut icon' type='image/png'>
	<link rel="stylesheet" href="../css/registro_mascota.css">
	<title>Mi Peek | Mis Mascotas</title>
</head>

<body>
	<header>
		<a href="../index.php"><img src="../img/Logo_MiPeek.png" alt="Logo Mi Peek" class="logo" /></a>
		<nav class="nav_menu">
			<a href="../mis_mascotas.php" class="nav_menu-btn">Mis mascotas</a>
			<a href="../mis_citas.php" class="nav_menu-btn">Historial</a>
			<a href="../mapa.php" class="nav_menu-btn">Agendar</a>
			<a href="../home_usuario.php" class="nav_menu-btn"><img src="../img/Perfil.png" alt="logo perfil" /></a>
		</nav>
	</header>
	<main>
		<h1>Datos de la Mascota</h1>
		<div class="container">
			<div class="informacion_mascotas">
				<div class="campo_informacion">
					<h3>Nombre</h3>
					<input type="text" readonly value="<?php echo $rowMascota['Nombre']; ?>" />
				</div>
				<div class="campo_informacion">
					<h3>Especie</h3>
					<input type="text" readonly value="<?php echo $rowMascota['Especie']; ?>" />
				</div>
				<div class="campo_informacion">
					<h3>Raza</h3>
					<input type="text" readonly value="<?php echo $rowMascota['Raza']; ?>" />
				</div>
				<div class="campo_informacion">
					<h3>Color</h3>
					<input type="text" readonly value="<?php echo $rowMascota['Color']; ?>" />
				</div>
				<div class="campo_informacion">
					<h3>Sexo</h3>
					<input type="text" readonly value="<?php echo $rowMascota['Sexo']; ?>" />
				</div>
				<div class="campo_informacion">
					<h3>Microship</h3>
					<input type="text" readonly value="<?php echo convertidorBolleano($rowMascota['Microchip']); ?>" />
				</div>
				<div class="campo_informacion">
					<h3>Pedigri</h3>
					<input type="text" readonly value="<?php echo convertidorBolleano($rowMascota['Pedigri']); ?>" />
				</div>
				<div class="campo_informacion">
					<h3>Tatuaje</h3>
					<input type="text" readonly value="<?php echo convertidorBolleano($rowMascota['Tatuaje']); ?>" />
				</div>
				<div class="campo_informacion">
					<h3>Señas particulares</h3>
					<textarea name="senias_particulares" id="senias_particulares" cols="30" rows="10" readonly value="<?php echo $rowMascota['Senias_Particulares']; ?>"></textarea>
				</div>
			</div>
		</div>
	</main>
</body>

</html>