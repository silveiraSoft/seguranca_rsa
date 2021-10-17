<script>
    const rsa = new RSAKey();
    rsa.setPublic('<?php echo to_hex(Seguranca::$detalhes["rsa"]["n"]) ?>', '<?php echo to_hex(Seguranca::$detalhes["rsa"]["e"]) ?>');
</script>
<div>
    <label for="login">senha</label> <input type="text" name="senha" id="senha">
    <input name="acessar" id="acessar" class="btn btn-primary" type="button" value="Acessar">
</div>
