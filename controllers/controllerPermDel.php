<?php
$id=\Traits\TraitParseUrl::parseUrl(2);
$objPerm=new \Classes\ClassPermition();
$objPerm->deleteUserM($id);
header("location:".DIRPAGE.'admin/permissoes/success');