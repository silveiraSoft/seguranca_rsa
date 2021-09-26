<?php

require_once "funcoes.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <?php
        criarChaveJSPHP();
        echo "<hr>";
        $texto = "NÁPOLES";
        $encriptado = encriptar($texto);
        echo "<pre>";
        echo "encriptado {$texto}:" . $encriptado;
        echo "<pre>";
        echo "desencriptado:" . descriptar($encriptado);
        require_once 'view.login.php';
        ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  
    <script type="text/javascript" src="funcoes.js"></script>
    <script type="text/javascript" src="login.js"></script>

</body>

</html>
