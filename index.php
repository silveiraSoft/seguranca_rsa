<?php

//require_once "funcoes.php";
//require_once "enc/encriptar.php";
require_once __DIR__ . "/enc/encriptar.php";
require_once __DIR__ . "/Seguranca.php";
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
        /*
        $dado = "NÁPOLES";

        echo "<br> Dado: " . $dado;
        $_GET['var1'] = 1;
        var_dump($_GET);
        if (filter_has_var(INPUT_GET, 'var1')) {
            echo "<br> GET: " . $_GET['var1'];
        }
        */
        /*
        $seguranca = new Seguranca();
        $dadoEncriptado = $seguranca->encrypt('NÁPOLES');
        echo "<br> Dado encriptado: " . $dadoEncriptado;
        $dadoDescriptado = $seguranca->decrypt($dadoEncriptado);

        echo "<br> Dado descriptado: " . $dadoDescriptado . "<br>";
        */
        $result = obterChavePrivadaRsa();
        extract($result);

        $dado = "NÁPOLES";
        echo "<br> Dado: " . $dado;
        /*
        $seguranca = new Seguranca($kh);
        $dadoEncriptado = $seguranca->encrypt('NÁPOLES');
        echo "<br> Dado encriptado: " . $dadoEncriptado;
        $dadoDescriptado = $seguranca->decrypt($dadoEncriptado);
        */
        Seguranca::obterChavePrivadaRsa();
        $dadoEncriptado = Seguranca::encrypt('NÁPOLES');
        echo "<br> Dado encriptado: " . $dadoEncriptado;
        $dadoDescriptado = Seguranca::decrypt($dadoEncriptado);
        echo "<br> Dado descriptado: " . $dadoDescriptado . "<br>";

        require_once 'viewLogin.php';
        ?>
    </div> 

    <script type="text/javascript" src="login.js"></script>
</body>

</html>
