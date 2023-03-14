<div class="popupPermSen">
    <div class="cadastroRetPopup__Title">Editar Senha</div>

    <form name="formCadastroRet" id="formCadastroRet" action="<?php echo DIRPAGE.'controllers/controllerPermSenha'; ?>" method="post">
        <div class="cadastroRetPopup popupPermition">
            <input type="hidden" name="id" id="id">
            <input type="text" name="newSen" id="newSen">
            <input type="submit" id="btnPopupPermSenSubmit" value="Alterar" style="margin:0;">
        </div>
    </form>
</div>
<div class="fundo"></div>