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

                <div>
                    <select name="listCadQuantidade" id="listCadQuantidade" required>
                        <option value="">QUANTIDADE</option>
                        <?php for($i=1; $i <= 10; $i++){ ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div>
                    <input type="text" name="listCadPrice" id="listCadPrice" PLACEHOLDER="8.99">
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
