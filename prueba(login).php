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

    <div class="container-fluid d-flex align-items-center justify-content-center" style="height: 100vh;">

        <div class="card" style="width: 18rem;">
            <b>
                <div class="card-header text-center fs-4 bg-primary text-white">INICIAR SESION</div>  
            </b>
                <div class="card-body">

            <b>
        
            <form action="php/auth.php" method="post">
                    <label for="">Usuario</label>
                    <input type="text" class="form-control" placeholder="correo_electronico@hotmail.com" name="usuario" required>
                
            </b>

            <b>
                <br>

                    <label for="">Contraseña</label>
                    <input type="password" class="form-control" placeholder="Contraseña" name="pass" required>
          </b>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
            </div>

            </form>
    </div>   

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>