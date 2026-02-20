<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altas</title>
</head>
<body>
<div>
	<header>
		<h1>APLICACION POKEMONS</h1>
	</header>
	<main>				
	<h2>Alta</h2>
<!--FORMULARIO DE ALTA. Al hacer click en el botón Agregar, llama a la página: add.php (form action="add.php")
La página: add.php se encargará de proceder a la inserción del registro en la tabla de empleados
-->

	<form method="post" action="add_action.php">
		<div>
			<label>Nº Pokedex:</label>
			<input type="number" name="n_pokedex" required>
		</div>
		<div>
			<label>Nombre:</label>
			<input type="text" name="nombre" required>
		</div>
		<div>
			<label>Tipo:</label>
			<input type="text" name="tipo" placeholder="Ej: Fuego/Volador" required>
		</div>
		<div>
			<label>Descripción:</label>
			<textarea name="descripcion"></textarea>
		</div>
		<div>
			<label>Habilidad:</label>
			<input type="text" name="habilidad" required>
		</div>
		<div>
		<div>
			<label>Debilidad:</label>
			<input type="text" name="debilidad" required>
		</div>
		<div>
			<label>Región:</label>
			<select name="region" required>
				<option value="Kanto">Kanto</option>
				<option value="Johto">Johto</option>
				<option value="Hoenn">Hoenn</option>
				<option value="Sinnoh">Sinnoh</option>
				<option value="Teselia">Teselia</option>
				<option value="Kalos">Kalos</option>
				<option value="Alola">Alola</option>
				<option value="Galar">Galar</option>
				<option value="Paldea">Paldea</option>
				<option value="Unova">Unova</option>
				<option value="Hisui">Hisui</option>
			</select>
		</div>
		<div>
			<label>Generación:</label>
			<select name="generacion" required>
				<option value="1º">1º</option>
				<option value="2º">2º</option>
				<option value="3º">3º</option>
				<option value="4º">4º</option>
				<option value="5º">5º</option>
				<option value="6º">6º</option>
				<option value="7º">7º</option>
				<option value="8º">8º</option>
				<option value="9º">9º</option>
			</select>
		</div>
		<div>
			<button type="submit" name="inserta" value="si">Aceptar</button>
			<button type="button" onclick="location.href='home.php'">Cancelar</button>
		</div>
	</form>
	
	</main>	
	<footer>
		<p><a href="home.php">Volver</a></p>	
		<p><a href="logout.php">Cerrar sesión (Sign out) <?php echo $_SESSION['username']; ?></a></p>
		Created by Alicia &copy; 2026
  	</footer>
</div>
</body>
</html>