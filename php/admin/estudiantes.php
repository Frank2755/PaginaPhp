<?php
session_start();

$mysqli = new mysqli( "localhost", "root", "", "escuela1bd");

$consulta = "SELECT*FROM estudiantes";
$resultado = $mysqli->query($consulta);
$filas = $resultado->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>index</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/estilos.css">
</head>
<body style="background-color: lightgray">

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
    <h1>Lista de estudiantes</h1>
</div>


<div class="container">
    <div class="card">
    <div class="card-header">
        
                <div class="container text-center">
            <div class="row">
                <div class="col">

                    <a href ="agregar_estudiante.php"><button class="btn btn-primary">agregar estudiantes</button></a>
                   
                </div>

                <div class="col">

                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" placeholder="escribe para buscar" aria-describedby="basic-addon1">
                </div>
                </div>
                
                <div class="col">

                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" placeholder="escribe para buscar" aria-describedby="basic-addon1">
                </div>
                </div>

            </div>
            </div>

    </div>
    <div class="card-body table-scroll">
        <table class="table table-sm">
            <thead>
                <tr class="bg-primary text-white text-center">
                   <th>#</th>
                   <th>estudiantes</th>
                   <th>apellidos</th>
                   <th>cedula</th>
                   <th>telefono</th>
                   <th>correo</th>
                   <th>acciones</th>
                </tr>
            </thead>

            <tbody>
                <<?php
                    $sum = 1;
                    foreach($filas as $fila){
                ?>
                
                <tr>
                    <td class="text-center"><?php echo $sum++;?></td>
                    <td class="text-center"><?php echo $fila['nombres'];?></td>
                    <td class="text-center"><?php echo $fila['apellidos'];?></td>
                    <td class="text-center"><?php echo $fila['cedula'];?></td>
                    <td class="text-center"><?php echo $fila['telefono'];?></td>
                    <td class="text-center"><?php echo $fila['correo'];?></td>
                    <td>
                        <button type="button" class="btn btn-warning">eliminar</button>
                    </td>
                </tr>

                  <?php  
                  }
                ?>
            </tbody>

        </table>
    </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
