<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>agregar estudiante</title>
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
    <h1>Agregar estudiante</h1>
</div>


<div class="container">
    
    <div class="card">
        <div class="card-body">

        <form action="agregar.php" method="POST">

                <div class="container text-center">
                <div class="row">
                    <div class="col">

                        <label for=""><b>nombres</b></label>
                        <input type="text" class="form-control" name="nombres_est" placeholder="nombres" maxlength="60" required>

                    </div>

                    <div class="col">

                    <label for=""><b>apellidos</b></label>
                        <input type="text" class="form-control" name="apellidos_est" placeholder="apellidos" maxlength="60" required>

                    </div>
        
                </div>
                </div>


                <div class="container text-center">
                <div class="row">
                    <div class="col-4">

                        <label for=""><b>cedula</b></label>
                        <input type="number" class="form-control" name="cedula_est" placeholder="cedula" maxlength="9" required>

                    </div>

                    <div class="col">

                    <label for=""><b>correo</b></label>
                        <input type="email" class="form-control" name="correo_est" placeholder="correo" maxlength="40" required>

                    </div>
        
                </div>
                </div>

                <div class="container text-center">
                <div class="row">
                    <div class="col">

                        <label for=""><b>telefono</b></label>
                        <input type="number" class="form-control" name="telefono_est" placeholder="telefono" maxlength="15" required>

                    </div>
        
                </div>
                </div>

            <div class="text-center mt-5">

                <button type="submit" class="btn btn-primary">agregar</button>
                <button type="reset" class="btn btn-secondary">borrar</button>
                <a href="estudiantes.php"><button type="button" class="btn btn-danger">Cancelar</button></a>

            </div>

        </form>
       
        </div>
    </div>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

