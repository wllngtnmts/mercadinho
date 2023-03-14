<?php
$validate=new Classes\ClassValidate();
$token=bin2hex(random_bytes(64));
$validate->validarFields($_POST);
$validate->validateEmail($email);
$validate->validateIssetEmail($email,'teste');
$validate->verifyCpfRegister($cpf,$email);
$validate->validateCaptcha($_POST['gRecaptchaResponse']);
echo $validate->validateEsqueciMinhaSenha($arrVar);

