<?php
$email=\Traits\TraitParseUrl::parseUrl(2);
$token=\Traits\TraitParseUrl::parseUrl(3);
$confirmation=new \Models\ClassCadastro();

if ($confirmation->confirmationCad($email,$token)){
    echo "
        <script> 
        alert('Confirmação realizada com sucesso!');
        window.location.href='".DIRPAGE."login';
        </script>
    ";
}else{
    echo "
    <script>
    alert('Não foi possível confirmar seu cadastro.');
    window.location.href='".DIRPAGE."';
    </script>
    ";
}