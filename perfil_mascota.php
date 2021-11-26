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
	<title>Mi Peek | Mis Mascotas</title>
</head>

<body>
	<header>
		<a href="index.php"><img src="img/Logo_MiPeek.png" alt="Logo Mi Peek" class="logo" /></a>
		<nav class="nav_menu">
			<a href="mapa.php" class="nav_menu-btn">Veterinarios</a>
			<a href="#" class="nav_menu-btn">Citas</a>
			<a href="#" class="nav_menu-btn">Historial</a>
			<a href="#" class="nav_menu-btn"><img src="img/Perfil.png" alt="logo perfil" /></a>
		</nav>
	</header>
	<main>
		<h1>Datos de la Mascota</h1>
		<div class="container">
			<div class="mascotas">
				<div class="img_persona">
					<img src="Usuario UNO/Mascota/Perro 1/girl.jpg" alt="usuario_persona" class="img_persona_perfil" />
				</div>
				<div class="img_mascota">
					<img src="Usuario UNO/Mascota/Perro 1/perro_1.jpg" alt="Perfil_perro_usuario_Uno" class="img_mascota_perfil" />
				</div>
				<button class="btn_actualizar_imagen" id="btn_actualizar_imagen">+</button>
				<div class="mas_mascotas">
					<div class="mas_mascota_imagen">
						<img src="Usuario UNO/Mascota/Perro 1/mas_mascotas/uno.jpg" alt="" />
					</div>
					<div class="mas_mascota_imagen">
						<img src="Usuario UNO/Mascota/Perro 1/mas_mascotas/dos.jpg" alt="" />
					</div>
					<div class="mas_mascota_imagen">
						<img src="Usuario UNO/Mascota/Perro 1/mas_mascotas/pexels-pixabay-104827.jpg" alt="" />
					</div>
					<button class="btn_agregar_mascota">+</button>
				</div>
			</div>
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
				<div class="campo_informacion_mod">
					<h3>Señas particulares</h3>
					<textarea name="senias_particulares" id="senias_particulares" cols="30" rows="10" readonly value="<?php echo $rowMascota['Senias_Particulares']; ?>"></textarea>
				</div>
				<button class="btn_modificar">Modificar</button>
			</div>
		</div>
	</main>
</body>

</html>