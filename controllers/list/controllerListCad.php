<?php
$objList=new \Classes\ClassLists();
$data=new DateTime('now',new DateTimeZone('America/Sao_Paulo'));

$arrayList['startdata']=$data->format("Y-m-d H:i:s");
$arrayList['enddata']=$data->format("Y-m-d H:i:s");
$arrayList['listCadCategoria']=$listCadCategoria;
$arrayList['lisCadProduto']=$lisCadProduto;
$arrayList['listCadQuantidade']=$listCadQuantidade;
$arrayList['listCadPrice']=$listCadPrice;
$arrayList['listCadStatus']=$listCadStatus;
$arrayList['observacoes']=$observacoes;
$arrayList['listCadPriceUnit']=$listCadPriceUnit;
$arrayList['listCadPesoPeca']=$listCadPesoPeca;

$objList->createListCad($arrayList);
echo "<script>
    window.location.href='".DIRPAGE."admin/lista';
</script>";