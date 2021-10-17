<?php

declare(strict_types=1);

final class Seguranca
{
    private const PUBKEY =
    '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAqn6D8l6lHZjfZag6hxgl
FE71jys1R7/iRycWizMuDnDFsDKibMFTOfOqLb7M6BSeR1RD8Osp7xYo1wWC2C9W
93OmFdmX+MAq1qOGLJOK+Hmkn8z14MoYE8er5aoGVDR5jnHzuvs5XZ3BGjlrakhc
ihe1ZLWt3hmi34LS6J/LKHlRVu6s+LP+sPyJVmHrCd2Q8AMQGbs73e79I9PSr8o6
9M4YXLryMuyLWbJEMGsf/9GmHYWdRnPEpNQHu+bWHLfKF+WHITQeTfGQDE0PPnW3
A9I0PbuoDAXinfyluLaG52ZKDUjrfqZmBq3hMkLW9frhYk+DdRR9RiDj9jPBu3gL
OwIDAQAB
-----END PUBLIC KEY-----';
    private static string $privkey;
    private static string $pk;
    private static $kh;
    private const FRASE = 'chave';
    public static array $detalhes = [];

    /*
    function __construct()
    {
        $this->frase = 'chave';
        $this->pubkey = '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAqn6D8l6lHZjfZag6hxgl
FE71jys1R7/iRycWizMuDnDFsDKibMFTOfOqLb7M6BSeR1RD8Osp7xYo1wWC2C9W
93OmFdmX+MAq1qOGLJOK+Hmkn8z14MoYE8er5aoGVDR5jnHzuvs5XZ3BGjlrakhc
ihe1ZLWt3hmi34LS6J/LKHlRVu6s+LP+sPyJVmHrCd2Q8AMQGbs73e79I9PSr8o6
9M4YXLryMuyLWbJEMGsf/9GmHYWdRnPEpNQHu+bWHLfKF+WHITQeTfGQDE0PPnW3
A9I0PbuoDAXinfyluLaG52ZKDUjrfqZmBq3hMkLW9frhYk+DdRR9RiDj9jPBu3gL
OwIDAQAB
-----END PUBLIC KEY-----';
        $this->privkey = '-----BEGIN RSA PRIVATE KEY-----
Proc-Type: 4,ENCRYPTED
DEK-Info: DES-EDE3-CBC,61B8075D061BBB80

MFSqgNsr1mXYK7AB+CJov7YUy1TMs9eAmVt5fK9EFTDTKViJp85PPIJYMwBbM1+q
BIc76RN72udOdGuvrSOc3pszVcNWwJK53T3WsU77+9WfvxuWvdceYoVyDLxFkuOv
ujnUDlu5I7VKzMyn08GCrKDsuMd0A4eoL9H1lvhCh192/outiOuR1YofJ+jAW3UM
I9iF5ERiVj5Q2qiLW8yndS/8eut2c12yQLy17XgFH+d34+4crEuT7kYbrThWxkwN
dTcTbXaTHjsnmn4hciSgp2D2BOiDeDSdT+pu5pZEi7EZPBlmgaZhcqRmBcdbpfKY
gSVbmgiqJniFSbZ2EZoeE8ey7ooRc7NBPMlkOS65KKpFM1YfKEIp8xkilIpkMGYG
AelFhFQRIBzz44RqJVXGMz0IJa5g+Hry1VU3rbUPVQrz/vJo6AxlMBYxhw8TRGvN
ZKoiirw2lQBhgeLccmu/EG7beQdPyOeRIhYbWjXAMJIz15wWxMILNQhLmpV5/qTF
/L1aBTmsFJKEvr32m6JHkWV9uLjKTo+gvNs8bMLB5QF5O+K1NZes3hcsoJzmWVEV
CNPU6F6PmxMMr5I+1lIZMJynkuy8UpKzqob66gL+CMv9lbi2c44k+gN5kvf1wEt3
ofDbvXJbAgaihiZscFujWp4X6h8oTloiIIvS8qSFZdDKBe3SK8gI4H2w5JDsP3sM
KxKwp4ErrHXfuEoh4eMEAp1wXsKDb3VqBop5XhtmnZRJVv0hfWhvf7E750N3kIPk
4yo52C9n6i8PNTtm1qrDR4s3QsMIOeRkaEZuQqy3cmQnFeuDaPgSut6npMwk5pul
siMQ38Urdca4yDnDDGTwiIJNvKJhF92eFWpf6lO2xf+mYsL39epHPrRzODrl/DfM
E6Z6LXYW59HL0kmXCgui/0FXM9G7ZI72iEC1WtV+C5biYitQfOKgl1zy48J3qjn5
KbdY2LFo3i1y1aYVz87aycqbipF/JkSp0Hht+LGDpsi0F0mEeZPSgpGiAIUe5afD
tA/H1H1JKiAaC/BlIu5WYNX8R97shSG+AZM0h3BdwPyL/MBcG4aiZpahv3tRJDca
AhYezBtDgas9AYc9fwBSBaKVQ0XxCdZzVM515WGNiI8pjtp9LLnqC02z09/rBtfo
nJV4idIUPVZlge9eLfp2XP35TTCc9T4ahVzjG517gIY+hs0Hlb1pdG+C1XsbfFCA
cMtpDHtk7GMDYClwSyO3jC1xiaHNMth20qjp/t6m2Ao6T8crD8/dK4lWZFMy64zH
qiUHsUYPyx5LVAnMrIDEO2T02nZfn6p6xF4R7B35uR1TLXq5tdSPWqzj8KcKGRg0
o1t8iCl5y9CdAkU5c9oH63nMYbdb6naD+xgflxrsQc/cXe/w+32nHn2sY2JJrikH
W7TN+p2D3iL6S/7T33kUPeKtM5aXoaFOKu2y/C/aGd8YQ7CS+P8yRdeYfqTJ+rfP
TLbtryKB+NT+agGhmTMDu4bAF2169bm4Z/C8DWwSuf61q3zBJxVasHCUEJQ2gdyE
N0e89GIAZ6PZIjzvAl9lEhXsAT72MiuWYpgsO/nfU8F+NZdxwdtMoA==
-----END RSA PRIVATE KEY-----';
        $this->obterChavePrivadaRsa();
    }
    */

    public static function encrypt($data): string
    {
        if (openssl_public_encrypt($data, $encrypted, self::PUBKEY))
            $data = base64_encode($encrypted);
        else
            throw new Exception('Unable to encrypt data. Perhaps it is bigger than the key size?');

        return $data;
    }

    public static function decrypt($data): string
    {
        //if (openssl_private_decrypt(base64_decode($data), $decrypted, $this->privkey))
        /*$dado = pack('H*', $data);
        if (openssl_private_decrypt($dado, $decrypted, $this->kh))
        */
        $res1 = openssl_get_privatekey(self::$pk, self::FRASE);
        if (openssl_private_decrypt(base64_decode($data), $decrypted, $res1))
            $data = $decrypted;
        else
            $data = '';

        return $data;
    }

    public static function descriptarRsaFront(string $dadoEncriptado): string
    {
        self::obterChavePrivadaRsa();
        $dado = pack('H*', $dadoEncriptado);
        if (openssl_private_decrypt($dado, $r, self::$kh)) {
            $dado = $r;
        }
        return $dado;
    }

    public static function obterChavePrivadaRsa(): bool
    {
        if (empty(self::$pk)) {
            $pk = file_get_contents(realpath(__DIR__ . DIRECTORY_SEPARATOR . 'enc' . DIRECTORY_SEPARATOR . 'private.pem'));
            $kh = openssl_pkey_get_private($pk, self::FRASE);
            //$kh = openssl_get_privatekey($pk, $this->frase);
            $detalhes = openssl_pkey_get_details($kh);
            self::$kh = $kh;
            self::$detalhes = $detalhes;
            self::$pk = $pk;
            return true;
        }
        return false;
    }

    public function toHex($data): string
    {
        return strtoupper(bin2hex($data));
    }
}
