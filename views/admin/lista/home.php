<?php Classes\ClassLayout::setHeadRestrict(['admin','comprador','developer']); ?>
<?php Classes\ClassLayout::setHead("Minha Lista", "Janela de acesso a mudança de key do usuário.", '1958961-5',array('headerAdmin'=>true)); ?>
<?php $objList=new \Classes\ClassLists(); ?>
    <div class="dash-content">
        <?php echo \Classes\ClassLayout::setTitle('MINHA LISTA'); ?>
        <div class="dash-includes">
            <!-- Form da busca por matrícula -->
            <div class="cadastroRet cadastroRetMatricula">
                <div class="cadastroRetNovo">Listar Item</div>
                <div class="cadastroListConf">Configurações</div>

                <table class="tableret">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>QUANTIDADE</th>
                        <th>PRODUTO</th>
                        <th>PREFERÊNCIA</th>
                        <th>MEDIDA UNITÁRIA</th>
                        <th>PREÇO</th>
                        <th>REGISTRADO EM</th>
                        <th>ATUALIZADO EM</th>
                        <th>CATEGORIA</th>
                        <th>STATUS</th>
                        <th>AÇÃO</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    if(isset($_COOKIE['startDate']) && isset($_COOKIE['endDate'])){
                        $data=$objList->getListByDate($_COOKIE['startDate'],$_COOKIE['endDate'],$_COOKIE['listStatus'],$_COOKIE['listCategoria']);
                        }elseif (isset($_COOKIE['listCategoria'])){
                            $data=$objList->getListCategoria($_COOKIE['listStatus'],$_COOKIE['listCategoria']);
                        }else{
                            $data=$objList->getListToday();
                        }
                    $quant = count($data);
                    $totalValor = 0;
                    $totalItens = 0;
                    $listaValor = 0;
                    foreach($data as $List){
                        $totalValor += $List['sis_listaValor'];
                        $totalItens += $List['sis_listaQuant'];
                        ?>
                        <tr>
                            <td><?php echo $List['idsis_list'] ?></td>
                            <td><?php echo $List['sis_listaQuant'] ?></td>
                            <td><?php echo $List['sis_listaProduto'] ?></td>
                            <td><?php echo $List['sis_listaMarca'] ?></td>
                            <td><?php echo $List['sis_listaVolume']." ".$List['sis_listaMedida'] ?></td>
                            <td><?php echo "R$ ".number_format($List['sis_listaValor'],2,",","."); ?></td>
                            <td><?php echo date('d-m-Y H:i:s',strtotime($List['startPruchaseProductDate'])); ?></td>
                            <td><?php echo date('d-m-Y H:i:s',strtotime($List['updatePurchaseProductDate'])); ?></td>
                            <td><?php echo $List['sis_categoriaProduto'] ?></td>
                            <td><?php echo $List['sis_listaStatus'] ?></td>
                            <td class="cadastroListEdit" data-id="<?php echo $List['idsis_list'] ?>"><img src="<?php echo DIRIMG.'edite.png' ?>" data-id="<?php echo $List['idsis_list'] ?>" alt="Editar dados"></td>
                        </tr>
                    <?php }
                    echo $quant." linha(s), contendo ".$totalItens." iten(s) no valor de R$ ".number_format($totalValor,2,",",".");
                    ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>

<?php include(DIRREQ.'views/admin/lista/inc/popupconf.php'); ?>
<?php include(DIRREQ.'views/admin/lista/inc/popup.php'); ?>
<?php include(DIRREQ.'views/admin/lista/inc/popupedit.php'); ?>

<?php \Classes\ClassLayout::setFooter(array('footer'=>false)); ?>
