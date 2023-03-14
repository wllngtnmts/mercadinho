<?php
//Recebe os dados do Js
$json = json_decode(file_get_contents('php://input'));
//Instancia a função
$objCadList = new Classes\ClassLists();
//Envia os dados para consulta no banco
echo json_encode($objCadList->getListItem($json->id));