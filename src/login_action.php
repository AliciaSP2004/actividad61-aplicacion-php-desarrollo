<?php
include_once("config.php");
session_start();

if (isset($_POST['inicia'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']); 

    $email_esc = $mysqli->real_escape_string($email);

    $resultado = $mysqli->query("SELECT * FROM usuario WHERE correo = '$email_esc'");

    if ($resultado->num_rows === 0) {
        $_SESSION['login_error'] = 'El correo no existe';
        header("Location: login.php");
        exit();
    } else {
        $fila = $resultado->fetch_assoc();
        
        $hash_db = trim($fila['contrasena']);

        if (password_verify($password, $hash_db)) {
            $_SESSION['user_id'] = $fila['usuario_id'];
            $_SESSION['username'] = $fila['nombre_usuario'];
            $_SESSION['email'] = $fila['correo'];

            header("Location: home.php");
            exit();
        } else {
            $_SESSION['login_error'] = 'Contraseña incorrecta';
            header("Location: login.php");
            exit();
        }
    }
} else {
    header("Location: login.php");
    exit();
}
?>