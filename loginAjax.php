<?php

header('Content-type: application/json');
ini_set('default_charset', 'utf-8');
require_once __DIR__ . "/enc/encriptar.php";
$result = obterChavePrivadaRsa();
extract($result ?? []);
$senha = filter_input(INPUT_POST, 'dadoEncriptado', FILTER_SANITIZE_STRING);

//descriptando
$dado = pack('H*', $senha);
if (openssl_private_decrypt($dado, $r, $kh)) {
    $dado = $r;
}

//$result = utf8_encode($dado);
if ($dado == "NÁPOLES") {
    $result = "Sessão iniciada com senha: " . $dado;
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    exit();
}
$result = "Sessão não iniciada com senha: " . $dado;
echo json_encode($result, JSON_UNESCAPED_UNICODE);
exit();
