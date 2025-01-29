<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>editar estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>

</head>
<body>

    <ul class="nav justify-content-end bg-primary">
    <li class="nav-item">
        <a class="nav-link active text-white" aria-current="page" href="dashboard.php">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white" href="estudiantes.php">estudiantes</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white" href="#">profesores</a>
    </li>
    <li class="nav-item">
        <a href="../logout.php" class="nav-link text-white">Cerrar Sesion (<?php echo $_SESSION['nombre_usu'];?>)</a>
    </li>
    </ul>

<div class="container text-center mt-5">
    <h1>editar estudiante</h1>
</div>

<?php
$id_est = base64_decode($_GET['id']); 

$mysqli = new mysqli( "localhost", "root", "", "escuela1bd");

$consulta_buscar = "SELECT*FROM estudiantes WHERE (id LIKE '$id_est')";
$resultados_busqueda = $mysqli->query($consulta_buscar);
$filas_busqueda = $resultados_busqueda->fetch_assoc();

?>

<div class="container">
    
    <div class="card">
        <div class="card-body">

            <?php
            if ($resultados_busqueda->num_rows == 1) {
            ?>

        <form action="editar.php" method="POST">
                <div class="container text-center">
                <div class="row">
                    <div class="col">

                        <label for=""><b>nombres</b></label>
                        <input type="text" class="form-control" name="nombres_est" value="<?php echo $filas_busqueda['nombres']?>" placeholder="nombres" maxlength="60" required>

                    </div>

                    <div class="col">

                    <label for=""><b>apellidos</b></label>
                        <input type="text" class="form-control" name="apellidos_est" value="<?php echo $filas_busqueda['apellidos']?>" placeholder="apellidos" maxlength="60" required>

                    </div>
        
                </div>
                </div>


                <div class="container text-center">
                <div class="row">
                    <div class="col-4">

                        <label for=""><b>cedula</b></label>
                        <input type="text" class="form-control" name="cedula_est" value="<?php echo $filas_busqueda['cedula']?>" placeholder="cedula" maxlength="60" required>
                    </div>

                    <div class="col">

                    <label for=""><b>correo</b></label>
                    <input type="text" class="form-control" name="correo_est" value="<?php echo $filas_busqueda['correo']?>" placeholder="correo" maxlength="60" required>

                    </div>
        
                </div>
                </div>

                <div class="container text-center">
                <div class="row">
                    <div class="col">

                        <label for=""><b>telefono</b></label>
                        <input type="text" class="form-control" name="telefono_est" value="<?php echo $filas_busqueda['telefono']?>" placeholder="telefono" maxlength="60" required>
                    </div>
        
                </div>
                </div>

            <div class="text-center mt-5">

                <button type="submit" class="btn btn-primary">actualizar</button>
                <button type="reset" class="btn btn-secondary">borrar</button>
                <a href="estudiantes.php"><button type="button" class="btn btn-danger">Cancelar</button></a>

            </div>

            <input type="hidden" name="id_est" value="<?php echo $id_est;?>">

        </form>
       
        <?php
        } else {
            echo "resultados no encontrados";
         }
        ?>

        </div>
    </div>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

