<?php \Classes\ClassLayout::setHead('Cadastro', 'sistema de suporte optalert!', 'WMatos'); ?>



    <form name="formRevisarPalavraPasse" id="formRevisarPalavraPasse" action="<?php echo DIRPAGE.'controllers/controllerRevisarMeuPasse'; ?>" method="post">
        <div class="tituloCadastro w100 center font">
            <h1>ATUALIZAR MINHA PALAVRA PASSE</h1>
        </div>

        <div class="cadastro">
            <div class="retornoRevisarPalavraPasse"></div>
            <div class="revisarPalavraPasseForm">
                <input class="float w100 h40" type="hidden" id="email" name="email" value="<?php echo \Traits\TraitParseUrl::parseUrl(1); ?>" required>
                <input class="float w100 h40" type="hidden" id="token" name="token" value="<?php echo \Traits\TraitParseUrl::parseUrl(2); ?>" required>
                <input class="float w100 h40" type="password" id="senha" name="senha" placeholder="Senha:" required autocomplete="false">
                <input class="float w100 h40" type="password" id="senhaConf" name="senhaConf" placeholder="Confirme sua senha!" required autocomplete="false">
                <input class="float w100 h40" type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" required>
                <input id="btnRevisarMeuAcesso" class="float w100 h40" type="submit" value="Atualizar">
            </div>
        </div>
    </form>

<?php \Classes\ClassLayout::setFooter(); ?>
