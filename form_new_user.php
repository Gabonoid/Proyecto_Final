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
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="img/icon_dog.png" rel="shortcut icon" type="image/png" />
	<link rel="stylesheet" href="css/form_new_user.css" />
	<title>Mi peek | Registro</title>
</head>

<body>
	<header>
		<div class="container">
			<img src="img/Logo_con_eslogan_orange.png" alt="Logo Mi Peek" class="logo" />

			<nav class="nav_menu">
				<a href="index.php" class="nav_menu-btn">Principal</a>
			</nav>
		</div>
	</header>
	<main>
		<div class="container">
			<h1>Registrate!</h1>
			<div class="formulario">
				<form method="post">
					<div class="campo_informacion">
						<h3>Nombre</h3>
						<input type="text" size="20" name="nombre" value="<?php echo $_POST['nombre']; ?>" required />
					</div>
					<div class="campo_informacion">
						<h3>Apellido Paterno</h3>
						<input type="text" size="20" name="paterno" value="<?php echo $_POST['paterno']; ?>" required />
					</div>
					<div class="campo_informacion">
						<h3>Apellido Materno</h3>
						<input type="text" size="20" name="materno" value="<?php echo $_POST['materno']; ?>" required />
					</div>
					<div class="campo_informacion">
						<h3>Correo</h3>
						<input type="email" size="30" name="correo" value="<?php echo $_POST['correo']; ?>" required />
					</div>
					<div class="campo_informacion">
						<h3>Contraseña</h3>
						<input type="password" size="20" name="contraseña" required />
					</div>
					<div class="campo_informacion">
						<h3>Confirma tu contraseña</h3>
						<input type="password" size="20" name="repContraseña" required />
					</div>
					<div class="campo_informacion">
						<h3>Telefono</h3>
						<input type="number" size="10" name="telefono" value="<?php echo $_POST['telefono']; ?>" required />
					</div>
					<div class="campo_informacion">
						<h3>Estado</h3>
						<div class="especial">
							<select name="estado">
								<option value="CDMX">CDMX</option>
								<option value="estadoMexico">Estado de México</option>
								<option value="Hidalgo">Hidalgo</option>
							</select>
						</div>

					</div>
					<div class="campo_informacion">
						<h3>Codigo Postal</h3>
						<input type="number" size="5" name="codigoPostal" value="<?php echo $_POST['codigoPostal']; ?>" required />
					</div>
					<div class="campo_informacion">
						<h3>Calle</h3>
						<input type="text" size="20" name="calle" value="<?php echo $_POST['calle']; ?>" required />
					</div>
					<button type="submit" class="btn_registrar" name="registrar">Registrarse</button>
				</form>
				<?php

				if (isset($_POST['registrar'])) {

					$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
					$paterno = mysqli_real_escape_string($conexion, $_POST['paterno']);
					$materno = mysqli_real_escape_string($conexion, $_POST['materno']);
					$correo = mysqli_real_escape_string($conexion, $_POST['correo']);
					$contraseña = mysqli_real_escape_string($conexion, ($_POST['contraseña']));
					$repContraseña = mysqli_real_escape_string($conexion, ($_POST['repContraseña']));
					$telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
					$estado = mysqli_real_escape_string($conexion, $_POST['estado']);
					$codigoPostal = mysqli_real_escape_string($conexion, $_POST['codigoPostal']);
					$calle = mysqli_real_escape_string($conexion, $_POST['calle']);

					$comprobarCorreo = mysqli_num_rows(mysqli_query($conexion, "SELECT Correo FROM duenio WHERE Correo = '$correo'"));

					if ($comprobarCorreo >= 1) {
						echo "El correo ya se encuentra registrado. Pruebe ingresar";
					} else {
						if ($contraseña != $repContraseña) {
							echo "La contraseñas no coinciden";
						} else {
							$insertar = mysqli_query($conexion, "INSERT INTO duenio VALUES (default, '$nombre', '$paterno', '$materno', '$telefono', '$correo', '$contraseña', 'MX', '$estado', '$codigoPostal', '$calle');");

							if ($insertar) {
								echo "Se registro correctamente '$nombre'";
								header("Refresh: 1; url = logueo.php");
							} else {
								echo "No se registro correctamente";
							}
						}
					}
				}

				?>


			</div>
		</div>
	</main>

</body>

</html>