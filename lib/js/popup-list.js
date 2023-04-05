//Show popup
async function estruturaPopup(action = null, classe, id=null, matricula =null, event=null)
{
    document.body.scrollTop=0;
    document.documentElement.scrollTop = 0;
    const fundo=document.querySelector('.fundo');
    const popup=document.querySelector(classe);
    fundo.style.height='5000px';
    fundo.style.display='block';
    popup.style.display='block';
    popup.style.top='30px';

    if(action == 'permitionSen') {

        let response = await fetch(getRoot() + 'controllers/controllerRandomSenha', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });
        let json = await response.json();
        document.querySelector('#newSen').value = json;
        document.querySelector('#id').value = id;
    }else if(action == 'permition') {
        document.querySelector('#id2').value = id;

    }

    if(action == 'cadEdit'){
    //Passa o identificado id do item para consulta no banco de dados
    document.querySelector('#idEdit').value=id;
    let listCadEdit=await fetch(getRoot()+'controllers/list/controllerListItem',{
        method:'POST',
        headers:{
            'Content-type':'application/json',
            'Accept':'application/json'
        },
        body: JSON.stringify({
            id:id
        })
    });
    // Recebe o retorno em JSON
    let listCadEditRes = await listCadEdit.json();
    // Atribui o valor da categoria do produto ao objeto lisCadCategoria marcando o item
    document.querySelector('#listCadCategoriaEdit').value = listCadEditRes[0].catProduct;

    let produto=document.querySelector('#lisCadProdutoEdit');
    produto.options.length=0;
    let response=await fetch(getRoot()+'controllers/list/controllerListProduto',{
        method:'POST',
        headers:{
            'Content-type':'application/json',
            'Accept':'application/json'
        },
        body: JSON.stringify({
            select: document.querySelector('#listCadCategoriaEdit').value
        })
    });
    let json1=await response.json();

    if (json1.length != 0){
        produto.options[produto.options.length] = new Option("Selecione produto","");
        json1.map((elem,ind,obj)=>{
            produto.options[produto.options.length] = new Option(elem.sis_listaProduto, elem.idsis_listProduct);
        })
    }else{
        produto.options[produto.options.length] = new Option("Nenhum resultado", "");
    }
    document.querySelector('#lisCadProdutoEdit').value = listCadEditRes[0].idsis_listProduct;
    document.querySelector('#listCadQuantidadeEdit').value = listCadEditRes[0].sis_listaQuant;
    document.querySelector('#listCadPriceEdit').value = listCadEditRes[0].sis_listaValor;
    document.querySelector('#listCadStatusEdit').value = listCadEditRes[0].sis_listaStatus;
    document.querySelector('#observacoesEdit').value = listCadEditRes[0].sis_listaObs;
    }
}


    async function showPopupListCad(e,select,product=null,action=null,id=null,classe)
    {
        e.preventDefault();
        let produto=document.querySelector('#'+product);
        produto.options.length=0;
        let response=await fetch(getRoot()+'controllers/list/controllerListProduto',{
            method:'POST',
            headers:{
                'Content-type':'application/json',
                'Accept':'application/json'
            },
            body: JSON.stringify({
                select: document.querySelector('#'+select).value
            })
        });
        let json1=await response.json();

        if (json1.length != 0){
            produto.options[produto.options.length] = new Option("Selecione produto","");
            json1.map((elem,ind,obj)=>{
                produto.options[produto.options.length] = new Option(elem.sis_listaProduto, elem.idsis_listProduct);
            })
        }else{
            produto.options[produto.options.length] = new Option("Nenhum resultado", "");
        }
    }


if (document.querySelector('#listCadCategoria')){
    let listCadCategoria=document.querySelector('#listCadCategoria');
    listCadCategoria.addEventListener('change',(e)=>showPopupListCad(e,'listCadCategoria','lisCadProduto'),false)
}

if(document.querySelector('#listCadCategoriaEdit')){
    let listCadCategoriaEdit=document.querySelector('#listCadCategoriaEdit');
    listCadCategoriaEdit.addEventListener('change',(e)=>showPopupListCad(e,'listCadCategoriaEdit','lisCadProdutoEdit'),false);
}


//Fundo click disable
if(document.querySelector(".fundo")){
    document.querySelector(".fundo").addEventListener("click",function () {

        if(document.querySelector('.popupListConf')){document.querySelector('.popupListConf').style.display='none';}
        if(document.querySelector('.popupRet')){document.querySelector('.popupRet').style.display='none';}
        if(document.querySelector('.popupRetEdit')){document.querySelector('.popupRetEdit').style.display='none';}
        if(document.querySelector('.popupPermSen')){document.querySelector('.popupPermSen').style.display='none';}
        if(document.querySelector('.popupPerm')){document.querySelector('.popupPerm').style.display='none';}

        this.style.display='none';
        event.target.style.height=0;
    });
}

if(document.querySelector('.cadastroRetNovo')){
    document.querySelector('.cadastroRetNovo').addEventListener('click',()=>estruturaPopup('cad','.popupRet'),false);
}
if(document.querySelector('.cadastroListConf')){
    document.querySelector('.cadastroListConf').addEventListener('click',()=>estruturaPopup('conf','.popupListConf'),false);
}

if (document.querySelector('.cadastroListEdit')){
    let listBtnEdit=document.querySelectorAll('.cadastroListEdit');
    for (let i=0; i < listBtnEdit.length; i++){
        listBtnEdit[i].addEventListener('click',(event)=>estruturaPopup('cadEdit','.popupRetEdit',event.target.dataset.id),false);
    }
}

//Altera a senha dos usuários admins
if(document.querySelector('.btnPermSen')){
    let tablePerm=document.querySelector('.tablePerm tbody');
    tablePerm.addEventListener('click',(event)=>{
        if(event.target.className == 'btnPermSen'){
            estruturaPopup('permitionSen', '.popupPermSen', event.target.dataset.id, event.target.dataset.matricula);
        }
    });
}


//Altera a permissão dos usuários admins USPbYJTp7W
if(document.querySelector('.btnPerm')){
    let tablePerm=document.querySelector('.tablePerm tbody');
    tablePerm.addEventListener('click',(event)=>{
        if(event.target.className == 'btnPerm'){
            estruturaPopup('permition','.popupPerm',  event.target.dataset.id, event.target.dataset.matricula);
        }
    });
}
// Obtenha referências aos elementos HTML correspondentes
const quantityInput = document.getElementById('listCadQuantidade');
const weightInput = document.getElementById('listCadPriceUnit');
const pesoPecaInput = document.getElementById('listCadPesoPeca');
const resultInput = document.getElementById('listCadPrice');

// Defina a função que calcula o peso unitário
function calculateWeight() {
    let quantityValue = parseFloat(quantityInput.value);
    let weightValue = parseFloat(weightInput.value);

        let unitWeight = (weightValue / 1000) * quantityValue;
        resultInput.value = unitWeight.toLocaleString('pt-BR',{minimumFractionDigits: 2, maximumFractionDigits: 2});

    if (isNaN(quantityValue) || isNaN(weightValue)) {
        resultInput.value = 0;
        return;
    }
}

// Defina a função que calcula a quantidade
function calculateQuantity() {
    let quantityValue = parseFloat(quantityInput.value);
    let weightValue = parseFloat(weightInput.value);

    let unitQuantity = quantityValue * weightValue;
        resultInput.value = unitQuantity.toLocaleString('pt-BR',{minimumFractionDigits: 2, maximumFractionDigits: 2});

    if (isNaN(quantityValue) || isNaN(weightValue)) {
        resultInput.value = 0;
        return;
    }
}

// Adicione o evento onchange a cada elemento que precisa ser atualizado
quantityInput.onchange = function () {
    if (pesoPecaInput.value === 'PESO') {
        calculateWeight();
    } else {
        calculateQuantity();
    }
};

weightInput.onchange = function () {
    if (pesoPecaInput.value === 'PESO') {
        calculateWeight();
    } else {
        calculateQuantity();
    }
};

pesoPecaInput.onchange = function () {
    if (this.value === 'UNIDADE') {
        calculateQuantity();
    } else {
        calculateWeight();
    }
};

// Adicione o evento onchange ao select para atualizar o resultado
pesoPecaInput.onchange = function () {
    if (this.value === 'UNIDADE') {
        calculateQuantity();
    } else {
        calculateWeight();
    }
};




