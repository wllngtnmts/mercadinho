<?php
namespace Classes;

use Models\ClassCrud;
use Models\ClassList;

class ClassLists extends ClassCrud
{

    private $erro = [];
    private $model;


    public function __construct()
    {
        $this->model = new ClassList();
    }

    //Listorna os erros do cadastro
    public function getErro()
    {
        return $this->erro;
    }

    //Seta os erros do cadastro
    public function setErro($erro)
    {
        array_push($this->erro, $erro);
    }

    //#Seleciona itens da lista por data
    public function getListByDate($startDate, $endDate,$listStatus,$listCategoria)
    {
        return $this->model->getListByDateM($startDate, $endDate,$listStatus,$listCategoria);
    }

    //#Seleciona itens da lista por categoria
    public function getListCategoria($listStatus,$listCategoria){
        return $this->model->getListCategoriaM($listStatus,$listCategoria);
    }

    //Retorna os registros na lista do dia
    public function getListToday()
    {
        return $this->model->getListTodayM();
    }

    //#Selecionar itens da lista por categoria
    public function getListStatus(){
        return $this->model->getListStatusM();
    }

    //Selecionar itens da lista produto
    public function getListProduto($idProduto){
        return $this->model->getListProdutoM($idProduto);
    }

    //Adiciona o iten na lista
    public function createListCad($arrayList){
        return $this->model->createListCadM($arrayList);
    }

    public function getListItem($id){
        return $this->model->getListItemM($id);
    }

    public function createListCadEdit($arrayListEdit){
        return $this->model->createListCadEditM($arrayListEdit);
    }

    public function searchUsers($matricula,$name){
        return $this->model->searchUsersM($matricula,$name);
    }

    public function ativaUser($id)
    {
        return $this->model->ativaUserM($id);
    }
}