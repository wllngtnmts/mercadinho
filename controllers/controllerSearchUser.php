<?php
//Recebe os dados da função javascript sendFormSite
$json = json_decode(file_get_contents('php://input'));

//Instancia a classe Rets pra usar o método setMatriz
$objSite = new \Classes\ClassLists();
//Devolvendo para o Javascript
echo json_encode($objSite->searchUsers($json->matricula, $json->name));