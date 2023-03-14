<?php Classes\ClassLayout::setHeadRestrict(['admin','comprador','developer']); ?>
<?php Classes\ClassLayout::setHead("Alterar Senha", "Janela de acesso a mudança de key do usuário.", 'sistemasesoftware.com.br',array('headerAdmin'=>true)); ?>

    <div class="dash-content">
        <?php echo \Classes\ClassLayout::setTitle('Alterar Senha'); ?>

        <form name="formAtualizarSenha" id="formAtualizarSenha" action="<?php echo DIRPAGE.'controllers/controllerAtualizarSenha'; ?>" method="post">

            <div class="alterSenha dash-includes dash-includesMT">
                <div class="retornoCad"></div>
                <input class="float w100 h40" type="password" id="senhaAtual" name="senhaAtual" placeholder="Senha atual:" required>
                <input class="float w100 h40" type="password" id="senha" name="senha" placeholder="Nova senha:" required>
                <input class="float w100 h40" type="password" id="senhaConf" name="senhaConf" placeholder="Confirme nova senha senha!" required>
                <input class="float w100 h40" type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" required>
                <input class="float w100 h40" type="submit" value="Atualizar">
            </div>
        </form>
    </div>

</div>

<?php \Classes\ClassLayout::setFooter(array('footer'=>false)); ?>
