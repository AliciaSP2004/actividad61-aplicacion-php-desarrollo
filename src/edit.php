<?php
session_start();
include_once("config.php");

// 1. Control de acceso (Ejercicio 1)
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// 2. Obtener los datos del Pokémon actual
if (isset($_GET['identificador'])) {
    $id = $mysqli->real_escape_string($_GET['identificador']);
    $resultado = $mysqli->query("SELECT * FROM pokemons WHERE pokemons_id = $id");
    $pokemon = $resultado->fetch_assoc();

    if (!$pokemon) {
        header("Location: home.php?error=no_encontrado");
        exit();
    }
} else {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pokémon - <?php echo $pokemon['nombre']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        
        /* Título Bonito con degradado naranja/amarillo (estilo evolución/energía) */
        .edit-header {
            background: linear-gradient(135deg, #f57f17 0%, #ffca28 100%);
            color: white;
            padding: 40px 20px;
            border-radius: 20px 20px 0 0;
            text-align: center;
            position: relative;
        }

        .icon-badge {
            background: white;
            color: #f57f17;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 2rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .card-edit {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-top: -20px;
            background: white;
        }

        .form-label { font-weight: 600; color: #555; margin-top: 10px; }
        .btn-update { background-color: #f57f17; color: white; font-weight: bold; border: none; }
        .btn-update:hover { background-color: #e65100; color: white; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="edit-header shadow">
                <div class="icon-badge">
                    <i class="bi bi-pencil-square"></i>
                </div>
                <h1 class="h2 fw-bold mb-0 text-uppercase">Modificar Registro</h1>
                <p class="mb-0 opacity-75">Actualizando a: <strong><?php echo $pokemon['nombre']; ?></strong> (ID #<?php echo $pokemon['nº_pokedex']; ?>)</p>
            </div>

            <div class="card card-edit">
                <div class="card-body p-4 p-md-5">
                    
                    <form action="edit_action.php" method="post">
                        <input type="hidden" name="pokemons_id" value="<?php echo $pokemon['pokemons_id']; ?>">

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Nº Pokedex</label>
                                <input type="number" name="n_pokedex" class="form-control" value="<?php echo $pokemon['nº_pokedex']; ?>" required>
                            </div>
                            <div class="col-md-8 mb-3">
                                <label class="form-label">Nombre del Pokémon</label>
                                <input type="text" name="nombre" class="form-control" value="<?php echo $pokemon['nombre']; ?>" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tipo</label>
                            <input type="text" name="tipo" class="form-control" value="<?php echo $pokemon['tipo']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea name="descripcion" class="form-control" rows="3"><?php echo $pokemon['descripcion']; ?></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Habilidad</label>
                                <input type="text" name="habilidad" class="form-control" value="<?php echo $pokemon['habilidad']; ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Debilidad</label>
                                <input type="text" name="debilidad" class="form-control" value="<?php echo $pokemon['debilidad']; ?>" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Región</label>
                                <select name="region" class="form-select">
                                    <?php 
                                    $regiones = ["Kanto", "Johto", "Hoenn", "Sinnoh", "Teselia", "Kalos", "Alola", "Galar", "Paldea"];
                                    foreach($regiones as $r) {
                                        $selected = ($pokemon['region'] == $r) ? "selected" : "";
                                        echo "<option value='$r' $selected>$r</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Generación</label>
                                <select name="generacion" class="form-select">
                                    <?php 
                                    for($i=1; $i<=9; $i++) {
                                        $val = $i . "º";
                                        $selected = ($pokemon['generacion'] == $val) ? "selected" : "";
                                        echo "<option value='$val' $selected>$val</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="home.php" class="btn btn-light px-4">Cancelar</a>
                            <button type="submit" name="modifica" class="btn btn-update px-5 shadow-sm">
                                GUARDAR CAMBIOS
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <footer class="text-center mt-5 text-muted small">
                <p>Sesión iniciada como: <?php echo $_SESSION['username']; ?></p>
                Created by Alicia &copy; 2026
            </footer>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

