<?php
// Mantenemos esto para ver si sale otro error distinto
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once("config.php");

$error = null;

if(isset($_POST['inserta'])) 
{
    $email = $mysqli->real_escape_string($_POST['email']);
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $_POST['password']; 
    $confirm_password = $_POST['confirm_password'];

    if(empty($email) || empty($username) || empty($password)) 
    {
        $error = "Todos los campos son obligatorios.";
    } 
    elseif ($password !== $confirm_password) 
    {
        $error = "Las contraseñas no coinciden.";
    }
    else 
    {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Usamos un bloque try-catch para evitar el "Fatal Error" cuando hay duplicados
        try {
            $sql = "INSERT INTO usuario (correo, nombre_usuario, contrasena) VALUES ('$email', '$username', '$password_hash')";
            
            if($mysqli->query($sql)) 
            {
                $mysqli->close();
                header("Location: login.php?registro=exito");
                exit(); 
            }
        } catch (mysqli_sql_exception $e) {
            // Si el error es el 1062 (Duplicate entry en MySQL)
            if ($e->getCode() == 1062) {
                $error = "El nombre de usuario o el correo ya están registrados.";
            } else {
                $error = "Error inesperado: " . $e->getMessage();
            }
        }
    }
} 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro - Pokémons</title>
</head>
<body>
    <header><h1>APLICACIÓN POKEMONS</h1></header>
    <main>
        <?php if($error): ?>
            <div style="color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 15px; border-radius: 5px;">
                <strong>No se pudo completar el registro:</strong> <?php echo $error; ?>
            </div>
            <br>
            <a href='javascript:self.history.back();'>Volver atrás e intentar con otro nombre</a>
        <?php endif; ?>
    </main>
</body>
</html>