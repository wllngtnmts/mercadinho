<?php
namespace Models;

class ClassList extends ClassCrud
{

    #Selecionar os itens da lista Pendentes
    public function getListTodayM()
    {
        $b = $this->selectDB(
            "*",
            "sis_lista lista JOIN sis_produto produto on lista.sis_lista_idsis_lista = produto.idsis_listProduct JOIN sis_categoriaproduto catProduto on lista.catProduct = catProduto.idsis_categoriaProduto order by idsis_list desc",
            "",
            array()
        );
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        return $f;
    }

    #Selecionar a lista filtrados por data em configurações
    public function getListByDateM($startDate, $endDate,$listStatus,$listCategoria)
    {
        if($listStatus == 'TODOS'){
            $listStatus = '%';
        }
        $b=$this->selectDB(
            "*",
            "sis_lista lista JOIN sis_produto produto on lista.sis_lista_idsis_lista = produto.idsis_listProduct JOIN sis_categoriaproduto catProduto on lista.catProduct = catProduto.idsis_categoriaProduto",
            "where startPruchaseProductDate >= '$startDate' and updatePurchaseProductDate <= '$endDate' and sis_listaStatus like '$listStatus' and catProduct like '$listCategoria' order by idsis_list desc",
            array()
        );
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        return $f;
    }

    ##Selecionar itens da lista por tipo
    public function getListStatusM()
    {
        $b=$this->selectDB(
            "*",
            "sis_categoriaproduto",
            "",
            array(

            )
        );
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        return $f;
    }

    #Seleciona itens da lista por Status
    public function getListCategoriaM($listStatus,$listCategoria)
    {
        if($listStatus == 'TODOS'){
            $listStatus = '%';
        }
        $b=$this->selectDB(
            "*",
            "sis_lista lista JOIN sis_produto produto on lista.sis_lista_idsis_lista = produto.idsis_listProduct JOIN sis_categoriaproduto catProduto on lista.catProduct = catProduto.idsis_categoriaProduto",
            "where sis_listaStatus like ? And catProduto.idsis_categoriaProduto like ? order by idsis_list desc",
            array(
                $listStatus,
                $listCategoria
            )
        );
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        return $f;
    }

    #Retorno de dados para configuração gestão EA
    public function getListProdutoM($idProduto)
    {
        $b=$this->selectDB(
            "*",
            "sis_produto",
            "where idsis_categoriaProduto=?",
            array(
                $idProduto
            )
        );
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        return $f;
    }

    public function createListCadM($arrayList)
    {
        $this->insertDB(
            "sis_lista",
            "?,?,?,?,?,?,?,?,?",
            array(
                0,
                $arrayList['startdata'],
                $arrayList['enddata'],
                $arrayList['listCadPrice'],
                $arrayList['listCadQuantidade'],
                $arrayList['observacoes'],
                $arrayList['lisCadProduto'],
                $arrayList['listCadStatus'],
                $arrayList['listCadCategoria'],

            )
        );
    }

    public function getListItemM($id)
    {
        $b=$this->selectDB(
            "*",
            "sis_lista lista JOIN sis_produto produto on lista.sis_lista_idsis_lista = produto.idsis_listProduct JOIN sis_categoriaproduto catProduto on lista.catProduct = catProduto.idsis_categoriaProduto",
            "where idsis_list = ?",
            Array(
              $id
            )
        );
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        return $f;
    }


    #Editar os RETS pela matricula
    public function getRetsEditM($id)
    {
        $b=$this->selectDB(
            "ret.id AS idRet, ret.createdAt, matriculaRet, nome_completo, ret.cam as idCam, caminhoes.tagCam as cam, ret.diaTurno as idDiaTurno, retdiaturno.diaTurno as diaTurno, ret.turno, ga.idGa AS idSite, ga.nomeGerenciaArea as site, ret.medio, ret.critico, executado, ret.turno as idTurno, retturno.turno, ret.localMatriz AS idLocMatriz, locMat.localMatriz, loc.id AS idLocal, loc.local, ret.observacoes, ret.eauser as eauser, ret.eacontrole as eacontrole, formea.idea as idea, gestor.idGestor, gestor.locacao, gestor.nome_gestor, ret.idGestor as idGestorExer, gestorExer.matriculaGestor as matriGestorExer, gestorExer.nome_gestor as nomeGestorExer, gestorExer.emailGestor as emailGestorExer",
            "sis_ret ret JOIN sis_publico pub ON pub.id = ret.matriculaRet JOIN sis_localmatriz locMat ON ret.localMatriz = locMat.id JOIN sis_local loc ON loc.id = ret.local JOIN sis_retcaminhoes caminhoes on ret.cam = caminhoes.idCam JOIN sis_retdiaturno retdiaturno on retdiaturno.idRetDiaTurno = ret.diaTurno JOIN sis_retturno retturno on ret.turno = retturno.idRetTurno join viewSis_gestorCom gestor on gestor.idGestor = pub.Id_gestor join viewSis_gaCom ga on ga.idGa = gestor.idGa left join sis_formularioea formea on ret.id = formea.idRet left join viewSis_gestorCom gestorExer on ret.idGestor = gestorExer.idGestor",
            "where ret.id=? order by idRet desc",
            array(
                $id
            )
        );
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        return $f;
    }


    #Selecionar os gestores de acordo com o filtro de cookies
    public function filterGestaoEventosM($startDate, $endDate, $matricula, $siteGa, $locacao)
    {
        $b=$this->selectDB(
            "ret.id AS idRet, ret.createdAt, matriculaRet, nome_completo, ret.cam as idCam, caminhoes.tagCam as cam, ret.diaTurno as idDiaTurno, retdiaturno.diaTurno as diaTurno, ret.turno, ga.idGa AS idSite, ga.nomeGerenciaArea as site, ret.medio, ret.critico, executado, ret.turno as idTurno, retturno.turno, ret.localMatriz AS idLocMatriz, locMat.localMatriz, loc.id AS idLocal, loc.local, ret.observacoes, ret.eauser as eauser, ret.eacontrole as eacontrole, formea.idea as idea, gestor.idGestor, gestor.locacao, gestor.nome_gestor",
            "sis_ret ret JOIN sis_publico pub ON pub.id = ret.matriculaRet JOIN sis_localmatriz locMat ON ret.localMatriz = locMat.id JOIN sis_local loc ON loc.id = ret.local JOIN sis_retcaminhoes caminhoes on ret.cam = caminhoes.idCam JOIN sis_retdiaturno retdiaturno on retdiaturno.idRetDiaTurno = ret.diaTurno JOIN sis_retturno retturno on ret.turno = retturno.idRetTurno join viewSis_gestorCom gestor on gestor.idGestor = pub.Id_gestor join viewSis_gaCom ga on ga.idGa = gestor.idGa left join sis_formularioea formea on ret.id = formea.idRet",
            "where date(ret.createdAt) >= '$startDate' and date(ret.createdAt) <= '$endDate' or idGestor like '%' or idSite like '%' or ret.matriculaRet order by idRet desc",
            array()
        );
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        return $f;
    }



    #Insert site no banco
    public function setSiteM($site)
    {
        $this->insertDB(
            "sis_site",
            "?,?",
            array(
                0,
                $site
            )
        );
    }




    #Insert local no banco
    public function setLocalM($matriz,$id)
    {
        $this->insertDB(
            "sis_local",
            "?,?,?",
            array(
                0,
                $id,
                $matriz
            )
        );
    }


    //Update Lista de intens
    public function createListCadEditM($arrayListEdit)
    {
        $this->updateDB(
            "sis_lista",
            "sis_listaValor=?,
            sis_listaQuant=?,
            sis_listaObs=?,
            sis_lista_idsis_lista=?,
            sis_listaStatus=?,
            catProduct=?",
            'idsis_list=?',
            array(
                $arrayListEdit['listCadPrice'],
                $arrayListEdit['listCadQuantidade'],
                $arrayListEdit['observacoes'],
                $arrayListEdit['lisCadProduto'],
                $arrayListEdit['listCadStatus'],
                $arrayListEdit['listCadCategoria'],
                $arrayListEdit['idEdit']
            )
        );
    }

    //Update ret
    public function updateConEAM($idRet)
    {
        $this->updateDB(
            "sis_ret",
            "eauser=?",
            'id=?',
            array(
                'Sim',
                $idRet
            )
        );
    }


    //Update tagDeviceFrotaSite
    public function updatetagDeviceFrotaSiteM($idCam,$idSite,$idEagle)
    {
        $this->updateDB(
            "sis_retcaminhoes",
            "idSite=?,idEagle=?",
            'idCam=?',
            array(
                $idSite,
                $idEagle,
                $idCam
            )
        );
    }






    //Criar formulário EA
    public function createEAM($arr)
    {
        $this->insertDB(
            "sis_formularioea",
            "?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?",
            array(
                0,
                $arr['idRet'],
                $arr['concentracao'],
                $arr['calmo'],
                $arr['descansadovisualmente'],
                $arr['cabeca'],
                $arr['dorpernas'],
                $arr['bocejar'],
                $arr['ideiasclaras'],
                $arr['dificuldadeolhos'],
                $arr['facilidadepe'],
                $arr['preocupacaoexterna'],
                $arr['usodemedicacoes'],
                $arr['descansadotrabalho'],
                $arr['observacoes'],
                $arr['cansacofadiga'],
                $arr['problemaspessoais'],
                $arr['familiaproblema'],
                $arr['faltadepreparo'],
                $arr['defeitoequipamento'],
                $arr['usoinadequado'],
                $arr['outrosmotivos'],
                $arr['especificacoes'],
                $arr['createdAt'],
                $arr['updatedAt']
            )
        );
    }


    //Seleciona formulário EA por id
    public function getFormularioEAByIdM($id)
    {
        $b=$this->selectDB(
            "*",
            "sis_formularioea",
            "where idea=?",
            array($id)
        );
        return $f=$b->fetch(\PDO::FETCH_ASSOC);
    }

    //Seleciona formulário EA por idRet
    public function getFormularioEAByIdRetM($id)
    {
        $b=$this->selectDB(
            "*",
            "sis_formularioea",
            "where idRet=?",
            array($id)
        );
        return $f=$b->fetch(\PDO::FETCH_ASSOC);
    }


    //Ativar usuário
    public function ativaUserM($id)
    {
        $this->updateDB(
            "sis_users",
            "status=?",
            "id=?",
            array(
                "active",
                $id
            )
        );
        $bEmail=$this->selectDB(
            "id, email",
            "sis_users",
            "where id=?",
            array(
                $id
            )
        );
        $fEmail=$bEmail->fetch(\PDO::FETCH_ASSOC);

        $this->deleteDB(
            'sis_attempt',
            'email=? and id >= ?',
            array(
                $fEmail['email'],
                '1'
            )
        );
    }


    //Buscar usuário por matrícula e nome
    public function searchUsersM($matricula,$name)
    {
        $b=$this->selectDB(
            "id, nome, email, matricula, permissoes, status, cpf, dataNascimento, createdAt, updatedAt",
            "sis_users",
            "where nome like ? and matricula like ? order by id desc limit 15",
            array(
                '%'.$name.'%',
                '%'.$matricula.'%',
            )
        );
        return $f=$b->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Busca equipamento por tag ou ip
    public function searchTagIpM($tag, $ip)
    {
        $b=$this->selectDB(
            "*",
            "viewSis_FrotaOptCom",
            "where TagCam = ? And hostIp like ?",
            array(
                $tag,
                '%'.$ip.'%',
            )
        );
        return $f=$b->fetchAll(\PDO::FETCH_ASSOC);
    }


    #Atualizar o feed do gestor
    public function setFeedGestorM($idRet, $matriculaGestor, $observacoes)
    {
        $this->insertDB(
            "sis_gestorfeedea",
            "?,?,?,?,?",
            array(
                0,
                $idRet,
                $matriculaGestor,
                date("Y-m-d H:i:s"),
                $observacoes
            )
        );
        $this->updateDB(
            "sis_ret",
            "eacontrole=?",
            'id=?',
            array(
                'Sim',
                $idRet
            )
        );
    }


    #Retorna o feed do gestor pelo id ret
    public function getFeedGestorByIdRetM($idRet)
    {
        $b=$this->selectDB(
            "idGestorFeed, idRet, matriculaGestor, createdAt, tratativaGestor, nome_completo, email",
            "sis_gestorfeedea feedea join sis_publico publico on publico.id = feedea.matriculaGestor",
            "where idRet=?",
            array($idRet)
        );
        return $f=$b->fetch(\PDO::FETCH_ASSOC);
    }



}
