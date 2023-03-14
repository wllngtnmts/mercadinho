<?php
$id=filter_input(INPUT_POST,'id2',FILTER_DEFAULT);
$newPermition=filter_input(INPUT_POST,'newPermition',FILTER_DEFAULT);
$objPerm=new \Classes\ClassPermition();
$objPerm->updatePermission($id,$newPermition);
header("location:".DIRPAGE.'admin/permissoes/success');