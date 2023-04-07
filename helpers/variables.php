<?php
$objPass=new \Classes\ClassPassword();

#Variáveis do cadastro e loging
if(isset($_POST['nome'])) {$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);} else {$nome = null;}
if(isset($_POST['email'])) {$email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);}else{$email=null;}
if(isset($_POST['cpf'])) {$cpf=filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$cpf=null;}
if(isset($_POST['matricula'])) {$matricula=filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$matricula=null;}
if(isset($_POST['dataNascimento'])) {$dataNascimento=filter_input(INPUT_POST,'dataNascimento',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$dataNascimento=null;}
if(isset($_POST['senhaAtual'])) {$senhaAtual=$_POST['senhaAtual']; $hashSenhaAtual=$objPass->passwordHash($senhaAtual);}else{$senhaAtual=null;$hashSenhaAtual=null;}
if(isset($_POST['senha'])) {$senha=$_POST['senha']; $hashSenha=$objPass->passwordHash($senha);}else{$senha=null;$hashSenha=null;}
if(isset($_POST['senhaConf'])) {$senhaConf=$_POST['senhaConf'];}else{$senhaConf=null;}
$dataCreate=date("Y-m-d H:i:s");
if (isset($_POST['token'])){
    $token = $_POST['token'];
} else {
    $token = bin2hex(random_bytes(64));
}
if(isset($_POST['g-recaptcha-response'])){$gRecaptchaResponse=$_POST['g-recaptcha-response'];}else{$gRecaptchaResponse=null;}
$arrVar=[
    "nome"=>$nome,
    "email"=>$email,
    "cpf"=>$cpf,
    "matricula"=>$matricula,
    "dataNascimento"=>$dataNascimento,
    "senha"=>$senha,
    "hashSenha"=>$hashSenha,
    "senhaAtual"=>$senhaAtual,
    "hashSenhaAtual"=>$hashSenhaAtual,
    "dataCreate"=>$dataCreate,
    "token"=>$token,
];

#Variáveis mercadinho
if(isset($_POST['listCategoria'])) {$listCategoria=filter_input(INPUT_POST, 'listCategoria', FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$listCategoria=null;}
if(isset($_POST['startDate'])){$startDate=filter_input(INPUT_POST,'startDate',FILTER_DEFAULT);}else{$startDate=null;}
if(isset($_POST['endDate'])){$endDate=filter_input(INPUT_POST,'endDate',FILTER_DEFAULT);}else{$endDate=null;}
if(isset($_POST['listStatus'])){$listStatus=filter_input(INPUT_POST,'listStatus',FILTER_DEFAULT);}else{$listStatus=null;}
if(isset($_POST['listCategoria'])){$listCategoria=filter_input(INPUT_POST,'listCategoria',FILTER_DEFAULT);}else{$listCategoria=null;}
if(isset($_POST['idProduto'])){$idProduto=filter_input(INPUT_POST,'idProduto',FILTER_DEFAULT);}else{$idProduto=null;}
if(isset($_POST['listCadCategoria'])){$listCadCategoria=filter_input(INPUT_POST,'listCadCategoria',FILTER_DEFAULT);}else{$listCadCategoria=null;}
if(isset($_POST['lisCadProduto'])){$lisCadProduto=filter_input(INPUT_POST,'lisCadProduto',FILTER_DEFAULT);}else{$lisCadProduto=null;}
if(isset($_POST['listCadQuantidade'])){$listCadQuantidade=filter_input(INPUT_POST,'listCadQuantidade',FILTER_DEFAULT);}else{$listCadQuantidade=null;}
if(isset($_POST['listCadPrice'])){$listCadPrice=filter_input(INPUT_POST,'listCadPrice',FILTER_DEFAULT);}else{$listCadPrice=null;}
if(isset($_POST['listCadStatus'])){$listCadStatus=filter_input(INPUT_POST,'listCadStatus',FILTER_DEFAULT);}else{$listCadStatus=null;}
if(isset($_POST['observacoes'])){$observacoes=filter_input(INPUT_POST,'observacoes',FILTER_DEFAULT);}else{$observacoes=null;}
if(isset($_POST['data'])){$data=filter_input(INPUT_POST,'data',FILTER_DEFAULT);}else{$data=null;}
if(isset($_POST['idEdit'])){$idEdit=filter_input(INPUT_POST,'idEdit',FILTER_DEFAULT);}else{$idEdit=null;}
if(isset($_POST['id'])){$id=filter_input(INPUT_POST,'id',FILTER_DEFAULT);}else{$id=null;}
if(isset($_POST['newPass'])){$newPass=filter_input(INPUT_POST,'newPass',FILTER_DEFAULT);}else{$newPass=null;}
if(isset($_POST['listCadPriceUnit'])){$listCadPriceUnit=filter_input(INPUT_POST,'listCadPriceUnit',FILTER_DEFAULT);}else{$listCadPriceUnit=null;}
if(isset($_POST['listCadPesoPeca'])){$listCadPesoPeca=filter_input(INPUT_POST,'listCadPesoPeca',FILTER_DEFAULT);}else{$listCadPesoPeca=null;}

$arr=[
    "listCategoria"=>$listCategoria,
    "startDate"=>$startDate,
    "endDate"=>$endDate,
    "listStatus"=>$listStatus,
];
$arrayList=[
    "startdata"=>$data,
    "enddata"=>$data,
    "listCadCategoria"=>$listCadCategoria,
    "lisCadProduto"=>$lisCadProduto,
    "listCadQuantidade"=>$listCadQuantidade,
    "listCadPrice"=>$listCadPrice,
    "listCadStatus"=>$listCadStatus,
    "observacoes"=>$observacoes,
];
$arrayListEdit=[
    "listCadPrice">$listCadPrice,
    "listCadQuantidade"=>$listCadQuantidade,
    "observacoes">$observacoes,
    "lisCadProduto"=>$lisCadProduto,
    "listCadStatus">$listCadStatus,
    "listCadCategoria"=>$listCadCategoria,
    "idEdit">$idEdit,
];

//todas as variaveis do sistema ficam aqui - GET
if(\Traits\TraitParseUrl::parseUrl(3)){$idGet=\Traits\TraitParseUrl::parseUrl(3);}else{$idGet='';}
if(\Traits\TraitParseUrl::parseUrl(2)){$subPage=\Traits\TraitParseUrl::parseUrl(2);}else{$subPage='';}
if(\Traits\TraitParseUrl::parseUrl(1)){$page=\Traits\TraitParseUrl::parseUrl(1);}else{$page='';}