<?php
// 1. Iniciamos sesión para verificar que el usuario está logueado (Seguridad Ejercicio 1)
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include("config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bajas - Pokédex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm p-4 text-center">
            <header class="mb-4">
                <h1 class="text-danger">APLICACIÓN POKEMONS</h1>
            </header>
            <main>

            <?php
            // Comprobamos que el identificador existe en la URL
            if (isset($_GET['identificador'])) {
                $identificador = $mysqli->real_escape_string($_GET['identificador']);

                // 2. Consulta con tu nuevo nombre de columna: pokemons_id
                $sql = "DELETE FROM pokemons WHERE pokemons_id = $identificador";

                if ($mysqli->query($sql)) {
                    echo "<div class='alert alert-success'><h4>¡Éxito!</h4>Pokémon eliminado correctamente.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error al eliminar: " . $mysqli->error . "</div>";
                }
                
                $mysqli->close();
            } else {
                echo "<div class='alert alert-warning'>No se ha proporcionado un ID válido.</div>";
            }

            // 3. Redirección automática tras 2 segundos para mejorar la experiencia
            header("refresh:2;url=home.php");
            ?>
            
            <p class="text-muted mt-3 small">Redirigiendo a la lista principal...</p>
            <a href='home.php' class="btn btn-primary mt-2">Volver ahora</a>
            
            </main>
        </div>
    </div>
</body>
</html>