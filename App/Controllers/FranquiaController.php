<?php
//O controller pegará os dados enviados pelo usuário e vai dizer o que deve ser executado. Então. a primeira coisa a ser acessada pela rota será o Controller.

//Toda vez que der um use no namespace app, ele vai usar qualquer coisa que esteja dentro do diretório App, então irá executar o require em todos os arquivos para mim.
namespace  App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\MySQL\RistoranteGianlucaFranquias\FranquiasDAO;
use App\Models\MySQL\RistoranteGianlucaFranquias\FranquiaModel;

//A classe final foi utilizada, pois ninguém herdará o FranquiaController.
final class FranquiaController
{
    //O método (getFranquias), os três parâmetros que eu passo por Slim, agora dentro de um método que está dentro de uma classe e ele irá me retornar o (Response)
    //Listagem de informações da(s) franquias(s).
    public function getFranquias(Request $request, Response $response, array $args): Response
    {
        //Criação do objeto de DAO.
        $franquiasDAO = new FranquiasDAO();
        //Recebe a função getAllFranquias que é convertido para a estrutura de dados Json no (response), retornando todas as franquias existentes e cadastradas no banco de dados. 
        $franquias = $franquiasDAO->getAllFranquias();
        $response = $response->withJson($franquias);

        return $response;
    }

    //Inserção dos dados da franquia.
    public function insertFranquia(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();
        //Criação do objeto de DAO, comunicação com o banco (FranquiasDAO) e (FranquiaModel) que trará a estrutura de dados dos atributos da tabela (Franquais) para dentro do VSCode sem maiores problemas.
        $franquiasDAO = new FranquiasDAO();
        $franquia = new FranquiaModel();
        //Aqui serão as informações que deverão ser passadas na requisição via Postman para cadastrarmos uma nova franquia na API.
        $franquia->setNome($data['nome'])
            ->setEndereco($data['endereco'])
            ->setTelefone($data['telefone']);
        $franquiasDAO->insertFranquia($franquia);
        //Retorno de uma mensagem de inserção concluída no formado de dados Json.
        $response = $response->withJson([
            'message' => 'Franquia cadastrada com sucesso!'
        ]);

        return $response;
    }

    //Alteração dos dados da franquia.
    //Funcionamento muito similar ao (insertFranquia), só que nesta função iremos passar além do nome, endereço e telefone da franquia, também o id, para que o usuário diga a API qual franquia ele quer que seja alterada.
    public function updateFranquia(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $franquiasDAO = new FranquiasDAO();
        $franquia = new FranquiaModel();
        $franquia->setId((int)$data['id'])
            ->setNome($data['nome'])
            ->setEndereco($data['endereco'])
            ->setTelefone($data['telefone']);
        $franquiasDAO->updateFranquia($franquia);

        $response = $response->withJson([
            'message' => 'Franquia atualizada com sucesso!'
        ]);

        return $response;
    }

    //Deletar franquia.
    //Na função deleteFranquia, o funcionamento e utilização será bem mais simples quando comparado as outras requisições, pois o usuário só precisará informar o ID da loja que ere quer excluir. Por meio do método getFranquias ele saberá o ID de todas as lojas existentes no banco de dados que podem ser excluídas a qualquer momento.
    public function deleteFranquia(Request $request, Response $response, array $args): Response
    {
        $queryParams = $request->getParsedBody();

        $franquiasDAO = new FranquiasDAO();
        $id = $args['id'];
        $franquiasDAO->deleteFranquia($id);

        $response = $response->withJson([
            'message' => 'Franquia excluída com sucesso!'
        ]);

        return $response;
    }

    //Busca das franquais pelo ID de cada uma.
    public function buscarPorId(Request $request, Response $response, array $args): Response
    {
        $id = $args['id'];
        
        $dao = new FranquiasDAO;
        $franquia = $dao->buscarPorId($id);

        return $response->withJson($franquia);
    }
}