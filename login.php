<?php

require_once 'funcoes.php';
$senha = filter_input(INPUT_POST, 'dadoEncriptado', FILTER_SANITIZE_STRING);
$dadoDescritadoAjax = descriptar($senha);
$result = utf8_encode($dadoDescritadoAjax);
if ($result == "NÁPOLES") {
    $result = "Sessão iniciada com senha: " . $result;
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    exit();
}
$result = "Sessão não iniciada com senha: " . $result;
echo json_encode($result, JSON_UNESCAPED_UNICODE);
exit();
