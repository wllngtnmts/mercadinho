<?php
namespace Classes;

use Models\ModelPermition;
use Classes\ClassPassword;

class ClassPermition extends ModelPermition{

    private $erro=[];
    private $model;
    private $password;


    public function __construct()
    {
        $this->model=new ModelPermition();
        $this->password=new ClassPassword();
    }


    //Retorna os dados dos usuários do sistema
    public function getAllUsers()
    {
        return $this->model->getAllUsersM();
    }


    //Realiza o update da senha
    public function updatePassword($id,$senha)
    {
        $newPass=$this->password->passwordHash($senha);
        return $this->model->updatePasswordM($id,$newPass);
    }


    //Realiza o update da permissão do usuário
    public function updatePermission($id,$permission)
    {
        return $this->model->updatePermissionM($id,$permission);
    }


    //Deleta um usuário
    public function deleteUser($id)
    {
        return $this->model->deleteUserM($id);
    }

}