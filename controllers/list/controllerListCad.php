<?php
$objList=new \Classes\ClassLists();
$data=new DateTime('now',new DateTimeZone('America/Sao_Paulo'));
$listCadPrice1 = str_replace(",",".", $listCadPrice);
$listCadPriceUnit1 = str_replace(",",".", $listCadPriceUnit);
$arrayList['startdata']=$data->format("Y-m-d H:i:s");
$arrayList['enddata']=$data->format("Y-m-d H:i:s");
$arrayList['listCadCategoria']=$listCadCategoria;
$arrayList['lisCadProduto']=$lisCadProduto;
$arrayList['listCadQuantidade']=$listCadQuantidade;
$arrayList['listCadPrice']=$listCadPrice1;
$arrayList['listCadStatus']=$listCadStatus;
$arrayList['observacoes']=$observacoes;
$arrayList['listCadPriceUnit']=$listCadPriceUnit1;
$arrayList['listCadPesoPeca']=$listCadPesoPeca;
var_dump($arrayList);
$objList->createListCad($arrayList);
//echo "<script>
 //    window.location.href='".DIRPAGE."admin/lista';
//</script>";