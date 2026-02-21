<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a la app Pokedex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://images.alphacoders.com/131/1311005.png') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            color: white;
        }
        .overlay {
            background: rgba(0, 0, 0, 0.6); /* Capa oscura para que se lea el texto */
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
        .content {
            position: relative;
            z-index: 2;
        }
        .btn-pokedex {
            background-color: #ef5350;
            border: none;
            padding: 12px 30px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-pokedex:hover {
            background-color: #d32f2f;
            transform: scale(1.05);
        }
        .btn-outline-custom {
            border: 2px solid white;
            color: white;
            padding: 12px 30px;
            font-weight: bold;
        }
        .btn-outline-custom:hover {
            background: white;
            color: #333;
        }
    </style>
</head>
<body>

<div class="overlay"></div>

<div class="container content text-center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="display-2 fw-bold mb-3">GESTIÓN POKÉDEX</h1>
            <p class="lead mb-5">La herramienta definitiva para entrenadores. Organiza, edita y gestiona tu equipo de Pokémon de manera profesional.</p>
            
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <a href="login.php" class="btn btn-pokedex btn-lg shadow">
                    INICIAR SESIÓN
                </a>
                <a href="registro.php" class="btn btn-outline-custom btn-lg shadow">
                    CREAR CUENTA
                </a>
            </div>
            
            <div class="mt-5">
                <p class="small text-light opacity-75">Created by Alicia &copy; 2026</p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>