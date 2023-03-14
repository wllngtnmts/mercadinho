<?php Classes\ClassLayout::setHeadRestrict(['admin','comprador','developer']); ?>
<?php Classes\ClassLayout::setHead("Mercadinho", "Área de registro", 'sistemasesoftware.com.br',array('headerAdmin'=>true)); ?>

    <div class="dash-content">
        <?php echo \Classes\ClassLayout::setTitle('Menu principal'); ?>

        <div class="dash-content-text center">
            Evolução do consumo<br>

        </div>
    </div>

</div>
<?php \Classes\ClassLayout::setFooter(array('footer'=>false)); ?>
