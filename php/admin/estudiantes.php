<?php
session_start();

$mysqli = new mysqli( "localhost", "root", "", "escuela1bd");

$consulta = "SELECT*FROM estudiantes";
$resultado = $mysqli->query($consulta);
$filas = $resultado->fetch_all(MYSQLI_ASSOC);

if (isset($_POST['busqueda'])) {
    $termino_busqueda = $mysqli->real_escape_string($_POST['busqueda']); 

$consulta_buscar = "SELECT*FROM estudiantes WHERE (nombres LIKE '%$termino_busqueda%') OR (apellidos LIKE '%$termino_busqueda%')";
$resultados_busqueda = $mysqli->query($consulta_buscar);
$filas_busqueda = $resultados_busqueda->fetch_all(MYSQLI_ASSOC);

}

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
                    <form action="estudiantes.php" method="post">
                        <div class="input-group mb-3">
                            <input type="text" name="busqueda" class="form-control" placeholder="escribe para buscar" aria-describedby="basic-addon1">
                            <button type="submit" class="btn btn-success">Buscar</button>
                            <a href="estudiantes.php"></a><button class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
                
                <div class="col">
                </div>
            </div>
            </div>

            
            <div class="container text-center">
            <?php 
                if (isset($_POST['busqueda'])) {

            ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <?php
                    echo "Resultados de busqueda para: ".$_POST['busqueda'];
            ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
                <?php
                }
                ?>    
                    
                </div>

                <?php 
               if (isset($_POST['busqueda'])) {
                echo "Resultados de busqueda para: ".$_POST['busqueda'];

                }
                ?>
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
                
            <?php
            
                if (isset($_POST['busqueda'])) {
                    $sum = 1;
                    foreach($filas_busqueda as $fila_busqueda){
                ?>
                
                <tr>
                    <td class="text-center"><?php echo $sum++;?></td>
                    <td class="text-center"><?php echo $fila_busqueda['nombres'];?></td>
                    <td class="text-center"><?php echo $fila_busqueda['apellidos'];?></td>
                    <td class="text-center"><?php echo $fila_busqueda['cedula'];?></td>
                    <td class="text-center"><?php echo $fila_busqueda['telefono'];?></td>
                    <td class="text-center"><?php echo $fila_busqueda['correo'];?></td>
                    <td>
                    <a href="editar_estudiante.php?id=<?php echo base64_encode($fila_busqueda['id']);?>"> <button type="button" class="btn btn-warning">editar</button></a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_eliminar_<?php echo $fila_busqueda['id'];?>">borrar</button>



                    <div class="modal fade" id="modal_eliminar_<?php echo $fila_busqueda['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminar estudiante</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center mt-5">
                            <h4>esta seguro que desea eliminar al estudiante: <?php echo $fila_busqueda['nombres'].' '.$fila_busqueda['apellidos']?></h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="borrar.php?id=<?php echo base64_encode($fila_busqueda['id']);?>"><button type="button" class="btn btn-danger">eliminar</button></a>

                        </div>
                        </div>
                    </div>
                    </div>
                </tr>

                  <?php  
                  }


                } else {
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


                    <a href="editar_estudiante.php?id=<?php echo base64_encode($fila['id']);?>"> <button type="button" class="btn btn-warning">editar</button></a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_eliminar_<?php echo $fila['id'];?>">borrar</button>



                        <div class="modal fade" id="modal_eliminar_<?php echo $fila['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminar estudiante</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center mt-5">
                                <h4>esta seguro que desea eliminar al estudiante: <?php echo $fila['nombres'].' '.$fila['apellidos']?></h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                               <a href="borrar.php?id=<?php echo base64_encode($fila['id']);?>"><button type="button" class="btn btn-danger">eliminar</button></a>
                            </div>
                            </div>
                        </div>
                        </div>

                    </td>
                </tr>

                  <?php  
                  }
            
                

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
