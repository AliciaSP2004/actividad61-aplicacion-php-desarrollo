<?php
session_start();
// Si ya hay una sesión activa, no mostramos el login y mandamos al home
if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pokédex App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #ef5350 50%, #ffffff 50%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card-login {
            border-radius: 20px;
            border: none;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            overflow: hidden;
            background-color: white;
            width: 100%;
            max-width: 400px;
        }
        .login-header {
            background-color: #333;
            color: white;
            padding: 25px;
            text-align: center;
        }
        .btn-poke {
            background-color: #3b4cca;
            color: white;
            border: none;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-poke:hover {
            background-color: #2a3990;
            color: white;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="card-login shadow">
        
        <div class="login-header">
            <h3 class="mb-0 text-uppercase fw-bold">Pokédex</h3>
            <small>Acceso para Entrenadores</small>
        </div>

        <div class="card-body p-4">

            <?php if(isset($_GET['registro']) && $_GET['registro'] == 'exito'): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> ¡Registro completado! Ya puedes entrar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if(isset($_GET['error'])): ?>
                <?php if($_GET['error'] == 'existe'): ?>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <i class="bi bi-info-circle-fill me-2"></i> Ese usuario ya tiene cuenta. ¡Inicia sesión aquí!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php elseif($_GET['error'] == 'credenciales'): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-x-circle-fill me-2"></i> Usuario o contraseña incorrectos.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <form action="login_action.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label fw-bold">Nombre de Usuario</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Ej: ash_ketchum" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label fw-bold">Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                        <input type="password" name="password" id="password" class="form-control" placeholder="********" required>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="inicia" class="btn btn-poke py-2 shadow-sm">ENTRAR</button>
                </div>
            </form>
        </div>

        <div class="card-footer text-center bg-light py-3">
            <span class="text-muted small">¿No tienes cuenta todavía?</span> <br>
            <a href="registro.php" class="text-decoration-none fw-bold" style="color: #ef5350;">Regístrate como Entrenador</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>