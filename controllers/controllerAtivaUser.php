<?php
$objRet=new \Classes\ClassLists();
$id=\Traits\TraitParseUrl::parseUrl(2);
$objRet->ativaUser($id);
header("location: ".DIRPAGE."admin/permissoes");
