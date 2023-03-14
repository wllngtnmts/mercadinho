<div class="popupPerm">
    <div class="cadastroRetPopup__Title">Editar Permissão</div>

    <form name="formCadastroRet" id="formCadastroRet" action="<?php echo DIRPAGE.'controllers/controllerPerm'; ?>" method="post">
        <div class="cadastroRetPopup popupPermition">
            <input type="text" name="id2" id="id2">
            <select name="newPermition" id="newPermition">
                <option value="">Selecione</option>
                <option value="admin">ADMIN</option>
                <option value="conprador">COMPRADOR</option>
            </select>
            <input type="submit" id="btnPopupPermSenSubmit" value="Alterar" style="margin:0;">
        </div>
    </form>
</div>
<div class="fundo"></div>