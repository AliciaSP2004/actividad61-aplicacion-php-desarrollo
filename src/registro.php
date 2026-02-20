<?php
session_start();
$error = $_SESSION['error_registro'] ?? '';
unset($_SESSION['error_registro']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Pokédex</title>
</head>
<body>
<div>
    <header>
        <h1>APLICACIÓN POKEMONS</h1>
    </header>
    <main>              
        <h2>Registro</h2>

        <?php if ($error): ?>
            <p style="color: red;"><strong>Error:</strong> <?php echo $error; ?></p>
        <?php endif; ?>

        <form action="registro_action.php" method="post">
            <div>
                <label for="email">Correo</label>
                <input type="email" name="email" id="email" placeholder="correo electrónico" required>
            </div>
            <div>
                <label for="username">Usuario</label>
                <input type="text" name="username" id="username" placeholder="nombre usuario" required>
            </div>
            <div>
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="contraseña" required>
                
                <label for="confirm_password">Confirmar Contraseña</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="confirmar contraseña" required>
            </div>
            <div>
                <button type="submit" name="inserta" value="si">Aceptar</button>
                <button type="button" onclick="location.href='login.php'">Cancelar</button>
            </div>
        </form>
    </main> 
    <footer>
        <p><a href="login.php">¿Ya tienes una cuenta? Iniciar sesión</a></p>       
        Created by Alicia &copy; 2026
    </footer>
</div>
</body>
</html>