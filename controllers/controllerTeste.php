<?php
//$objMail=new \Classes\ClassMail();
//$objMail->sendMail("wllngtnmts@gmail.com", "Wellington Matos", "", "Orçamento", "Orçamento do site - Teste");
$objDesv = new \Classes\ClassDesvios();
echo($objDesv->getDesviosParagraItem('1'));
