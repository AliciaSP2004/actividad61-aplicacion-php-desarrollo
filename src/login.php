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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div>
	<header>
		<h1>APLICACIÓN POKEMONS</h1>
	</header>
	<main> 
	<?php
	session_start();

	$error = $_SESSION['login_error'] ?? '';
	unset($_SESSION['login_error']);
	?>

	
	<?php 
	if ($error !== ""): ?>
		<p style="color:#b00020;"><?php echo $error;?></p>
	<?php endif; ?>

	<form method="post" action="login_action.php">
			<div>
				<label for="email">Email</label>
				<input type="email" name="email" id="email" placeholder="correo electrónico" class="form-control" required>
			</div>
			<div>
				<label for="password">Contraseña</label>
				<input type="password" name="password" id="password" placeholder="contraseña" class="form-control" required>
			</div>
		<button type="submit" name="inicia" value="si" class="btn btn-primary">Iniciar sesión</button>
	</form>
	<p><a href="index.php">Volver</a></p>
	</main>
	<footer>
    	Created by Alicia &copy; 2026
  	</footer>
</div>
</body>
</html>
