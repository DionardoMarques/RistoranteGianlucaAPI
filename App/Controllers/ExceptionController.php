<?php
//Tratamento de exceções da API.
//Caso ocorram erros de comunicação com o banco de dados ou com as demais operações da API, o usuário cairá na rota de exceção que terá uma mensagem personalizada para que ele não se espante com o erro padrão do Slim Framework.

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Exceptions\TestException;

//Criação da classe ExceptionController que possuirá diversos (catchs) para tratarmos os possíveis erro que venham a acontecer pela parte de uso do usuário da API.
final class ExceptionController
{
    public function test(Request $request, Response $response, array $args): Response
    {
        //Exceção teste, apenas para um possível tratamento de um erro.
        try {
            throw new TestException("Testando...");
            return $response->withJson(['msg' => 'ok']);
        } catch(TestException $ex) {
            return $response->withJson([
                'erro' => TestException::class,
                'status' => 400,
                'code' => '003',
                'userMessage' => "Testando apenas...",
                'developerMessage' => $ex->getMessage()
            ], 400);
        //Exceção que irá tratar erros de digitação, como senha digitada errada, e-mail e entre outras coisas que são plausíveis de erro por parte do usuário.
        } catch(\InvalidArgumentException $ex) {
            return $response->withJson([
                'erro' => \InvalidArgumentException::class,
                'status' => 400,
                'code' => '002',
                'userMessage' => "É necessário enviar todos os dados para o login.",
                'developerMessage' => $ex->getMessage()
            ], 400);
        //Exceção que irá tratar erros internos na aplicação, portanto nesse (catch) o problema não estará por parte de algum erro do usuário, e sim um problema interno na aplicação que deverá ser resolvida pelos desenvolvedores.
        } catch(\Exception | \Throwable $ex) {
            return $response->withJson([
                'erro' => \Exception::class,
                'status' => 500,
                'code' => '001',
                'userMessage' => "Erro na aplicação, entre em contato com o administrador do sistema.",
                'developerMessage' => $ex->getMessage()
            ], 500);
        }
    }
}