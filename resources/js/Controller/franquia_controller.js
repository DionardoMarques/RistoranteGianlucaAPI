class FranquiaController{
    constructor() {
        this.franquiaService = new FranquiaAPIService(); 
        this.tabelaFranquias = new TabelaFranquias(this,"main");
        this.formFranquias = new FormFranquias(this,"main");
    }

    inicializa(){
        this.carregarFranquias();
    }

    carregarFormulario(){
        event.preventDefault();
        this.formFranquias.montarForm();
    }

    carregarFranquias(){
        const self = this;
        //definição da função que trata o buscar franquias com sucesso
        const sucesso = function(franquias){
            self.tabelaFranquias.montarTabela(franquias);
        }
    
        //definição da função que trata o erro ao buscar os franquias
        const trataErro = function(statusCode) {
            console.log("Erro:", statusCode);
        }

        this.franquiaService.buscarFranquias(sucesso, trataErro);
    }

    limpar(event){
        event.preventDefault();
        this.formFranquias.limparFormulario();
        this.carregarFranquias();
    }

    salvar(event){
        event.preventDefault();
        var franquia = this.formFranquias.getDataFranquia();
        console.log("Franquia", franquia);
        
        this.salvarFranquia(franquia);

    }

    salvarFranquia(franquia){
        const self = this;

        const sucesso = function(franquiaCriada) {
            console.log("Franquia Criada",franquiaCriada);
            self.carregarFranquias();
            self.formFranquias.limparFormulario();
        }

        const trataErro = function(statusCode) {
            console.log("Erro:",statusCode);
        }

        this.franquiaService.enviarFranquia(franquia, sucesso, trataErro);

    }

    deletarFranquia(id, event){
        const self = this;
        this.franquiaService.deletarFranquia(id,
            //colocar direto a funcao no parametro
            //nao precisa criar a variavel ok e erro
            function() {
                self.carregarFranquias();
            },
            function(status) {
                console.log(status);
            }
        );
    }

    carregaFormularioComFranquia(id, event){
        event.preventDefault();

        const self = this;
        const ok = function(franquia){
            self.formFranquias.montarForm(franquia);
        }
        const erro = function(status){
            console.log(status);
        }

        this.franquiaService.buscarFranquia(id,ok,erro);
    }

    editar(id,event){
        event.preventDefault();

        let franquia = this.formFranquias.getDataFranquia();

        const self = this;

        this.franquiaService.atualizarFranquia(id,franquia,
            function() {
                self.formFranquias.limparFormulario();
                self.carregarFranquias();
            },
            function(status) {
                console.log(status);
            }
        );
    
    }


}