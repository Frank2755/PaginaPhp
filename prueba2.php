<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>index</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <h1>esta pagina funciona con php</h1>
    <br>

    <?php
    $variable = 0;
    $variable2 = '10';
    $variable3 = "esta es una frase para php";

    if ($variable2 > $variable) {
        echo "la variable 2, la cual contiene el valor ".$variable2." es mayor ";
    } else {
        echo "la variable 2, la cual contiene el valor ".$variable2." es menor ";
    }
    
    while ($variable < 10) {
        echo $variable;
        $variable++;
    }


    ?>



</body>
</html>