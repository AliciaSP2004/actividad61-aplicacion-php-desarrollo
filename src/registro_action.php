<?php
session_start();
session_unset();
session_destroy();
session_start();
include_once("config.php");

if (isset($_POST['inserta'])) {
    $email = $mysqli->real_escape_string($_POST['email']);
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if (empty($email) || empty($username) || empty($password)) {
        header("Location: registro.php?error=vacio");
        exit();
    }

    if ($password !== $confirm_password) {
        header("Location: registro.php?error=password");
        exit();
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO usuario (correo, nombre_usuario, contrasena) VALUES ('$email', '$username', '$password_hash')";
        
        if ($mysqli->query($sql)) {
            session_unset();
            header("Location: login.php?registro=exito");
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
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