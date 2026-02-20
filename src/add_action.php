<?php
// ACTIVAR ERRORES (Para ver por qué sale el Error 500)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("config.php");
session_start();

// 1. Control de sesión
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['inserta'])) {
    // 2. Recogida de datos (con valor por defecto para evitar que PHP muera si falta uno)
    $n_pokedex   = isset($_POST['n_pokedex']) ? $mysqli->real_escape_string($_POST['n_pokedex']) : '';
    $nombre      = isset($_POST['nombre']) ? $mysqli->real_escape_string($_POST['nombre']) : '';
    $tipo        = isset($_POST['tipo']) ? $mysqli->real_escape_string($_POST['tipo']) : '';
    $region      = isset($_POST['region']) ? $mysqli->real_escape_string($_POST['region']) : '';
    $generacion  = isset($_POST['generacion']) ? $mysqli->real_escape_string($_POST['generacion']) : '';
    $descripcion = isset($_POST['descripcion']) ? $mysqli->real_escape_string($_POST['descripcion']) : '';
    $habilidad   = isset($_POST['habilidad']) ? $mysqli->real_escape_string($_POST['habilidad']) : '';

    // 3. Comprobar duplicados
    $check = $mysqli->query("SELECT * FROM pokemons WHERE nº_pokedex = '$n_pokedex' OR nombre = '$nombre'");

    if ($check && $check->num_rows > 0) {
        die("Error: El Pokémon ya existe. <a href='add.php'>Volver</a>");
    } 

    // 4. Inserción
    $sql = "INSERT INTO pokemons (nº_pokedex, nombre, tipo, region, generacion, descripcion, habilidad) 
            VALUES ('$n_pokedex', '$nombre', '$tipo', '$region', '$generacion', '$descripcion', '$habilidad')";

    if ($mysqli->query($sql)) {
        header("Location: home.php");
        exit();
    } else {
        die("Error en la base de datos: " . $mysqli->error);
    }
} else {
    header("Location: add.php");
    exit();
}
?>