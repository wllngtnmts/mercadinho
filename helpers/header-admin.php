<div class="dash">
    <div class='dash-nav'>
        <div class="dash-nav-profile">

            <?php echo "<strong>".strtoupper($_SESSION['name'])."</strong>"; ?> <br>
            <a href="#" title="Menu" class="dash-nav-profile-btn-mob"><img id="button-mob-admin" src="<?php echo DIRPAGE.'img/button-mobile-2.png'; ?>" alt="Menu"></a>
            <a href="<?php echo DIRPAGE.'admin/home'; ?>" title="Home"><img src="<?php echo DIRPAGE.'img/home.png'; ?>" alt="Home"></a>
            <a href="<?php echo DIRPAGE.'admin/change-pass'; ?>" title="Trocar Senha"><img src="<?php echo DIRPAGE.'img/change-pass.png'; ?>" alt="Trocar Senha"></a>
            <a href="<?php echo DIRPAGE.'controllers/controllerLogout'; ?>" title="Sair"><img src="<?php echo DIRPAGE.'img/logout.png'; ?>" alt="Sair do sistema"></a>
        </div>

        <div class='dash-nav-links'>
            <ul><?php
                if($_SESSION['permition'] == 'developer' || $_SESSION['permition'] == 'comprador') {
                    echo \Classes\ClassLinks::getLink('LISTA','admin/lista','lista.png');
                }
                ?>
                <?php
                if($_SESSION['permition'] == 'admin' || $_SESSION['permition'] == 'developer') {
                    echo \Classes\ClassLinks::getLink('USUÁRIOS COM','admin/permissoes','Permissoes.png');
                }
                ?>
            </ul>
        </div>
    </div>
