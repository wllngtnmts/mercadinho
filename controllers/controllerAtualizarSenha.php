<?php
$validate=new Classes\ClassValidate();
$arrVar['email']=$_SESSION['email'];
$validate->validarFields($_POST);
$validate->validateConfSenha($senha,$senhaConf);
$validate->validateStrongSenha($senha);
//$validate->validateCaptcha($gRecaptchaResponse);
echo $validate->validateFinalAlterarSenha($arrVar);

