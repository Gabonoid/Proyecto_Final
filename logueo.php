<?php
session_start();
include 'lib/conexion.php';

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
	<link rel="stylesheet" href="css/logueo.css" />
	<link href='img/icon_dog.png' rel='shortcut icon' type='image/png'>
	<title>Mi peek | Home</title>
</head>

<body>
	<main>
		<div class="hero">
			<img src="img/Perro_logIn.png" alt="Perro_logIn" class="Perro_logIn" />

			<div class="formulario">
				<a href="index.php"><img src="img/Logo_con_eslogan.png" alt="" class="slogan" /></a>
				<form method="POST">

					<div class="campo_informacion">
						<h3>USUARIO</h3>
						<input type="email" name="correo" pattern="[A-Za-z_-0-9]{1,20}" required />
					</div>
					<div class="campo_informacion">
						<h3>CONTRASEÑA</h3>
						<input type="password" name="contraseña" pattern="[A-Za-z_-0-9]{1,20}" required />

					</div>
					<button type="submit" name="login" class="btn_ingresar">Ingresar</button>
				</form>
				<?php
				if (isset($_POST['login'])) {

					$correo = mysqli_real_escape_string($conexion, $_POST['correo']);
					$correo = strip_tags($_POST['correo']);
					$correo = trim($_POST['correo']);

					$contraseña = mysqli_real_escape_string($conexion, $_POST['contraseña']);
					$contraseña = strip_tags($_POST['contraseña']);
					$contraseña = trim($_POST['contraseña']);


					echo $correo;
					echo $contraseña;
					$query = mysqli_query($conexion, "SELECT * FROM duenio WHERE Correo = '$correo' AND Contraseña = '$contraseña';");
					echo $query;
					$contar = mysqli_num_rows($query);

					if ($contar == 1) {

						while ($row = mysqli_fetch_array($query)) {

							if ($correo = $row['correo'] && $contraseña = $row['contraseña']) {

								$_SESSION['correo'] = $correo;

								header('Location: home_usuario.php');
							}
						}
					} else {
						echo 'Los datos ingresados no son correctos';
					}
				}

				?>

				<button class="btn_crear"> <a href="form_new_user.php">Crear nueva cuenta</a> </button>
			</div>
		</div>
	</main>
</body>

</html>