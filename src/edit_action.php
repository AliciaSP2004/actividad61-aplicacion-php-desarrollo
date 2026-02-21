<?php
include_once("config.php");
session_start();

// 1. Verificación de seguridad
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// 2. Procesar el formulario
if (isset($_POST['modifica'])) {
    // Recogemos los datos y los limpiamos
    $identificador = $mysqli->real_escape_string($_POST['identificador']);
    $tipo          = $mysqli->real_escape_string($_POST['tipo']);
    $region        = $mysqli->real_escape_string($_POST['region']);
    $habilidad     = $mysqli->real_escape_string($_POST['habilidad']);
    $descripcion   = $mysqli->real_escape_string($_POST['descripcion']);

    // Comprobamos que el ID no esté vacío
    if (empty($identificador)) {
        die("Error: No se ha recibido el ID del Pokémon.");
    }

    // 3. Sentencia SQL: Actualizamos todo MENOS nombre y nº_pokedex
    $sql = "UPDATE pokemons SET 
                tipo = '$tipo', 
                region = '$region', 
                habilidad = '$habilidad', 
                descripcion = '$descripcion' 
            WHERE pokemons_id = '$identificador'";

    if ($mysqli->query($sql)) {
        // 4. ÉXITO: Cerramos conexión y redirigimos
        $mysqli->close();
        header("Location: home.php");
        exit();
    } else {
        // FALLO: Mostramos el error de SQL
        die("Error al actualizar la base de datos: " . $mysqli->error);
    }
} else {
    // Si alguien entra aquí por error, lo mandamos a home
    header("Location: home.php");
    exit();
}
?>