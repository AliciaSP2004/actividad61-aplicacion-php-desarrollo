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
	<title>Atlas</title>
</head>
<body>
<div>
	<header>
		<h1>APLICACION CRUD PHP</h1>
	</header>
	<main>

<?php
// 1. Recoger datos
$n_pokedex = $_POST['n_pokedex'];
$nombre = $_POST['nombre'];

// 2. VALIDACIÓN DE DUPLICADOS (Requisito Tarea 3)
$check = $mysqli->query("SELECT * FROM pokemons WHERE nº_pokedex = '$n_pokedex' OR nombre = '$nombre'");

if ($check->num_rows > 0) {
    echo "Error: El número de Pokedex o el Nombre ya existen.";
    echo "<a href='add.php'>Volver a intentar</a>";
} else {
    // 3. Si no hay duplicados, se inserta
    $sql = "INSERT INTO pokemons (nº_pokedex, nombre, tipo, region, generacion, descripcion) 
            VALUES ('$n_pokedex', '$nombre', '$tipo', '$region', '$generacion', '$descripcion')";
    $mysqli->query($sql);
    header("Location: home.php");
}
?>
 	
	</main>
</div>
</body>
</html>
