<?php

require_once __DIR__ . "/enc/encriptar.php";
$result = obterChavePrivadaRSA();
extract($result ?? []);
$senha = filter_input(INPUT_POST, 'dadoEncriptado', FILTER_SANITIZE_STRING);

//descriptando
$datos = pack('H*', $senha);
if (openssl_private_decrypt($datos, $r, $kh)) {
    $datos = $r;
}

$result = utf8_encode($datos);
if ($datos == "NAPOLES") {
    $result = "Sessão iniciada com senha: " . $result;
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    exit();
}
$result = "Sessão não iniciada com senha: " . $result;
echo json_encode($result, JSON_UNESCAPED_UNICODE);
exit();
