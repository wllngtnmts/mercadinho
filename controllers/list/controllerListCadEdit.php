<?php
$objList=new \Classes\ClassLists();
$data=new DateTime('now',new DateTimeZone('America/Sao_Paulo'));
$listCadPrice1 = str_replace(",",".", $listCadPrice);
$listCadPriceUnit1 = str_replace(",",".", $listCadPriceUnit);
$arrayListEdit['idEdit']=$idEdit;
$arrayListEdit['listCadCategoria']=$listCadCategoria;
$arrayListEdit['lisCadProduto']=$lisCadProduto;
$arrayListEdit['listCadQuantidade']=$listCadQuantidade;
$arrayListEdit['listCadPrice']=$listCadPrice1;
$arrayListEdit['listCadStatus']=$listCadStatus;
$arrayListEdit['observacoes']=$observacoes;
$arrayListEdit['listCadPriceUnit']=$listCadPriceUnit1;
$arrayListEdit['listCadPesoPeca']=$listCadPesoPeca;
//var_dump($arrayListEdit);
$objList->createListCadEdit($arrayListEdit);

echo "<script>
   window.location.href='".DIRPAGE."admin/lista';
</script>";