<?php
session_start();
include_once("config.php");


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Consultar los pokemons de la base de datos
$resultado = $mysqli->query("SELECT * FROM pokemons ORDER BY nº_pokedex ASC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex - Panel Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f6; }
        .navbar-custom { background-color: #ef5350; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .table-container { background: white; border-radius: 15px; padding: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .badge-tipo { font-size: 0.85rem; padding: 0.5em 0.8em; border-radius: 8px; }
        .btn-add { background-color: #3b4cca; color: white; border-radius: 10px; transition: 0.3s; }
        .btn-add:hover { background-color: #2a3990; color: white; transform: translateY(-2px); }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#"><i class="bi bi-pokedex me-2"></i>POKÉDEX APP</a>
        <div class="d-flex align-items-center">
            <span class="navbar-text text-white me-3 d-none d-md-inline">
                Bienvenido, <strong><?php echo $_SESSION['username']; ?></strong>
            </span>
            <a href="logout.php" class="btn btn-outline-light btn-sm"><i class="bi bi-box-arrow-right"></i> Salir</a>
        </div>
    </div>
</nav>

<div class="container">
    
    <?php if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'alta_ok'): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> ¡Pokémon registrado con éxito!
            <button type="button" class="btn-close" data-bs-alert="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="table-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 fw-bold mb-0 text-secondary">Listado de Pokémon</h2>
            <a href="add.php" class="btn btn-add shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Nuevo Pokémon
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Nº</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Región</th>
                        <th>Habilidad</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($fila = $resultado->fetch_array()): ?>
                    <tr>
                        <td class="ps-3 fw-bold text-muted">#<?php echo $fila['nº_pokedex']; ?></td>
                        <td><span class="fw-bold text-dark"><?php echo $fila['nombre']; ?></span></td>
                        <td>
                            <span class="badge bg-info text-dark badge-tipo text-uppercase">
                                <?php echo $fila['tipo']; ?>
                            </span>
                        </td>
                        <td><?php echo $fila['region']; ?></td>
                        <td><small class="text-muted"><?php echo $fila['habilidad']; ?></small></td>
                        <td class="text-center">
                            <div class="btn-group shadow-sm" role="group">
                                <a href="edit.php?identificador=<?php echo $fila['pokemons_id']; ?>" class="btn btn-outline-warning btn-sm" title="Editar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="delete.php?identificador=<?php echo $fila['pokemons_id']; ?>" 
                                   class="btn btn-outline-danger btn-sm" 
                                   onclick="return confirm('¿Seguro que quieres eliminar a <?php echo $fila['nombre']; ?>?')"
                                   title="Eliminar">
                                    <i class="bi bi-trash3"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        
        <?php if($resultado->num_rows == 0): ?>
            <div class="text-center py-5">
                <i class="bi bi-search" style="font-size: 3rem; color: #ccc;"></i>
                <p class="text-muted mt-2">No hay pokemons en la base de datos.</p>
            </div>
        <?php endif; ?>
    </div>

    <footer class="mt-5 mb-4 text-center text-muted small">
        <hr>
        Created by Alicia &copy; 2026 
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>