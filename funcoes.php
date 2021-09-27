<?php

function obterChavePHP(): string
{
	if (!isset($_COOKIE["PHPSESSID"]) || !isset($_SESSION['teste'])) {
		session_start();
	}
	if (!isset($_SESSION['teste'])) {
		$_SESSION['teste'] = sha1(time()) . sha1(microtime());
	}
	//return $_SESSION['teste'];
	$chavePhp = $_SESSION['teste'] ?? null;
	return $chavePhp;
}

function criarChaveJSPHP()
{
	echo "<br>Criando chave JS e PHP<br>";
	$chavePhp = obterChavePHP();
	echo "chavePhp:" . $chavePhp . "<br>";

	if (isset($chavePhp)) {
?>
		<script>
			var chavePhp = '<?php echo $chavePhp ?? 'Erro na chave php'; ?>';
			sessionStorage.setItem('chavePhpsession', chavePhp);
			console.log("Chave js com o valor vindo da sessão do php com nome valor: chavePhp = " + chavePhp);
		</script>
<?php
	}
}

function Asc(string $dado): int
{
	return ord($dado);
}

/*
function utf8CharCodeAt($str, $index)
{
	$char = mb_substr($str, $index, 1, 'UTF-8');

	if (mb_check_encoding($char, 'UTF-8')) {
		$ret = mb_convert_encoding($char, 'UTF-32BE', 'UTF-8');
		return hexdec(bin2hex($ret));
	} else {
		return null;
	}
}
*/

function unichr($u)
{
	return mb_convert_encoding('&#' . intval($u) . ';', 'UTF-8', 'HTML-ENTITIES');
}

function encriptar(string $texto): string
{
	if (!is_string($texto) || empty($texto)) {
		return '';
	}
	$chavePhp = obterChavePHP();
	$mensx = '';
	$j = 0;
	$vetorAscii = [];
	//ch = "assbdFbdpdPdpfPdAAdpeoseslsQQEcDDldiVVkadiedkdkLLnm";
	$ch = $chavePhp;
	$lchavePhp = strlen($chavePhp);
	$ldado = strlen($texto);
	for ($i = 0; $i < $ldado; $i++) {
		$j++;
		$l = (Asc(substr($texto, $i, 1)) + (Asc(substr($ch, $j, 1))));
		if ($j == $lchavePhp) {
			$j = 1;
		}
		if ($l > 255) {
			$l -= 256;
		}
		//var_dump($l);
		//echo "i: " . $i . " | " . "l: " . $l . " carater: " . $l . "<br>";
		$mensx .= (chr($l));
		//echo $mensx . "<br>";
		$asciisEncriptados[] = $l;
		//$mensx += unichr((int)$l);
	}
	$mensx = implode(',', $asciisEncriptados);
	return $mensx;
}

/**
 * @param texto -> string com a lista dos código Ascci de cada caracter do texto já criptografado e separado por virgula.
 */

function descriptar(string $texto): string
{
	//return $texto;
	if (!is_string($texto) || empty($texto)) {
		return '';
	}
	$chavePhp = obterChavePHP();
	$listAscci = explode(',', $texto);
	if (!is_array($listAscci)) {
		return '';
	}
	$j = 0;
	$ch = $chavePhp;
	$mensx = '';
	//ch = "assbdFbdpdPdpfPdAAdpeoseslsQQEcDDldiVVkadiedkdkLLnm";
	$lchavePhp = strlen($chavePhp);
	$ldado = count($listAscci);
	for ($i = 0; $i < $ldado; $i++) {
		$j++;
		$l = ((int)$listAscci[$i] - (Asc(substr($ch, $j, 1))));

		if ($j == $lchavePhp) {
			$j = 1;
		}

		if ($l < 0) {
			$l += 256;
		}

		//return $l;
		//echo "i: " . $i . " | " . "l: " . $l . " carater: " . chr($l) . "<br>";
		$mensx .= (chr($l));
	}
	return $mensx;
}

function encriptar1(string $texto): string
{
	$chavePhp = obterChavePHP();
	$mensx = '';
	$l;
	$i;
	$j = 0;
	//ch = "assbdFbdpdPdpfPdAAdpeoseslsQQEcDDldiVVkadiedkdkLLnm";
	$ch = $chavePhp;
	$lchavePhp = strlen($chavePhp);
	$ldado = strlen($texto);
	for ($i = 0; $i < $ldado; $i++) {
		$j++;
		$l = (Asc(substr($texto, $i, 1)) + (Asc(substr($ch, $j, 1))));
		if ($j == $lchavePhp) {
			$j = 1;
		}
		if ($l > 255) {
			$l -= 256;
		}
		var_dump($l);
		echo "i: " . $i . " | " . "l: " . $l . " carater: " . chr($l) . "<br>";
		$mensx .= (chr($l));
		echo $mensx . "<br>";
		//$mensx += unichr((int)$l);
	}
	return $mensx;
}

function descriptar1(string $texto): string
{
	$chavePhp = obterChavePHP();
	$mensx = '';
	$l;
	$i;
	$j = 0;
	$ch = $chavePhp;
	//return $texto;
	//ch = "assbdFbdpdPdpfPdAAdpeoseslsQQEcDDldiVVkadiedkdkLLnm";
	$lchavePhp = strlen($chavePhp);
	$ldado = strlen($texto);
	for ($i = 0; $i < $ldado; $i++) {
		$j++;
		$l = (Asc(substr($texto, $i, 1)) - (Asc(substr($ch, $j, 1))));
		if ($j == $lchavePhp) {
			$j = 1;
		}
		if ($l < 0) {
			$l += 256;
		}
		//echo "i: " . $i . " | " . "l: " . $l . " carater: " . chr($l) . "<br>";
		$mensx .= (chr($l));
	}
	return $mensx;
}

function charCodeAt($string, $offset)
{
	$string = mb_substr($string, $offset, 1);
	list(, $ret) = unpack('S', mb_convert_encoding($string, 'UTF-16LE'));
	return $ret;
}
