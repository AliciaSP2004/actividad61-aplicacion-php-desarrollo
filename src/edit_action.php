<?php
include_once("config.php");
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


if (isset($_POST['modifica'])) {
    
    $identificador = $mysqli->real_escape_string($_POST['identificador']);
    $tipo          = $mysqli->real_escape_string($_POST['tipo']);
    $region        = $mysqli->real_escape_string($_POST['region']);
    $habilidad     = $mysqli->real_escape_string($_POST['habilidad']);
    $descripcion   = $mysqli->real_escape_string($_POST['descripcion']);

    
    if (empty($identificador)) {
        die("Error: No se ha recibido el ID del Pokémon.");
    }

    
    $sql = "UPDATE pokemons SET 
                tipo = '$tipo', 
                region = '$region', 
                habilidad = '$habilidad', 
                descripcion = '$descripcion' 
            WHERE pokemons_id = '$identificador'";

    if ($mysqli->query($sql)) {
        
        $mysqli->close();
        header("Location: home.php");
        exit();
    } else {
        
        die("Error al actualizar la base de datos: " . $mysqli->error);
    }
} else {
    
    header("Location: home.php");
    exit();
}
?>