<?php
//JWTAuth
//Método de autenticação das rotas por meio de tokens criptogrados.

namespace src;

use Tuupola\Middleware\JwtAuthentication;

//Middleware 1: verificar se a chave de assinatura do JWT está correta.
//Funcionamento do Middleware 1: Se a chave secreta estiver correta dentro do token que o usuário enviou, o acesso a rota será feito com sucesso.
//A chave secreta ('JWT_SECRET_KEY') foi definida no arquivo (env.php).
function jwtAuth(): JwtAuthentication
{
    return new JwtAuthentication([
        'secret' => getenv('JWT_SECRET_KEY'),
        'attribute' => 'jwt'
    ]);
}