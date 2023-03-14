<?php
namespace Models;

class ModelPermition extends ClassCrud
{

    //Retorna todos os usuários do sistema
    protected function getAllUsersM()
    {
        $b=$this->selectDB(
            "*",
            "sis_users",
            "order by updatedAt desc limit 16",
                array()
        );
        return $f=$b->fetchAll(\PDO::FETCH_ASSOC);
    }


    //Realiza o update da senha no banco
    protected function updatePasswordM($id,$newPass)
    {
        $this->updateDB(
            "sis_users",
            "senha=?",
            "id=?",
            array(
                $newPass,
                $id
            )
        );
    }


    //Realiza a permissão do usuário
    protected function updatePermissionM($id,$permission)
    {
        $this->updateDB(
            "sis_users",
            "permissoes=?",
            "id=?",
            array(
                $permission,
                $id
            )
        );
    }

    //Deleta um usuário
    public function deleteUserM($id)
    {
        $this->deleteDB(
            "sis_users",
            "id=?",
            array(
                $id
            )
        );
    }

}