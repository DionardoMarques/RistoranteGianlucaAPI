<?php
//Configurações do Slim.

namespace src;

//Criação da função que irá retornar o container, ou seja, essa função irá exibir os erros detalhamente caso o código esteja como (500), ou seja, erro interno de aplicação, resumindo algum problema no código.
//Assim o desenvolvedor da aplicação poderá descobrir com mais facilidade onde está o erro que possivelmente está ocorrendo, para assim poder corrigí-lo e tornar a aplicação funcional novamente.
function slimConfiguration(): \Slim\Container
{
    $configuration = [
        'settings' => [
            'displayErrorDetails' => getenv('DISPLAY_ERROS_DETAILS'),
        ],
    ];
    return new \Slim\Container($configuration);
}
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];