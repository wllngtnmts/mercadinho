<?php
namespace Models;

use Traits\TraitGetIp;

class ClassLogin extends ClassCrud
{
    private $trait;
    private $dateNow;

    public function __construct()
    {
        $this->trait=TraitGetIp::getUserIp();
        $this->dateNow=date("Y-m-d H:i:s");
    }

    #Retorna os dados do usuário
    public function getDataUser($email)
    {
        $b=$this->selectDB(
            "*",
            "sis_users",
            "where email=?",
            array(
                $email
            )
        );
        $f=$b->fetch(\PDO::FETCH_ASSOC);
        $r=$b->rowCount();
        return $arrData=[
            "data"=>$f,
            "rows"=>$r
        ];
    }

    #conta as tentativas
    public function countAttempt()
    {
        $b=$this->selectDB(
            "*",
            "sis_attempt",
            "where ip=?",
            array(
                $this->trait
            )
        );
        $r=0;
        while($f=$b->fetch(\PDO::FETCH_ASSOC)){
            if(strtotime($f["date"]) > strtotime($this->dateNow)-1200){
                $r++;
            }
        }
        return $r;
    }

    #Inseri as tentativas
    public function insertAttempt($email)
    {
        if ($this->countAttempt() < 5){
            $this->insertDB(
                "sis_attempt",
                "?,?,?,?",
                array(
                    0,
                    $this->trait,
                    $this->dateNow,
                    $email
                )
            );
        }
    }

    #Deleta as tentativas trait recebe ip do usuário
    public function deleteAttempt()
    {
       $this->deleteDB(
           "sis_attempt",
           "ip=?",
           array(
               $this->trait
           )
       );
    }


    #Update senha do usuário
    public function updatePass($senha,$email)
    {
        $this->updateDB(
            'sis_users',
                'senha=?',
                    'email=?',
            array(
                $senha,
                $email
            )
        );
    }

    #Bloqueia o usuário após 5 tentativas
    public function updateStatusBlockUser($email)
    {
        $this->updateDB(
            'sis_users',
            'status=?',
            'email=?',
            array(
                'confirmation',
                $email
            )
        );
    }

}
