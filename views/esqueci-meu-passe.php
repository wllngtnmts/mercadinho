<?php \Classes\ClassLayout::setHead('Cadastro', 'sistema de suporte optalert!', 'WMatos'); ?>

    <form name="formCadastro" id="formCadastro" action="<?php echo DIRPAGE.'controllers/controllerEsqueciMeuPasse'; ?>" method="post">
        <div class="tituloCadastro w100 center font">
            <h1>Esqueci minha senha</h1>
        </div>

        <div class="cadastro">
            <div class="retornoCad"></div>
            <div class="esqueciPasseForm">
                <input class="float w100 h40" type="text" id="cpf" name="cpf" placeholder="CPF:" required>
                <input class="float w100 h40" type="email" id="email" name="email" placeholder="Email:" required>
                <input class="float w100 h40" type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" required>
                <input id="btnEsqueciMinhaSenha" class="float w100 h40" type="submit" value="Solicitar">
            </div>
        </div>
    </form>

<?php \Classes\ClassLayout::setFooter(); ?>
