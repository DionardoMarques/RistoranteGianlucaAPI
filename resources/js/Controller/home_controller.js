class HomeController{
    constructor() {
        this.home = new HomeVisual(this,"main");
    }

    inicializa(){
        this.carregarHome();
    }

    carregarHome(){
        event.preventDefault();
        this.home.montarHome();
    }
}