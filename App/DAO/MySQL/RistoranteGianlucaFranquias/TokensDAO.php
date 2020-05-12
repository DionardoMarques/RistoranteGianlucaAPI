<?php
//DAO que irá gerenciar a tabela (Tokens) no banco de dados.

namespace App\DAO\MySQL\RistoranteGianlucaFranquias;

use App\Models\MySQL\RistoranteGianlucaFranquias\TokenModel;

class TokensDAO extends Conexao
{
    public function __construct()
    {
        parent:: __construct();
    }

    //Inserção na tabela de tokens.
    //O (tokensDAO) terá um método (createToken), onde é passado um objeto de TokenModel ($token), a inserção é feita no banco de dados e o token é gerado no banco para que o mesmo token possa ser usado em outras aplicações.
    //Criação do token, inserção dele no banco de dados e o retorno é vazio.
    public function createToken(TokenModel $token): void
    {
        $statement = $this->pdo
            //Estrutura do token.
            ->prepare('INSERT INTO tokens
                (
                    token,
                    refresh_token,
                    expired_at,
                    usuarios_id
                )
                VALUES
                (
                    :token,
                    :refresh_token,
                    :expired_at,
                    :usuarios_id
                );
            ');
        //Execução no banco de dados.
        $statement->execute([
            'token' => $token->getToken(),
            'refresh_token' => $token->getRefresh_token(),
            'expired_at' => $token->getExpired_at(),
            'usuarios_id' => $token->getUsuarios_id()
        ]);
    }

    //O token poderá ser retornado ou um valor nulo caso ele não exista no banco de dados. Se ele encontrar alguma coisa no banco de dados ele retorna true, senão retornará false por meio do método (bool).
    public function verifyRefreshToken(string $refreshToken): bool
    {
        $statement = $this->pdo
            //Estrutura que será utilizada para inserir no banco de dados.
            ->prepare('SELECT
                    id
                FROM tokens
                WHERE refresh_token = :refresh_token;
            ');
        //Criando o ($statement) que executará essa função.
        $statement->bindParam('refresh_token', $refreshToken);
        $statement->execute();
        $tokens = $statement->fetchAll(\PDO::FETCH_ASSOC);
        //Realizando uma contagem dos $tokens que se for igual a 0, irá retornar (false), senão irá retornar true.
        return count($tokens) === 0 ? false : true;
    }
}