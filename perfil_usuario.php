<?php
session_start();
include 'lib/conexion.php';

ini_set('error_reporting', 0);
if (!isset($_SESSION['usuario'])) {
	header("Location: index.php");
}
?>

<?php
$IdSesion = $_SESSION['id'];
$consulta =  "SELECT * FROM duenio WHERE Id_Duenio = '$IdSesion';";
$query = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_array($query);
$nombreCompleto = $row['Nombre']." ".$row['Paterno']." ".$row['Materno'];
$telefono = $row['Telefono'];
$direccionCompleta = $row['Calle'].", ".$row['Estado'].", ".$row['CP'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="css/style_veterinario.css" />
	<link href='img/icon_dog.png' rel='shortcut icon' type='image/png'>
	<title>Mi Peek | Mis Mascotas</title>
</head>

<body>
	<header>
		<a href="index.php"><img src="img/Logo_MiPeek.png" alt="Logo Mi Peek" class="logo" /></a>
		<nav class="nav_menu">
			<a href="mis_mascotas.php" class="nav_menu-btn">Mis mascotas</a>
			<a href="registro_mascota.php" class="nav_menu-btn">Mis Citas</a>
			<a href="mis_citas.php" class="nav_menu-btn">Historial</a>
			<a href="mapa.php" class="nav_menu-btn">Agendar</a>
			<a href="#" class="nav_menu-btn"><img src="img/Perfil.png" alt="logo perfil" /></a>
		</nav>
	</header>
	<main>
		<h1>Mi Perfil</h1>
		<div class="container">
			<div class="veterinario">
				<div class="img_perfil">
					<img src="Usuario UNO/Mascota/Perro 1/girl.jpg" class="img_veterinario_perfil" />
				</div>
				<button class="btn_actualizar_imagen">+</button>
			</div>
			<div class="informacion_veterinario">
				<div class="campo_informacion_largo">
					<h3>Nombre</h3>
					<input type="text" readonly value="<?php echo $nombreCompleto; ?>" />
				</div>
				<div class="campo_informacion">
					<h3>E-Mail</h3>
					<input type="email" readonly value="<?php echo $_SESSION['correo']; ?>"/>
				</div>
				<div class="campo_informacion">
					<h3>Telefono</h3>
					<input type="text" readonly value="<?php echo $telefono; ?>" />
				</div>
				<div class="campo_informacion_largo">
					<h3>Dirección</h3>
					<input type="text" readonly value="<?php echo $direccionCompleta; ?>" />
				</div>
				<div class="campo_informacion_mod">
					<h3>Notas</h3>
					<textarea name="senias_particulares" id="senias_particulares" cols="30" rows="10"></textarea>
				</div>
				<button class="btn_modificar">Modificar</button>
			</div>
		</div>
	</main>
</body>

</html>