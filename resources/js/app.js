const homeController = new HomeController();
const franquiaController = new FranquiaController();

//HOME
document.querySelector("#home").onclick = function() {
    homeController.inicializa();
}

//SOBRE
document.querySelector("#sobre").onclick = function() {
    document.querySelector("main").innerHTML = "<h2>Sobre</h2>";
}

//LOJAS
document.querySelector("#lojas").onclick = function() {
    document.querySelector("main").innerHTML = "<h2>Lojas</h2>";
}

//CARDÁPIO
document.querySelector("#cardapio").onclick = function() {
    document.querySelector("main").innerHTML = "<h2>Cardápio</h2>";
}

//CONTATO
document.querySelector("#contato").onclick = function() {
    document.querySelector("main").innerHTML = "<h2>Contato</h2>";
}

//RESTRITO
document.querySelector("#franquias").onclick = function() {
    franquiaController.inicializa();
}