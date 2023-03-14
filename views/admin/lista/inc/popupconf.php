<div class="popupListConf">
    <div class="cadastroRetPopup__Title">Configurações</div>
    <!-- Form do cadastro -->
    <form name="formCadastroRet" id="formCadastroRet" action="<?php echo DIRPAGE.'controllers/list/controllerListConf'; ?>" method="post">
        <div class="cadastroRetConfPopup">
            <div>
                CATEGORIA <br>
            <select name="listCategoria" id="listCategoria">

                <option value="%">TODAS</option>
                <?php
                foreach($objList->getListStatus() as $Categoria){
                    $selectedList=(isset($_COOKIE['listCategoria']) && $_COOKIE['listCategoria']==$Categoria['idsis_categoriaProduto'])?"selected='selected'":"";
                    ?>
                    <option <?php echo $selectedList; ?> value="<?php echo $Categoria['idsis_categoriaProduto']; ?>"><?php echo $Categoria['sis_categoriaProduto']; ?></option>
                <?php } ?>

            </select>
                STATUS <br>
                <?php
                $selectedListStatus=(isset($_COOKIE['listStatus']) && $_COOKIE['listStatus']==$_COOKIE['listStatus'])?"selected='selected'":"";
                ?>
                <select name="listStatus" id="listStatus">
                    <option value="TODOS">TODOS</option>
                    <option value="PENDENTE">PENDENTE</option>
                    <option value="CANCELADO">CANCELADO</option>
                    <option value="REALIZADO">REALIZADO</option>
                    <option value="NAO ENCONTRADO">NÃO ENCONTRADO</option>
                    <option <?php echo $selectedListStatus; ?> value="<?php echo $_COOKIE['listStatus']; ?>"><?php echo $_COOKIE['listStatus']; ?></option>
                </select>

            </div>
            <div>
                Data inicial: <br>
                <input type="date" name="startDate" id="startDate" value="<?php if(isset($_COOKIE['startDate'])){echo explode(' ',$_COOKIE['startDate'])[0];} ?>">
            </div>

            <div>
                Data final: <br>
                <input type="date" name="endDate" id="endDate" value="<?php if(isset($_COOKIE['endDate'])){echo explode(' ',$_COOKIE['endDate'])[0];} ?>">
            </div>

            <div class="cadastroRetConfSubmit">
                <input  type="submit" value="Salvar" id="btnSubmitRetConf">
            </div>
        </div>
    </form>
</div>
<div class="fundo"></div>