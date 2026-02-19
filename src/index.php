<?php
/*Incluye parámetros de conexión a la base de datos: 
DB_HOST: Nombre o dirección del gestor de BD MariaDB
DB_NAME: Nombre de la BD
DB_USER: Usuario de la BD
DB_PASSWORD: Contraseña del usuario de la BD
*/
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Pokemons</title>
</head>
<body>
<div>
	<header>
		<h1>APLICACIÓN POKEMONS</h1>
	</header>

	<main>
	
	<?php
	session_start();
	//Si el usuario ya ha iniciado sesión se le redirige a la página home.php
	if (isset($_SESSION['username'])) {
		header("Location: home.php");
		exit();
	}
	?>
	<p><a href="login.php">Iniciar sesión (Sign in)</a></p>
	<p><a href="registro.php">Registrarse (Sign up)</a></p>

	</main>
	<footer>
    	Created by Alicia&copy; 2026
  	</footer>
</div>
</body>
</html>
