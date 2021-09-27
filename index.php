<?php

//require_once "funcoes.php";
//require_once "enc/encriptar.php";
require_once __DIR__ . "/enc/encriptar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="lib/js/rsa/jsbn.js"></script>
    <script type="text/javascript" src="lib/js/rsa/prng4.js"></script>
    <script type="text/javascript" src="lib/js/rsa/rng.js"></script>
    <script type="text/javascript" src="lib/js/rsa/rsa.js"></script>
</head>

<body>
    <div>
        <?php
        $result = obterChavePrivadaRSA();
        $teste = 1;
        extract($result ?? []);
        require_once 'view.login.php';
        ?>
    </div> 

    <script type="text/javascript" src="login.js"></script>
</body>

</html>
