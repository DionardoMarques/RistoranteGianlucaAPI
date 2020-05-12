<?php
//O controller pegará os dados enviados pelo usuário e vai dizer o que deve ser executado. Então. a primeira coisa a ser acessada pela rota será o Controller.

//Toda vez que der um use no namespace app, ele vai usar qualquer coisa que esteja dentro do diretório App, então irá executar o require em todos os arquivos para mim.
namespace  App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\MySQL\RistoranteGianlucaFranquias\UsuariosDAO;
use Firebase\JWT\JWT;
use App\DAO\MySQL\RistoranteGianlucaFranquias\TokensDAO;
use App\Models\MySQL\RistoranteGianlucaFranquias\TokenModel;

//Criação do método login para a autenticação JWT.
final class AuthController
{
    //Nessa primeira parte do (AuthController) até agora ele está pegando o email que foi enviado, passando para o (UsuariosDAO) que vai verificar no banco de dados a existência do email e exibirá na tela o usuário que ele conseguiu capturar.
    //No login temos o email que passa para o ($UsuariosDAO) que pega o ($usuario) e depois ele verificará as condições (if(is_null($usuarios))) para ver se o usuário existe no banco, ou seja, não está vazio, e verificará a senha também (if(!passowrd_verify)).
    public function login(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();
        ////Valores que serão enviados na requisição via Postman.
        $email = $data['email'];
        $senha = $data['senha'];
        //Data de expiração personalizada do token, também pode ser gerada uma data padrão para expiração.
        $expireDate = $data['expire_date'];

        $usuariosDAO = new UsuariosDAO();
        $usuario = $usuariosDAO->getUserByEmail($email);

        //Se o usuário for nulo ele retorna com o status (401).
        if(is_null($usuario))
            return $response->withStatus(401);

        //Se a senha enviada for diferente a que está cadastrada no banco de dados, também será retornado o status (401).
        if(!password_verify($senha, $usuario->getSenha()))
            return $response->withStatus(401);

        // Data de expiração do token gerada por padrão para até dois dias a partir da data que o token foi gerado.
        // $expiredAt = (new \DateTime())->modify('+2 days')
        //     ->format('Y-m-d H:i:s');

        //Gerando o token para o usuário que terá um ID, nome e email.
        //Também foi configurado uma data de expiração de uso para o token de cada usuário.
        //Por padrão o token pode ter uma data de expiração personalizada ($expiredAt), por exemplo, de 2 dias a partir do dia da criação do token.
        $tokenPayload = [
            //O ('sub') é um padrão do JWT para identificar algo ao invés de colocar ('id'), questão de boa prática.
            'sub' => $usuario->getId(),
            'name' => $usuario->getNome(),
            'email' => $usuario->getEmail(),
            'expired_at' => $expireDate
        ];

        //Codificando o token.
        //Token gerado com determinado conteudo ($tokenPayload) e com uma chave secreta (getenv('JWT_SECRET_KEY')).
        $token = JWT::encode($tokenPayload, getenv('JWT_SECRET_KEY'));
        $refreshTokenPayload = [
            'email' => $usuario->getEmail(),
            //O 'ramdom' gerará um token único, ou seja, ele sempre será bem diferente dos gerados anteriormente, caso essa propriedade não fosse usada, os tokens seriam muito similares quando criados sequencialmente e deixariam o sistema da aplicação mais vulnerável para possíveis brechas de segurança.
            'ramdom' => uniqid()
        ];

        //O ($refreshToken) servirá para caso o usuário esteja com o seu token expirado para uso.
        $refreshToken = JWT::encode($refreshTokenPayload, getenv('JWT_SECRET_KEY'));

        //Configurando todos os valores pro token, menos o id que na hora da inserção é gerado automaticamente.
        $tokenModel = new TokenModel();
        $tokenModel->setExpired_at($expireDate)
            ->setRefresh_token($refreshToken)
            ->setToken($token)
            ->setUsuarios_id($usuario->getId());

        //Criar (tokensDAO) e chamar o método (createToken) para criar o token.
        $tokensDAO = new TokensDAO();
        $tokensDAO->createToken($tokenModel);

        //Retornar o token e refresh_token para o usuário.
        $response = $response->withJson([
            "token" => $token,
            "refresh_token" => $refreshToken
        ]);

        return $response;
    }

    //Verificação se o (refreshToken) é válido, se não for retornará o status (401), não autorizado.
    public function refreshToken(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();
        //Valores que serão enviados na requisição via Postman.
        $refreshToken = $data['refresh_token'];
        $expireDate = $data['expire_date'];
        //Aqui haverá uma decodificação do token a partir da criftografia (['HS256']) utilizada em cima dele pelo JWTAuth, portanto após decodificá-lo a aplicação poderá gerar um novo token e refresh_token para usuário.
        $refreshTokenDecoded = JWT::decode(
            $refreshToken,
            getenv('JTW_SECRET_KEY'),
            ['HS256']
        );

        $tokensDAO = new TokensDAO();
        $refreshTokenExists = $tokensDAO->verifyRefreshToken($refreshToken);
        if(!$refreshTokenExists)
            return $response->withStatus(401);
        $usuariosDAO = new UsuariosDAO();
        $usuario = $usuariosDAO->getUserByEmail($refreshTokenDecoded->email);
        if(is_null($usuario))
            return $response->withStatus(401);
        ////Gerando um novo token, a partir do refresh_token que teoricamente estará com a sua data de validade expirada para uso, portanto o token será criado para o usuário e terá um ID, nome, email e uma nova data de expiração de uso.
        $tokenPayload = [
            //O ('sub') é um padrão do JWT para identificar algo ao invés de colocar ('id'), questão de boa prática.
            'sub' => $usuario->getId(),
            'name' => $usuario->getNome(),
            'email' => $usuario->getEmail(),
            'expired_at' => $expireDate
        ];

        //Codificando o token.
        //Token gerado com determinado conteudo ($tokenPayload) e com uma chave secreta (getenv('JWT_SECRET_KEY')).
        $token = JWT::encode($tokenPayload, getenv('JWT_SECRET_KEY'));
        $refreshTokenPayload = [
            'email' => $usuario->getEmail(),
            'ramdom' => uniqid()
        ];

        //O ($refreshToken) servirá para caso o usuário esteja com o seu token expirado para uso.
        $refreshToken = JWT::encode($refreshTokenPayload, getenv('JWT_SECRET_KEY'));

        //Configurando todos os valores pro token, menos o id que na hora da inserção é gerado automaticamente.
        $tokenModel = new TokenModel();
        $tokenModel->setExpired_at($expireDate)
            ->setRefresh_token($refreshToken)
            ->setToken($token)
            //O id não precisará ser configurado, pois ele puxará a partir do id do usuário já cadastrado no banco.
            ->setUsuarios_id($usuario->getId());

        //Criar (tokensDAO) e chamar o método (createToken) para criar o token.
        $tokensDAO = new TokensDAO();
        $tokensDAO->createToken($tokenModel);

        //Retornar o token e refresh_token para o usuário.
        $response = $response->withJson([
            "token" => $token,
            "refresh_token" => $refreshToken
        ]);

        return $response;
    }
}