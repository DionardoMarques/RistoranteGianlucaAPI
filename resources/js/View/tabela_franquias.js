class TabelaFranquias {
    
    constructor(controller, seletor){
        this.franquiaController = controller;
        this.seletor = seletor;
    }

    montarTabela(franquias){
        var str=`
        <div class="container">
        <h2 class="titulos_tabela_form">Tabela de Franquias Cadastradas</h2>
        <a class="botao_restrito container" id="novo" href="#">Novo</a>
        <div id="tabela">
        <table class="tabela_franquias">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th colspan="2">Ação</th>
            </tr>`;
    
        for(var i in franquias){
            str+=`<tr id=${franquias[i].id}>
                    <td>${franquias[i].id}</td>
                    <td>${franquias[i].nome}</td>
                    <td>${franquias[i].telefone}</td>
                    <td>${franquias[i].endereco}</td>
                    <td><a class="edit" href="#">Editar</b></a></td>
                    <td><a class="delete" href="#">Deletar</a></td>    
                </tr>`;
                
        } 
        str+= `
        </table>
        </div>`;

        var tabela = document.querySelector(this.seletor);
        tabela.innerHTML = str;

        const self = this;
        const linkNovo = document.querySelector("#novo");
        linkNovo.onclick = function(event) {
            self.franquiaController.carregarFormulario(event);
        }

        const linksDelete = document.querySelectorAll(".delete");
        for(let linkDelete of linksDelete)
        {
            const id = linkDelete.parentNode.parentNode.id;
            linkDelete.onclick = function(event){
                self.franquiaController.deletarFranquia(id);
            }
        }

        const linksEdit = document.querySelectorAll(".edit");
        for(let linkEdit of linksEdit)
        {
            const id = linkEdit.parentNode.parentNode.id;
            //Outra forma de tratar o evento (click) - nesse caso deve ter bind
            linkEdit.addEventListener("click",this.franquiaController.carregaFormularioComFranquia.bind(this.franquiaController,id));
        }

    }
    
}