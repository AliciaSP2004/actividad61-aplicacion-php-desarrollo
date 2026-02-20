<?php
session_start();
include_once("config.php");

// 1. IMPORTANTE: Comprobar que el nombre del botón coincide (name="inicia")
if (isset($_POST['inicia'])) {
    
    // 2. Aquí es donde suele fallar: 'username' debe coincidir con el name del input del login.php
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // 3. Consulta a tu NUEVA tabla (usando 'nombre_usuario' y 'contrasena')
    $sql = "SELECT * FROM usuario WHERE nombre_usuario = '$username'";
    $resultado = $mysqli->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_array();

        // 4. Verificación de la contraseña con el hash
        if (password_verify($password, $fila['contrasena'])) {
            
            // Guardamos en la sesión el nuevo nombre de columna
            $_SESSION['username'] = $fila['nombre_usuario'];
            
            // 5. REDIRECCIÓN (Sin HTML previo para evitar error 500)
            header("Location: home.php");
            exit();
        } else {
            // Contraseña mal
            header("Location: login.php?error=credenciales");
            exit();
        }
    } else {
        // Usuario no existe
        header("Location: login.php?error=noexiste");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>