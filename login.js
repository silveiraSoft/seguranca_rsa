const btnAcessar = document.querySelector('#acessar');
const loginAjaxJs = async (senhaEncriptada) => {
    try {
        let formData = new FormData();
        formData.append('dadoEncriptado', senhaEncriptada);
        const myInit = {
            method: 'post',
            body: formData
            //body: new URLSearchParams(formData)
        };
        const resPost = await fetch('login.php', myInit);
        const post = await resPost.json();
        console.log("Resultado Ajax, dado encriptado: " + senhaEncriptada);
        console.log("Resultado Ajax, dado descriptado: " + post);
    } catch (erro) {
        console.log('Erro.');
    }
}

const loginAjaxJquery = async (senhaEncriptada) => {
    $.ajax({
        url: 'login.php',
        type: 'POST',
        data: { dadoEncriptado: senhaEncriptada },
        dataType: "json",
        success: function (post) {
            // Retorno se tudo ocorreu normalmente
            console.log("Resultado Ajax, dado encriptado: " + senhaEncriptada);
            console.log("Resultado Ajax, dado descriptado: " + post);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('Erro.');
        }
    });
}

/*
const loginAjaxJsV2_ok = async (senhaEncriptada) => {
    try {
        let formData = new FormData();
        formData.append('dadoEncriptado', senhaEncriptada);
        var myHeaders = new Headers();
        var myInit = {
            method: 'post',
            headers: myHeaders,
            body: formData,
            //body: new URLSearchParams(formData)
            mode: 'cors',
            cache: 'default'
        };
        var myRequest = new Request('login.php', myInit);
        const resPost = await fetch(myRequest, myInit);
        const post = await resPost.json();
        console.log(post);
    } catch (erro) {
        console.log('Erro.');
    }
}
*/

btnAcessar.addEventListener('click', () => {
    const senha = document.getElementById('senha').value;
    const dado = mostrarDadoNormal(senha);
    const dadoEncriptado = mostrarDadoEncriptado(dado);
    const dadoDescriptado = mostrarDadoDescriptado(dadoEncriptado);
    loginAjaxJs(dadoEncriptado);
    //loginAjaxJquery(dadoEncriptado);
})
