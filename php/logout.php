<?php

session_start(); //variable sesion para iniciarla

   if (!isset($_SESSION["id_usu"])) {  //If no ha iniciado sesion sera enviado a la pagina index.html
        header("location: ../index.html");
        exit();
   }

   session_destroy(); //funcion propia de las variables session que lleva al siguiente echo

   echo '<script>alert("vuelve pronto"); window.location.href="../index.html";</script>'; //esta linea de codigo es de javascript y sirve para mostrar un mensaje de "vuelve pronto"
                                                                                            

?>

