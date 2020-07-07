class HomeVisual {

    constructor(controller, seletor){
        this.homeController = controller;
        this.seletor = seletor;
    }

    montarHome(){
        var str = `
        <!------------------------- BANNER ------------------------->
        <div id="novo" href="" class="banner container">
            <div class="title">
                <h2> O MELHOR DA CULINÁRIA ITALIANA! </h2>
                <h3> Desfrute o verdadeiro sabor da Itália, feito por italianos legítimos. </h3>
            </div>
            <div class="buttons">
                <a href="contato.html"><button class="btn btn-encontre bg-green radius"> Nos Encontre <i class="fa fa-arrow-circle-right"></i></button></a>
                <a href="cardapio.html"><button class="btn btn-sobre bg-red radius"> Cardápio <i class="fa fa-question-circle"></i></button></a>
            </div>
        </div>
        <!------------------------- SERVIÇOS ------------------------->
        <main class="servicos container">
            <article class="servico radius">
                <a href="cardapio.html"><img src="../img/servicos.jpg" alt="Pratos da casa"></a>
                <div class="inner">
                    <a href="cardapio.html">Pratos da Casa</a>
                    <h4>Massas, lasanhas e risotos.</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae nulla tenetur ducimus harum dignissimos totam perferendis id officiis inventore distinctio animi magni, obcaecati est minus quis in unde officia dolorem.</p>
                </div>
            </article>
            <article class="servico radius">
                <a href="cardapio.html"><img src="../img/tele_entrega.jpg" alt="Tele entrega de comida"></a>
                <div class="inner">
                    <a href="cardapio.html">Tele-entrega</a>
                    <h4>Os melhores pratos italianos no conforto da sua casa.</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae nulla tenetur ducimus harum dignissimos totam perferendis id officiis inventore distinctio animi magni, obcaecati est minus quis in unde officia dolorem.</p>
                </div>
            </article>
            <article class="servico radius">
                <a href="contato.html"><img src="../img/eventos.jpg" alt="Eventos comemorativos com buffet"></a>
                <div class="inner">
                    <a href="contato.html">Eventos</a>
                    <h4>Comemore conosco as suas datas especiais.</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae nulla tenetur ducimus harum dignissimos totam perferendis id officiis inventore distinctio animi magni, obcaecati est minus quis in unde officia dolorem.</p>
                </div>
            </article>
        </main>
        <!------------------------- HORÁRIO DE FUNCIONAMENTO ------------------------->
        <section class="horario container bg-green">
            <h2> Horário de funcionamento <br> <i class="far fa-clock"></i></h2>
            <h3> 
                <em>Segunda a sexta:</em> das 11h às 15h e das 18h30 às 22h45<br>
                <em>Sábados, domingos e feriados:</em> das 11h às 15h30 e das 18h30 às 22h45
            </h3>
            <h3>
                Mais informações em: (51) 3259-1229 <i class="fab fa-whatsapp"></i><br>
                *Telefone válido apenas para a cidade de Porto Alegre
            </h3>
        </section>
        `;

        var home = document.querySelector(this.seletor);
        home.innerHTML = str;

        const self = this;
        const linkNovo = document.querySelector("#novo");
        linkNovo.onclick = function(event) {
            self.franquiaController.carregarHome(event);
        }
    }
}