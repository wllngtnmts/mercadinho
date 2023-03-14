<?php
namespace Classes;

use Models\ClassCadastro;
use Models\ClassLogin;
use ZxcvbnPhp\Zxcvbn;
use Classes\ClassPassword;

class ClassValidate{

    private $erro=[];
    private $cadastro;
    private $password;
    private $login;
    private $tentativas;
    private $session;
    private $mail;

    public function __construct()
    {
        $this->cadastro=new ClassCadastro();
        $this->password=new ClassPassword();
        $this->login=new ClassLogin();
        $this->session=new ClassSessions();
        $this->mail=new ClassMail();
    }

    public function getErro()
    {
        return $this->erro;
    }

    public function setErro($erro)
    {
        array_push($this->erro,$erro);
    }

    #Validar os campos se eles foram preechidos
    public function validarFields($par)
    {
        $i=0;
        foreach ($par as $key=>$value)
        {
            if(empty($value))
            {
                $i++;
            }
            if ($i==0)
            {
                return true;
            }else{
                $this->setErro("Preencha todos os campos!");
                return false;
            }
        }
    }

    #Cadastro validação de email
    public function validateEmail($par)
    {
        if (filter_var($par,FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            $this->setErro("E-mail inválido!");
            return false;
        }
    }

    #Cadastro validação de email
    public function validateData($par)
    {
        $data=\DateTime::createFromFormat("d/m/Y",$par);

        if(($data) && ($data->format("d/m/Y") === $par))
        {
            return true;
        }else{
            $this->setErro("Data inválida!");
            return false;
        }
    }

    #Validar se o email existe no banco de dados ($action null é utilizado para cadastro)
    public function validateIssetEmail($email,$action=null)
    {
        $b=$this->cadastro->getIssetEmail($email);
        if($action==null){
            if($b > 0){
                $this->setErro("Email já cadastrado, ligue para 94 98805-6755!");
                return false;
            }else{
                return true;
            }
        }else{
            if($b > 0){
                return true;
            }else{
                $this->setErro("Email não cadastrado!");
                return false;
            }
        }
    }

    #Validar se matricula existe no banco de dados ($action null é utilizado para cadastro)
    public function validateIssetMatricula($matriculacad,$action=null)
    {
        $b=$this->cadastro->getIssetMatricula($matriculacad);

        if($action==null){
            if($b > 0){
                $this->setErro("Matricula já cadastrada, ligue para 94 98805-6755!");
                return false;
            }else{
                return true;
            }
        }else{
            if($b > 0){
                return true;
            }else{
                $this->setErro("Matricula não cadastrada!");
                return false;
            }
        }
    }

    #Cadastro validação de CPF
    public function validateCpf($par)
    {
        $cpf = preg_replace('/[^0-9]/', '', (string) $par);

        // Valida tamanho
        if (strlen($cpf) != 11)
        {
            $this->setErro("CPF inválido!");
            return false;
        }

        // Calcula e confere primeiro dígito verificador
        for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--)
            $soma += $cpf{$i} * $j;
            $resto = $soma % 11;

        if ($cpf{9} != ($resto < 2 ? 0 : 11 - $resto))
        {
            $this->setErro("CPF inválido!");
            return false;
        }

        // Calcula e confere segundo dígito verificador
        for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--)
            $soma += $cpf{$i} * $j;
            $resto = $soma % 11;
            return $cpf{10} == ($resto < 2 ? 0 : 11 - $resto);
    }

    #Verificar se a senha e igual a confirmação de senha
    public function validateConfSenha($senha,$senhaConf)
    {
        if($senha === $senhaConf){
            return true;
        }else{
            $this->setErro("As senhas que você digitou não correspondem!");
        }
    }

    #Vai verificar se o captcha esta correto
    public function validateCaptcha($captcha,$score=0.1)
    {
        $return=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRETKEY."&response={$captcha}");
        $response=json_decode($return);
        if($response->success == true && $response->score >= $score)
        {
            return true;
        }else{
            $this->setErro("Captcha inválido! Atualize a pagina e tente novamente.");
        }
    }

    #Verificar a força da senha
    public function validateStrongSenha($senha,$par=null)
    {
        $zxcvbn = new zxcvbn();
        $strength = $zxcvbn->passwordStrength($senha);
        if ($par === null) {
            if ($strength['score'] > 2){
                return true;
            } else {
                $this->setErro("Utilize uma senha mais forte!");
            }
        }else{
            /*login*/
        }


    }


    #Verificação da senha com hash no banco de dados
    public function validateSenha($email,$senha)
    {
        if($this->password->verifyHash($email,$senha))
        {
            return true;
        }else{
            $this->setErro("Usuário ou senha inválidos!");
        }
    }

    #Validação final do cadastro
    public function validateFinalCad($arrVar)
    {
        if(count($this->getErro())>0)
        {
            $arrResponse=[
                "retorno"=>"erro",
                "erros"=>$this->getErro()
                ];
        }else{
            $this->mail->sendMail(
                $arrVar['email'],
                $arrVar['nome'],
                $arrVar['token'],
                "TCC_I e II!",
                "
                <strong>Bem vindo a mercadinho lista de compras!</strong><br>
                Confirme seu e-mail <a href='".DIRPAGE."controllers/controllerConfirmacao/{$arrVar['email']}/{$arrVar['token']}'>Clicando aqui...</a>
                "
            );

            $arrResponse=[
                "retorno"=>"success",
                "erros"=>null
            ];
            $this->cadastro->insertCad($arrVar);
        }
        return json_encode($arrResponse);
    }

    #Validação das tentativas
    public function validateAttemptLogin($email)
    {
        if($this->login->countAttempt() >= 5){
            $this->setErro("Você realizou mais de cinco tentativas");
            $this->tentativas=true;
            $this->login->updateStatusBlockUser($email);
            return false;
        }else{
            $this->tentativas=false;
            return true;
        }
    }

    #Método de validação de confirmação de email (usuário pode acessar até 5 dias como confirmation após o cadastro)
    public function validateUserActive($email)
    {
        $user=$this->login->getDataUser($email);
        if($user["data"]["status"] == 'confirmation'){
            if (strtotime($user["data"]["createdAt"]) <= strtotime(date("Y-m-d H:i:s"))-432000){
                $this->setErro("Contate wellington.matos@sistemasesoftware.com.br ou reset sua senha!");
                return false;
            }else{
                return true;
            }
        }else{
            return true;
        }
    }


    #Verifica se o CPF está cadastrado
    public function verifyCpfRegister($cpf,$email)
    {
        if($this->cadastro->getIssetCpf($cpf,$email) > 0){
            return true;
        }else{
            $this->setErro('Usuário ou email inválidos!');
        }

    }

    #Validação do esqueci minha senha
    public function validateEsqueciMinhaSenha($arrVar)
    {
        if(count($this->getErro())>0){
            $arrResponse=[
                "retorno"=>"erro",
                "erros"=>$this->getErro()
            ];
        }else{
            $this->mail->sendMail(
                $arrVar['email'],
                $arrVar['nome'],
                $arrVar['token'],
                'SOLICITAÇÃO DE REDEFINIÇÃO DE ACESSO!',
                "Redefina seu acesso a sua lista mercadinho <br>
                           Trabalho TCC I e II<br>
                <a href='".DIRPAGE."revisar-meu-passe/{$arrVar['email']}/{$arrVar['token']}'> Clique aqui</a>");
            $arrResponse=[
                "retorno"=>"success",
                "erros"=>null
            ];
            $this->cadastro->insertConfirmation($arrVar);
        }
        return json_encode($arrResponse);
    }

    #Validação do esqueci minha senha
    public function validateRevisarMeuAcesso($email,$cpf,$token)
    {
        if(count($this->getErro())>0){
            $arrResponse=[
                "retorno"=>"erro",
                "erros"=>$this->getErro()
            ];
        }else{
            $this->mail->sendMail($email,'Engenharia de Software',null,'REDEFINIÇÃO DE ACESSO!',"Redefina seu acesso a sua lista mercadinho<br> Trabalho TCC I e II<br>".DIRPAGE."redefinicao-de-acesso");
            $arrResponse=[
                "retorno"=>"success",
                "erros"=>null
            ];
        }
        return json_encode($arrResponse);
    }

    #Validação final do email
    public function validateFinalLogin($email)
    {
        if(count($this->getErro())>0){
            $this->login->insertAttempt($email);

            $arrResponse=[
                "retorno"=>"erro",
                "erros"=>$this->getErro(),
                "tentativas"=>$this->tentativas
            ];
        }else{
            $this->login->deleteAttempt();
            $this->session->setSessions($email);

            $arrResponse=[
                "retorno"=>"success",
                "page"=>'admin/',
                "tentativas"=>$this->tentativas
            ];
        }
        return json_encode($arrResponse);
    }



    #Verifica troca de senha
    public function validateFinalAlterarSenha($parametro)
    {
        if(count($this->getErro())>0){
            $arrResponse=[
                "retorno"=>"erro",
                "erros"=>$this->getErro()
            ];
        }else{
            if($this->password->verifyHash($parametro['email'],$parametro['senhaAtual'])){
                $this->login->updatePass($parametro['hashSenha'],$parametro['email']);
                $arrResponse=[
                    "retorno"=>"success"
                ];
            }else{
                $this->setErro('Senha atual incorreta');
                $arrResponse=[
                    "retorno"=>"erro",
                    "erros"=>$this->getErro()
                ];
            }
        }
        return json_encode($arrResponse);
    }
}