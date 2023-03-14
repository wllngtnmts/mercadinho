<?php
$validate=new Classes\ClassValidate();
$validate->validarFields($_POST);
$validate->validateEmail($email);
$validate->validateIssetEmail($email);
$validate->validateIssetMatricula($matricula);
$validate->validateData($dataNascimento);
$validate->validateCpf($cpf);
$validate->validateConfSenha($senha,$senhaConf);
$validate->validateStrongSenha($senha);
$validate->validateCaptcha($gRecaptchaResponse);
echo $validate->validateFinalCad($arrVar);