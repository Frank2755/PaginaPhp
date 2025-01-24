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
    <h1>Bienvenido <?php echo $_SESSION['nombre_usu'];?> </h1>
</div>

<div class="container text-center">
  <div class="row">
    <div class="col">
    
                        <div class="container-fluid d-flex align-items-center justify-content-center" style="height: 50vh;">

                    <div class="card" style="width: 18rem;">
                    <div class="card-header text-center fs-4 bg-success text-white">estudiantes en BD</div>       
                    <div class="card-body bg-success text-white">

                        <h1>    
                            <?php
                            echo count($filas);
                            ?>
                        </h1>
                        
                    </div>   
                    </div>
                    </div>
    </div>

    <div class="col">

                        <div class="container-fluid d-flex align-items-center justify-content-center" style="height: 50vh;">

                    <div class="card" style="width: 18rem;">
                     <div class="card-header text-center fs-4 bg-success text-white">Profesores en BD</div>       
                    <div class="card-body bg-success text-white">

                        <h1>20</h1>   
                        
                    </div>   
                    </div>
                    </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

