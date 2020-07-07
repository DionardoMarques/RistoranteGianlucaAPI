<?php
/*Rotas que o usuário pode acessar.
Usa a função, que dá acesso ao namespace src e pega a função slimConfiguration.
Que retornará o SlimContainer.
*/

use function src\{
    slimConfiguration,
    jwtAuth
};

use App\Controllers\{
    AuthController,
    FranquiaController,
    ExceptionController
};
use App\Middlewares\JwtDateTimeMiddleware;

$app = new \Slim\App(slimConfiguration());

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);

// ==============================================

//Rota que tratará de exceções específicas que venham a ocorrer com usuário ao tentar utilizar a aplicação.
$app->get('/exception-test', ExceptionController::class . ':test');

//Método de autenticação utilizando JWTAuth. Criação da rota de login que acessa o (AuthController) e acessa o método (:login).
$app->post('/login' , AuthController::class . ':login');
//Rota que cuidará da geração de um novo token e refresh_token caso o usuário esteja com o seu expirado para uso na aplicação.
$app->post('/refresh-token', AuthController::class . ':refreshToken');

//Agrupando todas as rotas com os diferentes métodos para utilizar o mesmo tipo de autenticação: JWT Auth.
$app->group('', function() use ($app) {

    /*São quatro rotas iguais, mas cada uma com um método diferente.
    Essas quatro rotas executarão diferentes médotos na tabela (Franquias) para realizar o CRUD (Get, post, put e delete).*/
    $app->get('/franquia', FranquiaController::class . ':getFranquias');
    $app->post('/franquia', FranquiaController::class . ':insertFranquia');
    $app->put('/franquia', FranquiaController::class . ':updateFranquia');
    $app->delete('/franquia', FranquiaController::class . ':deleteFranquia');

    //Rotas utilizadas para trabalhar com as franquias especificamente pelo ID.
    $app->get('/franquia/{id}', FranquiaController::class . ':buscarPorId');
    $app->put('/franquia/{id}', FranquiaController::class . ':updateFranquia');
    $app->delete('/franquia/{id}', FranquiaController::class . ':deleteFranquia');

//Middlewares de autenticação.
//Middleware 2:
})
// ->add(new JwtDateTimeMiddleware())
//Middleware 1:
// ->add(jwtAuth())
;

//Autenticação Básica
// add(basicAuth())

// ==============================================

$app->run();