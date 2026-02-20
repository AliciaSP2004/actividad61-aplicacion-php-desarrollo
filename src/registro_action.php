<?php
// 1. Manejo de Sesiones: Limpiamos rastros de usuarios anteriores
session_start();
session_unset();
session_destroy();

// 2. Iniciamos una sesión limpia para posibles mensajes
session_start();

// 3. Conexión a la base de datos
include_once("config.php");

if (isset($_POST['inserta'])) {
    // 4. Recogida de datos segura
    $email = $mysqli->real_escape_string($_POST['email']);
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // 5. Validaciones básicas
    if (empty($email) || empty($username) || empty($password)) {
        header("Location: registro.php?error=vacio");
        exit();
    }

    if ($password !== $confirm_password) {
        header("Location: registro.php?error=password");
        exit();
    }

    // 6. Cifrado de contraseña (Requisito de Seguridad)
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    try {
        // 7. Intento de inserción
        $sql = "INSERT INTO usuario (correo, nombre_usuario, contrasena) VALUES ('$email', '$username', '$password_hash')";
        
        if ($mysqli->query($sql)) {
            // ÉXITO: Antes de ir al login, nos aseguramos de que no haya variables de sesión
            session_unset();
            header("Location: login.php?registro=exito");
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        // 8. Control de usuario duplicado (Error 1062)
        if ($e->getCode() == 1062) {
            // Si el usuario existe, lo mandamos al login como pediste
            header("Location: login.php?error=existe");
        } else {
            header("Location: registro.php?error=db");
        }
        exit();
    }
} else {
    header("Location: registro.php");
    exit();
}
?>