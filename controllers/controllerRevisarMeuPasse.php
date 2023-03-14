<?php
$validate = new Classes\ClassValidate();
$confirmation = new Models\ClassCadastro();
if($validate->validateCaptcha($gRecaptchaResponse)){
    if($validate->validateConfSenha($senha,$senhaConf)){
        if($validate->validateStrongSenha($senha)){
            if ($confirmation->confirmationPasse($email,$token,$hashSenha)){

            }else{
                $validate->setErro("Não foi possível atulaizar seu passe!");
            }
        }else{
            $validate->setErro("Senha muito fraca, escolha uma senha mais forte!");
        }
    }else{
        $validate->setErro("Senha e confirmação de senha não confere!");
    }
}else{
    $validate->setErro("Captcha Inválido, atualize sua pagina e tente novamente!");
}

if(count($validate->getErro())>0){
    echo json_encode([
        'retorno'=>'erro',
        'erros'=>$validate->getErro()
    ]);
}else{
    echo json_encode([
        'retorno'=>'success',
        'erros'=>null
    ]);
}


