<?php
namespace Models;

class ClassCadastro extends ClassCrud
{
    #Realiza inserção no bando de dados.
    public function insertCad($arrVar)
    {
        $this->insertDB(
            "sis_users",
            "?,?,?,?,?,?,?,?,?,?,?",
            array(
                0,
                $arrVar['nome'],
                $arrVar['email'],
                $arrVar['hashSenha'],
                $arrVar['dataNascimento'],
                $arrVar['cpf'],
                $arrVar['matricula'],
                'comprador',
                'confirmation',
                $arrVar['dataCreate'],
                $arrVar['dataCreate']
            )
        );
        $this->insertConfirmation($arrVar);
    }

    #Armazenar email e token da solicitação para atualização de senha
    public function insertConfirmation($arrVar){
        $this->insertDB(
            "sis_confirmation",
            "?,?,?",
            array(
                0,
                $arrVar['email'],
                $arrVar['token']
            )
        );
    }

    #Validar se o email existe no banco de dados
    public function getIssetEmail($email)
    {
        $b=$this->selectDB(
            "*",
            "sis_users",
            "where email=?",
            array(
                $email,
            )
        );
        return $r=$b->rowCount();

    }

    #Validar se matricula existe no banco de dados
    public function getIssetMatricula($matriculacad)
    {
        $b=$this->selectDB(
            "*",
            "sis_users",
            "where matricula=?",
            array(
                $matriculacad,
            )
        );
        return $r=$b->rowCount();
    }


    #Validar se o cpf existe no banco
    public function getIssetCpf($cpf,$email)
    {
        $b=$this->selectDB(
            "*",
            "sis_users",
            "where cpf=? and email=?",
            array(
                $cpf,
                $email
            )
        );
        return $r=$b->rowCount();
    }



    #Verificar a confirmacao de cadastro pelo email
    public function confirmationCad($email,$token)
    {
        $b=$this->selectDB(
          "*",
          "sis_confirmation",
            "where email=? and token=?",
            array(
                $email,
                $token
            )
        );
        $r=$b->rowCount();
        if ($r > 0){
            $this->deleteDB(
                "sis_confirmation",
                "email=?",
                array(
                    $email
                )
            );
            $this->updateDB(
                "sis_users",
                "status=?",
                "email=?",
                array(
                    "active",
                    $email
                )
            );
            return true;
        }else{
            return false;
        }
    }


    #Ef2-pw2VnPV
    #Adam@27AdmLP.Da
    #Confirma atualização de senha para o usuário requisição por e-mail
    public function confirmationPasse($email,$token,$hashSenha)
    {
        $b=$this->selectDB(
            "*",
            "sis_confirmation",
            "where email=? and token=?",
            array(
                $email,
                $token
            )
        );
        $r=$b->rowCount();
        if ($r > 0){
            $this->deleteDB(
                "sis_confirmation",
                "email=?",
                array(
                    $email
                )
            );
            $this->updateDB(
                "sis_users",
                "senha=?",
                "email=?",
                array(
                    $hashSenha,
                    $email
                )
            );
            return true;
        }else{
            return false;
        }
    }



    #Retorna os dados da matricula do público
    public function searchMaticula($matricula)
    {
        $b=$this->selectDB(
            "*",
            "sis_publico",
            "join sis_gestor ON sis_gestor.idGestor = sis_publico.idGestor join sis_ga ON sis_gestor.idGa = sis_ga.idGa where matricula = ?",
                array($matricula)
        );
        $f=$b->fetch(\PDO::FETCH_ASSOC);


        $bGestor=$this->selectDB(
            "matricula as matriculaGestor, nomeCompleto as nomeGestor",
            "sis_publico",
            "where matricula=?",
            array(
                $f['matriculaGestor']
            )
        );
        $fGestor=$bGestor->fetch(\PDO::FETCH_ASSOC);

        $bGa=$this->selectDB(
            "matricula as matriculaGa, nomeCompleto as nomeGa",
            "sis_publico",
            "where matricula = ?",
            array(
                $f['matriculaGa']
            )
        );
        $fGa=$bGa->fetch(\PDO::FETCH_ASSOC);

        $bMat=$this->selectDB(
            "*",
            "sis_localmatriz",
            "where siteId = ?",
            array(
                $f['siteId']
            )
        );
        $fMat=$bMat->fetchAll(\PDO::FETCH_ASSOC);


        $r=$b->rowCount();

        return $arr=[
            'data'=>$f,
            'data2'=>$fGestor,
            'data3'=>$fGa,
            'matriz'=>$fMat,
            'rows'=>$r
        ];
    }
}