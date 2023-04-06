<?php $objCadList=new \Classes\ClassLists(); ?>
<div class="popupRetEdit">
    <div class="cadastroRetPopup__Title">EDITAR ITEM DA LISTA</div>
    <!-- Form do cadastro -->
    <form name="formCadastroRet" id="formCadastroRet" action="<?php echo DIRPAGE.'controllers/list/controllerListCadEdit'; ?>" method="post">
        <div class="cadastroRetPopup">

            <!-- Resposta da busca por matrícula -->
            <div class="cadastroRetForm" style="display:grid;">
                <input type="hidden" name="idEdit" id="idEdit">

                <div>
                    <select name="listCadCategoria" id="listCadCategoriaEdit">
                        <option value="">CATEGORIA</option>
                    <?php
                    foreach ($objCadList->getListStatus() as $CadCategoria){ ?>
                        <option value="<?php echo $CadCategoria['idsis_categoriaProduto']?>"><?php echo $CadCategoria['sis_categoriaProduto']; ?></option>
                    <?php } ?>
                    </select>
                </div>

                <div>
                    <select name="lisCadProduto" id="lisCadProdutoEdit">
                        <option value="">PRODUTO</option>
                    </select>
                </div>

                <select name="listCadPesoPeca" id="listCadPesoPecaEdit">
                    <option value="UNIDADE">UNIDADE</option>
                    <option value="PESO">PESO</option>
                </select>

                <div>
                    <input type="text" name="listCadQuantidade" id="listCadQuantidadeEdit" placeholder="Quantidade">
                </div>

                <div>
                    <input type="text" name="listCadPriceUnit" id="listCadPriceUnitEdit" placeholder="Valor unitário">
                </div>

                <div>
                    <input type="text" name="listCadPrice" id="listCadPriceEdit" PLACEHOLDER="Valor total">
                </div>

                <select name="listCadStatus" id="listCadStatusEdit">
                    <option value="PENDENTE">PENDENTE</option>
                    <option value="CANCELADO">CANCELADO</option>
                    <option value="REALIZADO">REALIZADO</option>
                    <option value="NAO ENCONTRADO">NÃO ENCONTRADO</option>
                </select>

                <div class="form__obs">
                    <textarea name="observacoes" id="observacoesEdit" placeholder="Observações" value="testestestes" minlength="5" required></textarea>
                </div>

                <div class="cadastroRetSubmit">
                    <input  type="submit" value="Salvar">
                </div>
            </div>
        </div>
    </form>
</div>
<div class="fundo"></div>
