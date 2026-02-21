<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altas - Pokédex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .navbar { background-color: #ef5350; }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark mb-4 shadow">
        <div class="container">
            <span class="navbar-brand fw-bold">NUEVO POKÉMON</span>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="card p-4 mx-auto" style="max-width: 700px;">
            <h2 class="text-center mb-4">Registro de Alta</h2>

            <form method="post" action="add_action.php">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Nº Pokedex</label>
                        <input type="number" name="n_pokedex" class="form-control" placeholder="Ej: 25" required>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label fw-bold">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ej: Pikachu" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Tipo</label>
                    <input type="text" name="tipo" class="form-control" placeholder="Ej: Eléctrico" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Descripción de la Pokedex</label>
                    <textarea name="descripcion" class="form-control" rows="3"></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Habilidad</label>
                        <input type="text" name="habilidad" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Debilidad</label>
                        <input type="text" name="debilidad" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Región</label>
                        <select name="region" class="form-select" required>
                            <option value="" disabled selected>Selecciona región...</option>
                            <option value="Kanto">Kanto</option>
                            <option value="Johto">Johto</option>
                            <option value="Hoenn">Hoenn</option>
                            <option value="Sinnoh">Sinnoh</option>
                            <option value="Teselia">Teselia</option>
                            <option value="Kalos">Kalos</option>
                            <option value="Alola">Alola</option>
                            <option value="Galar">Galar</option>
                            <option value="Paldea">Paldea</option>
                            <option value="Unova">Unova</option>
                            <option value="Hisui">Hisui</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Generación</label>
                        <select name="generacion" class="form-select" required>
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
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" name="inserta" class="btn btn-primary px-5">Aceptar</button>
                    <button type="button" onclick="location.href='home.php'" class="btn btn-secondary px-5">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <footer class="text-center mt-4 p-4 text-muted">
        <p><a href="home.php" class="text-decoration-none">← Volver al listado</a></p>
        <p>Sesión activa: <strong><?php echo $_SESSION['username']; ?></strong> | <a href="logout.php">Cerrar sesión</a></p>
        <hr>
        Created by Alicia &copy; 2026
    </footer>
</body>
</html>