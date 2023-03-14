<?php
$objList=new \Classes\ClassLists();
$data=new DateTime('now',new DateTimeZone('America/Sao_Paulo'));

$arrayListEdit['idEdit']=$idEdit;
$arrayListEdit['listCadCategoria']=$listCadCategoria;
$arrayListEdit['lisCadProduto']=$lisCadProduto;
$arrayListEdit['listCadQuantidade']=$listCadQuantidade;
$arrayListEdit['listCadPrice']=$listCadPrice;
$arrayListEdit['listCadStatus']=$listCadStatus;
$arrayListEdit['observacoes']=$observacoes;
//var_dump($arrayListEdit);
$objList->createListCadEdit($arrayListEdit);

echo "<script>
    window.location.href='".DIRPAGE."admin/lista';
</script>";