<?php
//BasicAuth
//Método de autenticação básica utilzando login e senha.

namespace src;

//Importando o arquivo HttpBasicAuthentication utilizando a biblioteca externa do Tuupola fornecida via GitHub do mesmo.
use Tuupola\Middleware\HttpBasicAuthentication;

//Criação da função que chamará o basicAuth.
function basicAuth(): HttpBasicAuthentication
{
    return new HttpBasicAuthentication([
        //Usuário(s) e senha(s) que serão utilizadas para realizar a autenticação e poder acessar corretamente as rotas. 
        //Caso o usuário ou senha seja inserido incorretamente ou não exista, o erro (401 Unauthorized) será retornado ao usuário.
        "users" => [
            "dionardo" => "apirestful"
        ]
    ]);
}