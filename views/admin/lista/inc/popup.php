<?php $objCadList=new \Classes\ClassLists(); ?>
<div class="popupRet">
    <div class="cadastroRetPopup__Title">ADICIONAR ITEM A LISTA</div>
    <!-- Form do cadastro -->
    <form name="formCadastroRet" id="formCadastroRet" action="<?php echo DIRPAGE.'controllers/list/controllerListCad'; ?>" method="post">
        <div class="cadastroRetPopup">

            <!-- Resposta da busca por matrícula -->
            <div class="cadastroRetForm" style="display:grid;">

                <div>
                    <select name="listCadCategoria" id="listCadCategoria">
                        <option value="">CATEGORIA</option>
                    <?php
                    foreach ($objCadList->getListStatus() as $CadCategoria){ ?>
                        <option value="<?php echo $CadCategoria['idsis_categoriaProduto']?>"><?php echo $CadCategoria['sis_categoriaProduto']; ?></option>
                    <?php } ?>
                    </select>
                </div>

                <div>
                    <select name="lisCadProduto" id="lisCadProduto">
                        <option value="">PRODUTO</option>
                    </select>
                </div>

                <select name="listCadPesoPeca" id="listCadPesoPeca">
                    <option value="UNIDADE">UNIDADE</option>
                    <option value="PESO">PESO</option>
                </select>

                <div>
                    <input type="text" name="listCadQuantidade" id="listCadQuantidade" placeholder="Quantidade">
                </div>

                <div>
                    <input type="text" id="listCadPriceUnit" name="listCadPriceUnit" placeholder="Valor unitário">
                </div>

                <div>
                    <input type="text" name="listCadPrice" id="listCadPrice" PLACEHOLDER="Valor total">
                </div>

                <select name="listCadStatus" id="listCadStatus">
                    <option value="PENDENTE">PENDENTE</option>
                    <option value="CANCELADO">CANCELADO</option>
                    <option value="REALIZADO">REALIZADO</option>
                    <option value="NAO ENCONTRADO">NÃO ENCONTRADO</option>
                </select>

                <div class="form__obs">
                    <textarea name="observacoes" id="observacoes" placeholder="Observações" minlength="5" required></textarea>
                </div>

                <div class="cadastroRetSubmit">
                    <input  type="submit" value="Salvar">
                </div>
            </div>
        </div>
    </form>
</div>
<div class="fundo"></div>
