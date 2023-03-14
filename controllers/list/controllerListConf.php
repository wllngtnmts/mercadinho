<?php
//Setando novos cookies
if(\Traits\TraitParseUrl::parseUrl(2)){
    $timeCookie=time() + (86400 * 30);
    setcookie('listCategoria', $listCategoria, $timeCookie, "/");
    setcookie('listStatus', $listStatus, $timeCookie, "/");
    if($startDate != null){
        setcookie('startDate', $startDate.' 00:00:00', $timeCookie,"/");
    }else{
        setcookie('startDate', "",$timeCookie,"/");
    }
    if($endDate != null){
        setcookie('endDate', $endDate.' 23:59:59', $timeCookie,"/");
    }else{
        setcookie('endDate', "",$timeCookie,"/");
    }
    echo "olá!";
    header("location:".DIRPAGE.'admin/lista');

}else{
    //Retornando os dados dos cookies
    if(isset($_COOKIE['listCategoria'])){$arr['listCategoria']=$_COOKIE['listCategoria'];}
    if(isset($_COOKIE['listStatus'])){$arr['listStatus']=$_COOKIE['listStatus'];}
    if(isset($_COOKIE['startDate'])){$arr['startDate']=$_COOKIE['startDate'];}
    if(isset($_COOKIE['endDate'])){$arr['endDate']=$_COOKIE['endDate'];}
    echo json_encode($arr);

}


/*if(isset($_COOKIE['listCategoria'])){unset($_COOKIE['listCategoria']);}
if(isset($_COOKIE['startDate'])){unset($_COOKIE['startDate']);}
if(isset($_COOKIE['endDate'])){unset($_COOKIE['endDate']);}*/