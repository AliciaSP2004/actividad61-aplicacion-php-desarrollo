<?php
session_start();
include_once("config.php");


if (isset($_POST['inicia'])) {
    
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuario WHERE nombre_usuario = '$username'";
    $resultado = $mysqli->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_array();

        
        if (password_verify($password, $fila['contrasena'])) {
            
            
            $_SESSION['username'] = $fila['nombre_usuario'];
            
            
            header("Location: home.php");
            exit();
        } else {
            header("Location: login.php?error=credenciales");
            exit();
        }
    } else {
        header("Location: login.php?error=noexiste");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>