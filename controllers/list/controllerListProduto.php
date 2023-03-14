<?php
$json =  json_decode(file_get_contents('php://input'));
$objCadList=new \Classes\ClassLists();
echo json_encode($objCadList->getListProduto($json->select));
