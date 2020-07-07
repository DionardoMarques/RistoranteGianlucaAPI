// const homeController = new HomeController();
const franquiaController = new FranquiaController();

//RISTORANTE_GIANLUCA.HTML
// var body = document.querySelector("body");
// body.onload = function () {
//     //franquiaController.carregarFormulario();
//     //franquiaController.inicializa();
//     document.querySelector("main").innerHTML = "<h2>INÍCIO DE UM NOVO COMEÇO</h2>";
// }

//HOME
document.querySelector("#home").onclick = function() {
    // homeController.inicializa();
    document.querySelector("main").innerHTML = "<h2>Home</h2>";
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