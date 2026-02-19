<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Modificaciones</title>
</head>
<body>
<div>
	<header>
		<h1>APLICACION POKEDEX</h1>
	</header>
	
	<main>				
	<h2>Modificación</h2>

	<?php


	/*Obtiene el id del registro del empleado a modificar, identificador, a partir de su URL. Este tipo de datos se accede utilizando el método: GET*/

	//Recoge el id del empleado a modificar a través de la clave identificador del array asociativo $_GET y lo almacena en la variable identificador
	$identificador = $_GET['identificador'];

	//Con mysqli_real_scape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
	$identificador = $mysqli->real_escape_string($identificador);


	//Se selecciona el registro a modificar: select
	$sql="SELECT * FROM pokemons WHERE pokemons_id = $identificador";
	//echo 'SQL: ' . $sql . '<br>';
	$resultado = $mysqli->query($sql);

	//Se extrae el registro y lo guarda en el array $fila
	//Nota: También se puede utilizar el método fetch_assoc de la siguiente manera: $fila = $resultado->fetch_assoc();
	$fila = $resultado->fetch_array();
	$numero = $fila['nº_pokedex'];
	$nombre = $fila['nombre'];
	$tipo = $fila['tipo'];
	$region = $fila['region'];
	$generacion = $fila['generacion'];
	$descripcion = $fila['descripcion'];

	//Se cierra la conexión de base de datos
	$mysqli->close();
	?>

<!--FORMULARIO DE EDICIÓN. Al hacer click en el botón Guardar, llama a la página (form action="edit_action.php"): edit_action.php-->

	<form action="edit_action.php" method="post" class="shadow p-4 bg-white rounded">
    
    <input type="hidden" name="identificador" value="<?php echo $identificador; ?>">

    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="n_pokedex" class="form-label fw-bold">Nº Pokedex</label>
            <input type="number" name="n_pokedex" id="n_pokedex" class="form-control" value="<?php echo $n_pokedex; ?>" readonly>
        </div>

        <div class="col-md-8 mb-3">
            <label for="nombre" class="form-label fw-bold">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $nombre; ?>" required>
        </div>
    </div>

    <div class="mb-3">
        <label for="tipo" class="form-label fw-bold">Tipo</label>
        <input type="text" name="tipo" id="tipo" class="form-control" value="<?php echo $tipo; ?>" placeholder="Ej: Eléctrico">
    </div>

    <div class="mb-3">
        <label for="region" class="form-label fw-bold">Región</label>
        <select name="region" id="region" class="form-select">
            <option value="<?php echo $region; ?>" selected><?php echo $region; ?> (Actual)</option>
            <hr>
            <option value="Kanto">Kanto</option>
            <option value="Johto">Johto</option>
            <option value="Hoenn">Hoenn</option>
            <option value="Sinnoh">Sinnoh</option>
            <option value="Teselia">Teselia</option>
            <option value="Kalos">Kalos</option>
            <option value="Alola">Alola</option>
            <option value="Galar">Galar</option>
            <option value="Paldea">Paldea</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="habilidad" class="form-label fw-bold">Habilidad</label>
        <input type="text" name="habilidad" id="habilidad" class="form-control" value="<?php echo $habilidad; ?>">
    </div>

    <div class="mb-4">
        <label for="descripcion" class="form-label fw-bold">Descripción de la Pokedex</label>
        <textarea name="descripcion" id="descripcion" class="form-control" rows="3"><?php echo $descripcion; ?></textarea>
    </div>

	 <div class="mb-3">
		<label for="generacion" class="form-label fw-bold">Generación</label>
		<select name="generacion" id="generacion" class="form-select">
			<option value="<?php echo $generacion; ?>" selected><?php echo $generacion; ?> (Actual)</option>
			<hr>
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

		<div >
			<input type="hidden" name="identificador" value=<?php echo $identificador;?>>
			<button type="submit" name="modifica" value="si">Aceptar</button>
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

