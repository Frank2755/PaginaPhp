<?php
    $usu = $_POST ["usuario"];
    $pass = $_POST ["pass"];

    session_start();

    if (empty($usu) or empty($pass)) {
        echo "usuario o contraseña incorrectas";

        exit ();
    }

    $mysqli = new mysqli( "localhost", "root", "", "escuela1bd");

    if ($mysqli) {
        echo "conexion exitosa";
    }

    $squery = "SELECT*FROM usuarios WHERE nombre_usuario = '$usu' ";
    $result = $mysqli->query($squery);

    //echo $result->num_rows;

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    
        if (password_verify($pass,$row['password'])) {
            $_SESSION['id_usu'] = $row['id'];
            $_SESSION['nombre_usu'] = $row['nombre_usuario'];
            $_SESSION['correo_usu'] = $row['correo_usuario'];
            $_SESSION['tipo_usu'] = $row['tipo_usuario'];

            header("location: admin/dashboard.php");
            exit ();
        
        } else {
            echo "Contraseña Incorrecta";
            exit ();
        }

    } else {
        echo "usuario no encontrado";
        exit ();
    }
    

    $mysqli->close();

?>