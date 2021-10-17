const btnAcessar = document.querySelector('#acessar');
const loginAjaxJs = async (senhaEncriptada) => {
    try {
        let formData = new FormData();
        formData.append('dadoEncriptado', senhaEncriptada);
        const myInit = {
            headers: {
                'Accept': 'application/json'
            },
            method: 'post',
            body: formData
            //body: new URLSearchParams(formData)
            //body: JSON.stringify(objectJson)
        };
        console.log("Senha encriptada enviada ao php nos dados da requisição AJAX: " + senhaEncriptada);
        const resPost = await fetch('loginAjax.php', myInit);
        const post = await resPost.json();
        console.log("Resposta Ajax-> " + post);
    } catch (erro) {
        console.log('Erro na requisição ajax!');
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

btnAcessar.addEventListener('click', () => {
    const senha = document.getElementById('senha').value;
    const dado = rsa.encrypt(senha);
    loginAjaxJs(dado);
})
