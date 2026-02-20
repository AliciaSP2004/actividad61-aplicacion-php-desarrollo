<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
session_start();
if (!isset($_SESSION['username'])) {
	header("Location: login.php");
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Modificaciones</title>
</head>
<body>
<div>
	<header>
		<h1>APLICACION POKEMONS</h1>
	</header>
	<main>				

<?php
/*Se comprueba si se ha llegado a esta página PHP a través del formulario de edición. 
Para ello se comprueba la variable de formulario: "modifica" enviada al pulsar el botón Guardar de dicho formulario.
Los datos del formulario se acceden por el método: POST
*/

//echo $_POST['modifica'].'<br>';
if(isset($_POST['modifica'])) {
/*Se obtienen los datos del empleado (id, nombre, apellido, edad y puesto) a partir del formulario de edición (identificador, name, surname, age y job)  por el método POST.
Se envía a través del body del HTTP Request. No aparecen en la URL como era el caso del otro método de envío de datos: GET
Recuerda que   existen dos métodos con los que el navegador puede enviar información al servidor:
1.- Método HTTP GET. Información se envía de forma visible. A través de la URL (header HTTP Request )
En PHP los datos se administran con el array asociativo $_GET. En nuestro caso el dato del empleado se obiene a través de la clave: $_GET['identificador']
2.- Método HTTP POST. Información se envía de forma no visible. A través del cuerpo del HTTP Request 
PHP proporciona el array asociativo $_POST para acceder a la información enviada.
*/

	$identificador = $mysqli->real_escape_string($_POST['identificador']);
    $n_pokedex     = $mysqli->real_escape_string($_POST['n_pokedex']);
    $nombre        = $mysqli->real_escape_string($_POST['nombre']);
    $tipo          = $mysqli->real_escape_string($_POST['tipo']);
    $region        = $mysqli->real_escape_string($_POST['region']);
    $habilidad     = $mysqli->real_escape_string($_POST['habilidad']);
    $descripcion   = $mysqli->real_escape_string($_POST['descripcion']);
	if(empty($nombre) || empty($n_pokedex) || empty($tipo)) {
        echo "<div class='alert alert-danger'>Error: Los campos Nombre, Nº Pokedex y Tipo son obligatorios.</div>";
        echo "<a href='javascript:self.history.back();' class='btn btn-secondary'>Volver atrás</a>";
    } 
    else {
        // 4. Ejecución de la sentencia UPDATE
        // IMPORTANTE: Los nombres de las columnas deben coincidir con database.sql
        $sql = "UPDATE pokemons SET 
                    nº_pokedex = '$n_pokedex', 
                    nombre = '$nombre', 
                    tipo = '$tipo', 
                    region = '$region', 
                    habilidad = '$habilidad', 
                    descripcion = '$descripcion' 
                WHERE pokemons_id = $identificador";

        if($mysqli->query($sql)) {
            // Si la actualización es exitosa, redirigimos a home.php
            header("Location: home.php");
        } else {
            // Si hay un error en la base de datos
            echo "<div class='alert alert-danger'>Error al actualizar: " . $mysqli->error . "</div>";
            echo "<a href='home.php' class='btn btn-secondary'>Volver al inicio</a>";
        }
    }
} else {
    // Si alguien intenta entrar a esta página sin pasar por el formulario
    header("Location: home.php");
}

// Cerramos la conexión
$mysqli->close();
?>

</body>
</html>


?>

    
	</main>	
</div>
</body>
</html>

