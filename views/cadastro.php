<?php \Classes\ClassLayout::setHead('Cadastro', 'sistema de suporte optalert!', 'WMatos'); ?>

    <form name="formCadastro" id="formCadastro" action="<?php echo DIRPAGE.'controllers/controllerCadastro'; ?>" method="post">
        <div class="tituloCadastro w100 center font">
            <h1>Faça seu cadastro!</h1>
        </div>

        <div class="cadastro">
            <div class="retornoCad"></div>
            <div class="cadastroForms">
                <input class="float w100 h40" type="text" id="nome" name="nome" placeholder="Nome:" required>
                <input class="float w100 h40" type="email" id="email" name="email" placeholder="Email:" required>
                <input class="float w100 h40" type="text" id="cpf" name="cpf" placeholder="CPF:" required>
                <input class="float w100 h40" type="text" id="matricula" name="matricula" maxlength="8" placeholder="Matrícula:" required>
                <input class="float w100 h40" type="text" id="dataNascimento" name="dataNascimento" placeholder="Data de Nascimento:" required>
                <input class="float w100 h40" type="password" id="senha" name="senha" placeholder="Senha:" required>
                <input class="float w100 h40" type="password" id="senhaConf" name="senhaConf" placeholder="Confirme sua senha!" required>
                <input class="float w100 h40" type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" required>
                <input class="float w100 h40" type="submit" value="Cadastrar">
            </div>
        </div>
    </form>

<?php \Classes\ClassLayout::setFooter(); ?>
