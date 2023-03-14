<?php
$validate=new Classes\ClassValidate();
$validate->validarFields($_POST);
$validate->validateEmail($email);
$validate->validateIssetEmail($email,"login");
$validate->validateStrongSenha($senha);
$validate->validateSenha($email,$senha);
$validate->validateCaptcha($gRecaptchaResponse);
$validate->validateUserActive($email);
$validate->validateAttemptLogin($email);
echo $validate->validateFinalLogin($email);
/*var_dump($validate->getErro());
var_dump($_SESSION);*/