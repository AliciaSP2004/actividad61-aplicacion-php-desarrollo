<?php
/* 1. Incluye parámetros de conexión y variables de entorno de Docker */
include_once("config.php");

session_start();

/* 2. Control de acceso: Si no hay sesión, vuelve al login */
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

/* 3. Recoger datos del usuario desde la sesión (definidos en login_action.php) */
$name = $_SESSION['name'] ?? 'Entrenador';
$surname = $_SESSION['surname'] ?? '';
$email = $_SESSION['email'] ?? '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Pokédex - Panel de Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
        <h1 class="display-5 fw-bold text-danger">PANEL DE CONTROL POKÉDEX</h1>
    </header>

    <main>
        <div class="p-4 mb-4 bg-light rounded-3">
            <p><strong>Bienvenido/a,</strong> <?php echo htmlspecialchars($name . " " . $surname); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <a href="logout.php" class="btn btn-outline-secondary btn-sm">Cerrar Sesión</a>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Listado de Pokémons</h2>
            <a href="add.php" class="btn btn-primary">Registrar Nuevo Pokémon</a>
        </div>

        <table class="table table-striped table-hover border">
            <thead class="table-dark">
                <tr>
                    <th>Nº Pokedex</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Región</th>
                    <th>Generación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                /* 4. Consulta a la tabla 'pokemons' definida en database.sql */
                $resultado = $mysqli->query("SELECT * FROM pokemons ORDER BY nº_pokedex ASC");

                if ($resultado && $resultado->num_rows > 0) {
                    while($fila = $resultado->fetch_array()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($fila['nº_pokedex']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['tipo']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['region']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['generacion']) . "</td>";
                        echo "<td>";
                        /* Usamos 'pokemons_id' que es la PK en tu database.sql */
                        echo "<a href='edit.php?identificador=".$fila['pokemons_id']."' class='btn btn-sm btn-warning me-2'>Editar</a>";
                        echo "<a href='delete.php?identificador=".$fila['pokemons_id']."' class='btn btn-sm btn-danger' onClick=\"return confirm('¿Estás seguro de que quieres eliminar a ".$fila['nombre']."?')\">Borrar</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No hay pokémons registrados en la base de datos.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>

    <footer class="pt-3 mt-4 text-muted border-top">
        Alicia &copy; 2026
    </footer>
</body>
</html>