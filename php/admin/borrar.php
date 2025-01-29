<?php

$mysqli = new mysqli( "localhost", "root", "", "escuela1bd");

$id_est= base64_decode($_GET['id']);

$eliminacion = "DELETE FROM estudiantes WHERE id = $id_est";
$resultado = $mysqli->query($eliminacion);

if ($resultado) {
    echo '<script>alert("estudiante eliminado exitosamente");window.location.href="estudiantes.php"</script>';
} 
else {
    echo "hubo un error al intentar guardar los datos";
}

$mysqli->close();
?>