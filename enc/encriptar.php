<?php

function obterChavePrivadaRSA()
{
    $pk = file_get_contents(realpath(__DIR__ . DIRECTORY_SEPARATOR .  'private.pem'));
    $kh = openssl_pkey_get_private($pk, "chave");
    $detalles = openssl_pkey_get_details($kh);
    $result = ['detalles' => $detalles, 'pk' => $pk, 'kh' => $kh];
    return $result;
}

function to_hex($data)
{
    return strtoupper(bin2hex($data));
}
