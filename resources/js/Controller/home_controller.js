class HomeController{
    constructor() {
        this.home = new HomeVisual(this,"main");
    }

    inicializa(){
        this.montarHome();
    }

    carregarHome(){
        event.preventDefault();
        this.home.montarHome();
    }
}