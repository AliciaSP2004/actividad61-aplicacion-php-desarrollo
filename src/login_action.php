<?php
include_once("config.php");
session_start();

if (isset($_POST['inicia'])) {
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $_POST['password']; // No escapamos para verificar el hash

    // BUSCAMOS EN LA TABLA 'usuario' (la de tu SQL de Pokémon)
    $resultado = $mysqli->query("SELECT * FROM usuario WHERE correo = '$email'");

    if ($resultado->num_rows === 0) {
        $_SESSION['login_error'] = 'El correo no existe';
        header("Location: login.php");
        exit();
    } else {
        $fila = $resultado->fetch_assoc();
        
        // VERIFICAMOS LA CONTRASEÑA CIFRADA
        if (password_verify($password, $fila['contrasena'])) {
            // LOGIN CORRECTO: Guardamos los datos reales de tu tabla usuario
            $_SESSION['username'] = $fila['nombre_usuario'];
            $_SESSION['name'] = $fila['nombre'];
            $_SESSION['surname'] = $fila['apellido'];
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
