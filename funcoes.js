function Asc(String) {
	return String.charCodeAt(0);
}

function Chr(AsciiNum) {
	return String.fromCharCode(AsciiNum)
}
// encriptar desencriptar js
function encriptar(texto) {
	let mensx = '';
	let l;
	let i;
	let j = 0;
	let vetorAscii = [];
	//ch = "assbdFbdpdPdpfPdAAdpeoseslsQQEcDDldiVVkadiedkdkLLnm";
	//let ch = chavePhp;
	let ch = sessionStorage.getItem('chavePhpsession');
	const lchavePhp = chavePhp.length;
	const ldado = texto.length;
	for (i = 0; i < ldado; i++) {
		j++;
		l = (Asc(texto.substr(i, 1)) + (Asc(ch.substr(j, 1))));
		if (j == lchavePhp) {
			j = 1;
		}
		if (l > 255) {
			l -= 256;
		}
		mensx += (Chr(l));
		vetorAscii.push(l);
		//console.log("i: " + i + " | " + "l: " + l + " carater: " + l);
	}
	mensx = vetorAscii.join(',');
	return mensx;
}

function descriptar(texto) {
	let mensx = '';
	let l;
	let i;
	let j = 0;
	//let ch = chavePhp;
	const listAscci = texto.split(",");
	let ch = sessionStorage.getItem('chavePhpsession');
	//ch = "assbdFbdpdPdpfPdAAdpeoseslsQQEcDDldiVVkadiedkdkLLnm";
	const lchavePhp = chavePhp.length;
	const ldado = listAscci.length;
	for (i = 0; i < ldado; i++) {
		j++;
		l = (parseInt(listAscci[i]) - (Asc(ch.substr(j, 1))));
		if (j == lchavePhp) {
			j = 1;
		}
		if (l < 0) {
			l += 256;
		}
		mensx += (Chr(l));
	}
	return mensx;
}

function descriptar1(texto) {
	let mensx = '';
	let l;
	let i;
	let j = 0;
	//let ch = chavePhp;
	let ch = sessionStorage.getItem('chavePhpsession');
	//ch = "assbdFbdpdPdpfPdAAdpeoseslsQQEcDDldiVVkadiedkdkLLnm";
	const lchavePhp = chavePhp.length;
	const ldado = texto.length;
	for (i = 0; i < ldado; i++) {
		j++;
		l = (Asc(texto.substr(i, 1)) - (Asc(ch.substr(j, 1))));
		if (j == lchavePhp) {
			j = 1;
		}
		if (l < 0) {
			l += 256;
		}
		mensx += (Chr(l));
	}
	return mensx;
}

//encriptar JS para descriptar php
function encriptar1(texto) {
	let mensx = '';
	let l;
	let i;
	let j = 0;
	let listAscci
	//ch = "assbdFbdpdPdpfPdAAdpeoseslsQQEcDDldiVVkadiedkdkLLnm";
	//let ch = chavePhp;
	let ch = sessionStorage.getItem('chavePhpsession');
	const lchavePhp = chavePhp.length;
	const ldado = texto.length;
	for (i = 0; i < ldado; i++) {
		j++;
		l = (Asc(texto.substr(i, 1)) + (Asc(ch.substr(j, 1))));
		if (j == lchavePhp) {
			j = 1;
		}
		if (l > 255) {
			l -= 256;
		}
		mensx += (Chr(l));

		//console.log("i: " + i + " | " + "l: " + l + " carater: " + Chr(l));
	}
	return mensx;
}


function mostrarDadoNormal(dado) {
	console.log("Dado normal: " + dado);
	return dado;
}

function mostrarDadoEncriptado(dado) {
	const dadoEncriptado = encriptar(dado);
	console.log("Dado original encriptado: " + dadoEncriptado);
	return dadoEncriptado;
}

function mostrarDadoDescriptado(dado) {
	const dadoOriginal = descriptar(dado);
	console.log("Dado original desencriptado: " + dadoOriginal);
	return dadoOriginal;
}
