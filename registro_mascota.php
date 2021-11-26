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
    <title>Mi Peek | Nueva Mascota</title>
</head>

<body>

    <header>
        <a href="index.php"><img src="img/Logo_MiPeek.png" alt="Logo Mi Peek" class="logo" /></a>
        <nav class="nav_menu">
            <a href="perfil_mascota.html" class="nav_menu-btn">Mis mascotas</a>
            <a href="#" class="nav_menu-btn">Mis Citas</a>
            <a href="#" class="nav_menu-btn">Historial</a>
            <a href="mapa.php" class="nav_menu-btn">Agendar</a>
            <a href="#" class="nav_menu-btn"><img src="img/Perfil.png" alt="logo perfil" /></a>
        </nav>
    </header>

    <main>
        <div class="container">
            <h1>Mi mascota</h1>
            <div class="formulario">
                <form method="post" action="lib/registrar_mascota.php">
                    <div class="campo_informacion">
                        <h3>Nombre</h3>
                        <input type="text" size="20" name="nombre" value="<?php echo $_POST['nombre']; ?>" required />
                    </div>
                    <div class="campo_informacion">
                        <h3>Especie</h3>
                        <input type="text" size="20" name="especie" value="<?php echo $_POST['especie']; ?>" required />
                    </div>
                    <div class="campo_informacion">
                        <h3>Raza</h3>
                        <input type="text" size="20" name="raza" value="<?php echo $_POST['raza']; ?>" required />
                    </div>
                    <div class="campo_informacion">
                        <h3>Color</h3>
                        <input type="text" size="30" name="color" value="<?php echo $_POST['color']; ?>" required />
                    </div>
                    <div class="campo_informacion">
                        <h3>Sexo</h3>
                        <input type="radio" name="sexo" value="macho" required />
                        <label for="macho">Macho</label>
                        <input type="radio" name="sexo" value="hembra" required />
                        <label for="hembra">Hembra</label>
                    </div>
                    <div class="campo_informacion">
                        <h3>Microchip</h3>
                        <input type="radio" name="microchip" value="true" required />
                        <label for="true">Si</label>
                        <input type="radio" name="microchip" value="false" required />
                        <label for="false">No</label>
                    </div>
                    <div class="campo_informacion">
                        <h3>Pedigri</h3>
                        <input type="radio" name="pedigri" value="true" required />
                        <label for="true">Si</label>
                        <input type="radio" name="pedigri" value="false" required />
                        <label for="false">No</label>
                    </div>
                    <div class="campo_informacion">
                        <h3>Tatuaje</h3>
                        <input type="radio" name="tatuaje" value="true" required />
                        <label for="true">Si</label>
                        <input type="radio" name="tatuaje" value="false" required />
                        <label for="false">No</label>
                    </div>
                    <div class="campo_informacion">
                        <h3>Señas particulares</h3>
                        <textarea name="senias" id="" cols="30" rows="10" style="resize: none"></textarea>
                    </div>
                    <button type="submit" class="btn_registrar" name="registrar">Registrar</button>
                </form>
    </main>

</body>

</html>