<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Pokédex App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #3b4cca 50%, #ffffff 50%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }
        .card-register {
            border-radius: 20px;
            border: none;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            overflow: hidden;
            background-color: white;
            width: 100%;
            max-width: 450px;
        }
        .register-header {
            background-color: #ef5350; /* Rojo Pokémon */
            color: white;
            padding: 25px;
            text-align: center;
        }
        .btn-poke {
            background-color: #ef5350;
            color: white;
            border: none;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-poke:hover {
            background-color: #d32f2f;
            transform: translateY(-2px);
            color: white;
        }
        .form-label { font-weight: bold; color: #444; }
    </style>
</head>
<body>

<div class="card-register shadow">
    <div class="register-header">
        <i class="bi bi-person-plus-circle" style="font-size: 2.5rem;"></i>
        <h3 class="mb-0 text-uppercase fw-bold">Registro</h3>
        <small>Únete a la aventura, Entrenador</small>
    </div>

    <div class="card-body p-4">
        
        <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-exclamation-circle-fill me-2"></i>
                <?php 
                    $err = $_GET['error'];
                    if($err == 'vacio') echo "Rellena todos los campos.";
                    elseif($err == 'password') echo "Las contraseñas no coinciden.";
                    elseif($err == 'duplicado') echo "El usuario o email ya existen.";
                    else echo "Error al procesar el registro.";
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form action="registro_action.php" method="post">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="ejemplo@correo.com" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Nombre de Usuario</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="Nombre de entrenador" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" placeholder="******" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label">Confirmar</label>
                    <input type="password" name="confirm_password" class="form-control" placeholder="******" required>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" name="inserta" class="btn btn-poke py-2">CREAR CUENTA</button>
            </div>
        </form>
    </div>

    <div class="card-footer text-center bg-light py-3">
        <span class="text-muted small">¿Ya tienes una cuenta?</span> 
        <a href="login.php" class="text-decoration-none fw-bold" style="color: #3b4cca;">Inicia sesión</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>