<?php
// Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
session_start();

// Control de acceso
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1 text-danger">	
	<title>Alta Pokémon</title>
</head>
<body>
<div>
	<header>
		<h1>APLICACIÓN POKÉDEX</h1>
	</header>
	<main>

<?php
if(isset($_POST['inserta'])) 
{
    // 1. Recoger y limpiar datos del formulario (coincidiendo con los names de add.php)
    $n_pokedex  = $mysqli->real_escape_string($_POST['n_pokedex']);
    $nombre     = $mysqli->real_escape_string($_POST['nombre']);
    $tipo       = $mysqli->real_escape_string($_POST['tipo']);
    $region     = $mysqli->real_escape_string($_POST['region']);
    $generacion = $mysqli->real_escape_string($_POST['generacion']);
    $descripcion = $mysqli->real_escape_string($_POST['descripcion']);
    $habilidad  = $mysqli->real_escape_string($_POST['habilidad']);

    // 2. VALIDACIÓN DE DUPLICADOS (Requisito Tarea 3)
    // Comprobamos si ya existe el número de pokedex o el nombre
    $check = $mysqli->query("SELECT * FROM pokemons WHERE nº_pokedex = '$n_pokedex' OR nombre = '$nombre'");

    if ($check->num_rows > 0) {
        echo "<div style='color:red;'>Error: El número de Pokedex o el Nombre ya existen en la base de datos.</div>";
        echo "<a href='add.php'>Volver a intentar</a>";
    } 
    else {
        // 3. INSERCIÓN EN LA TABLA 'pokemons'
        // IMPORTANTE: Los nombres de las columnas deben ser idénticos a los de database.sql
        $sql = "INSERT INTO pokemons (nº_pokedex, nombre, tipo, region, generacion, descripcion, habilidad) 
                VALUES ('$n_pokedex', '$nombre', '$tipo', '$region', '$generacion', '$descripcion', '$habilidad')";

        if($mysqli->query($sql)) 
        {
            echo "<div style='color:green;'>¡Pokémon registrado correctamente!</div>";
            echo "<a href='home.php'>Ver listado de Pokémons</a>";
        } 
        else 
        {
            echo "<div>Error al insertar: " . $mysqli->error . "</div>";
            echo "<a href='add.php'>Volver a intentar</a>";
        }
    }
    $mysqli->close();
} 
else 
{
    header("Location: add.php");
}
?>
    </main>
</div>
</body>
</html>