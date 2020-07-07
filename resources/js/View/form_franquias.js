class FormFranquias {

    constructor(controller, seletor){
        this.franquiaController = controller;
        this.seletor = seletor;
    }

    montarForm(franquia){
        if(!franquia){
            franquia = new Franquia();
        }
        var str = `
        <div class="container">
        <h2 class="titulos_tabela_form">Cadastro de Franquias</h2>
        <form id="formulario">
            <input type="hidden" id="idFranquia" value="${franquia.id}" />
            <label for="txtnome">Nome:</label>
            <input type="text" class="formulario_franquias esticar2" id="txtnome" placeholder="Franquia Rio de Janeiro" value="${franquia.nome ?franquia.nome :''}">
            <br />
            <label for="txttelefone">Telefone:</label>
            <input type="tel" class="formulario_franquias esticar2" id="txttelefone" placeholder="(00)0000-0000" value="${franquia.telefone ?franquia.telefone :''}">
            <br />
            <label for="txtendereco">Endereço:</label>
            <input type="text" class="formulario_franquias esticar2" id="txtendereco" placeholder="Rua Sarmento Leite, 500" value="${franquia.endereco ?franquia.endereco :''}">
            <br />
            <br />
            <input type="submit" class="botao_entrar" id="btnsalvar" value="Salvar">
            <input type="reset" class="botao_entrar" value="Cancelar">
            <br />
        </form>
        `;

        let containerForm = document.querySelector(this.seletor);
        containerForm.innerHTML = str;

        var form = document.querySelector("#formulario");
        const self = this;
        form.onsubmit = function(event){
            if(!franquia.id){
                self.franquiaController.salvar(event);
            }
            else{
                self.franquiaController.editar(franquia.id,event);
            }
        }

        form.onreset = function(event){
            self.franquiaController.limpar(event);
        }
    }

    limparFormulario(){
        document.querySelector("#txtnome").value="";
        document.querySelector("#txttelefone").value="";
        document.querySelector("#txtendereco").value="";
    }

    getDataFranquia(){
        let franquia = new Franquia();
        if(!document.querySelector("#idFranquia").value)
            franquia.id = document.querySelector("#idFranquia").value;
        franquia.nome = document.querySelector("#txtnome").value;
        franquia.telefone = document.querySelector("#txttelefone").value;
        franquia.endereco = document.querySelector("#txtendereco").value;
        return franquia;        
    }

}