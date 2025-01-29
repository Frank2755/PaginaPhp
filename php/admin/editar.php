<?php

$mysqli = new mysqli( "localhost", "root", "", "escuela1bd");

$id_est = $_POST ["id_est"];
$nombres_est = $_POST ["nombres_est"];
$apellidos_est = $_POST ["apellidos_est"];
$cedula_est = $_POST ["cedula_est"];
$correo_est = $_POST ["correo_est"];
$telefono_est = $_POST ["telefono_est"];

$edicion = "UPDATE estudiantes SET

    nombres = '$nombres_est',
    apellidos = '$apellidos_est',
    cedula = '$cedula_est',
    correo = '$correo_est',
    telefono = '$telefono_est'
    
    WHERE id = $id_est  
";

$resultado  = $mysqli->query($edicion);

if ($resultado) {
    echo '<script>alert("estudiante actualizado exitosamente");window.location.href="estudiantes.php"</script>';
} 
else {
    echo "hubo un error al intentar guardar los datos";
}
$mysqli->close();
?>