<?php Classes\ClassLayout::setHeadRestrict(['admin','developer']); ?>
<?php Classes\ClassLayout::setHead("Permissões de Usuários", "Permissões de Usuários", 'sistemasesoftware.com.br',array('headerAdmin'=>true)); ?>
<?php $objUsers=new \Classes\ClassPermition(); ?>

    <div class="dash-content">
        <?php echo \Classes\ClassLayout::setTitle('Permissões do Usuário','background:#307596;'); ?>

        <div class="dash-includes">
            <!-- Busca por matrícula ou nome-->
            <form name="searchUser" id="searchUser" method="post" action="<?php echo DIRPAGE.'controllers/controllerSearchUser'; ?>">
                <div class="box__search--gray">
                    <div><input type="text" id="searchMatricula" name="searchMatricula" placeholder="FILTRO POR MATRICULA:"></div>
                    <div><input type="text" id="searchName" name="searchName" placeholder="FILTRO POR NOME:"></div>
                    <div><input type="submit" id="filterUser" value="Filtrar"></div>
                </div>
            </form>



            <div class="cadastroRet cadastroRetMatricula">

                <?php if(\Traits\TraitParseUrl::parseUrl(2) != null){ ?>
                    <div class="msgPerm success">Dados atualizados com sucesso!</div>
                <?php } ?>

                <table class="tablePerm">
                    <thead>
                        <tr>
                            <th>Matrícula</th>
                            <th>Nome</th>
                            <th>Perfil</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>CPF</th>
                            <th>DATA NASCIMENTO</th>
                            <th>CRIAÇÃO EM</th>
                            <th>ATUALIZADO EM</th>
                            <th>Ações</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $data=$objUsers->getAllUsers();
                        foreach($data as $users)
                        { ?>
                            <tr>
                                <td><?php echo $users['matricula'] ?></td>
                                <td><?php echo $users['nome'] ?></td>
                                <td><?php echo $users['permissoes'] ?></td>
                                <td><?php echo $users['email'] ?></td>
                                <td><?php echo $users['status'] ?></td>
                                <td><?php echo substr($users['cpf'],-4) ?></td>
                                <td><?php echo $users['dataNascimento'] ?></td>
                                <td><?php echo $users['createdAt'] ?></td>
                                <td><?php echo $users['updatedAt'] ?></td>
                                <td class="cadastroRetPerm" data-matricula="<?php echo $users['matricula'] ?>" data-id="<?php echo $users['id'] ?>">
                                    <?php if($users['status'] != 'active'){ ?><a href="<?php echo DIRPAGE.'controllers/controllerAtivaUser/'.$users['id']; ?>"><img src="<?php echo DIRIMG.'ativar.png' ?>" alt="Ativar Usuário" class="btnPermAtivUser" data-matricula="<?php echo $users['matricula'] ?>" data-id="<?php echo $users['id'] ?>"></a><?php } ?>
                                    <img src="<?php echo DIRIMG.'change-pass.png' ?>" alt="Trocar Senha" class="btnPermSen" data-matricula="<?php echo $users['matricula'] ?>" data-id="<?php echo $users['id'] ?>" style="margin-left: 5px;">
                                    <img src="<?php echo DIRIMG.'edite.png' ?>" alt="Trocar Permissão"  class="btnPerm" data-matricula="<?php echo $users['matricula'] ?>" data-id="<?php echo $users['id'] ?>" style="width: 25px; margin-left: 5px;">
                                    <img src="<?php echo DIRIMG.'button-trash.png' ?>" alt="Deletar"  class="btnPermDel" data-matricula="<?php echo $users['matricula'] ?>" data-id="<?php echo $users['id'] ?>" style="width: 25px; margin-left: 5px;">
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php include(DIRREQ.'views/admin/permissoes/inc/popupSen.php'); ?>
<?php include(DIRREQ.'views/admin/permissoes/inc/popupPerm.php'); ?>


<?php \Classes\ClassLayout::setFooter(array('footer'=>false)); ?>
