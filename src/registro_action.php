<?php
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Registro - Pokédex</title>
</head>
<body>
    <header>
        <h1>APLICACIÓN POKEMON</h1>
    </header>
    <main>

<?php
if(isset($_POST['inserta'])) 
{
    $email = $mysqli->real_escape_string($_POST['email']);
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $_POST['password']; // No escapamos para el hash
    $confirm_password = $_POST['confirm_password'];

    // 1. VALIDACIONES BÁSICAS
    if(empty($email) || empty($username) || empty($password)) 
    {
        echo "<div>Error: Todos los campos son obligatorios.</div>";
        echo "<a href='javascript:self.history.back();'>Volver atrás</a>";
    } 
    elseif ($password !== $confirm_password) 
    {
        echo "<div>Error: Las contraseñas no coinciden.</div>";
        echo "<a href='javascript:self.history.back();'>Volver atrás</a>";
    }
    else 
    {
        // 2. CIFRADO DE CONTRASEÑA (Fundamental para login_action.php)
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // 3. INSERCIÓN EN LA TABLA CORRECTA ('usuario')
        // Usamos los nombres de columnas de tu database.sql: nombre_usuario, contrasena, correo
        $sql = "INSERT INTO usuario (correo, nombre_usuario, contrasena) VALUES ('$email', '$username', '$password_hash')";

        if($mysqli->query($sql)) 
        {
            echo "<div>Usuario registrado correctamente.</div>";
            echo "<a href='login.php'>Ir al inicio de sesión</a>";
        } 
        else 
        {
            echo "<div>Error al registrar: " . $mysqli->error . "</div>";
            echo "<a href='javascript:self.history.back();'>Volver atrás</a>";
        }
    }
    $mysqli->close();
} 
else 
{
    header("Location: registro.php");
}
?>
    </main>
</body>
</html>