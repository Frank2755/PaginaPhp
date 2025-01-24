<?php

$mysqli = new mysqli( "localhost", "root", "", "escuela1bd");

$nombres_est = $_POST ["nombres_est"];
$apellidos_est = $_POST ["apellidos_est"];
$cedula_est = $_POST ["cedula_est"];
$correo_est = $_POST ["correo_est"];
$telefono_est = $_POST ["telefono_est"];

if (isset($nombres_est) == null OR (isset($apellidos_est))) {
    echo '<script>alert("todos los campos deben estar llenos");window.location.href="agregar_estudiante.php"</script>;';
} else {
    $insercion = "INSERT estudiantes SET
    nombres   = '$nombres_est',
    apellidos = '$apellidos_est',
    cedula    = '$cedula_est',
    correo    = '$correo_est',
    telefono  = '$telefono_est'";


$resultado  = $mysqli->query($insercion);

if ($resultado) {
    echo '<script>alert("estudiante agregado exitosamente");window.location.href="agregar_estudiante.php"</script>';
} else {
    echo "hubo un error al intentar guardar los datos";
}

}




$mysqli->close();

?>

