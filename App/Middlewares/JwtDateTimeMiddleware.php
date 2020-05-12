<?php
//JwtDateTimeMiddleware será uma das verificações pela data de expiração do token.

namespace App\Middlewares;

use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

//Middleware 2: caso o token passe pelo Middleware 1, o Middleware 2 pegará o conteúdo do token e exibirá na tela para o usuário.
//Funcionamento do Middleware 2: Verificação da data de expiração do token, se estiver dentro do prazo o acesso a rota será permitido, caso a data estiver expirada, o código (401) não autorizado será exibido para o usuário.
final class JwtDateTimeMiddleware
{
    public function __invoke(Request $request, Response $response, callable $next): Response
    {
        $token = $request->getAttribute('jwt');
        $expireDate = new \DateTime($token['expired_at']);
        $now = new \DateTime('now', new \DateTimeZone('America/Sao_Paulo'));
        if($expireDate < $now)
            return $response->withStatus(401);
        $response = $next($request, $response);
        return $response;
    }
}