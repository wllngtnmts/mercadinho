<?php
$id=filter_input(INPUT_POST,'id',FILTER_DEFAULT);
$newPass=filter_input(INPUT_POST,'newSen',FILTER_DEFAULT);
$objPerm=new \Classes\ClassPermition();
$objPerm->updatePassword($id,$newPass);
header("location:".DIRPAGE.'admin/permissoes/success');

