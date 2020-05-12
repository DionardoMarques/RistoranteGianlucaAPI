<?php
//DAO que irá gerenciar a tabela (Usuarios) no banco de dados.

namespace App\DAO\MySQL\RistoranteGianlucaFranquias;

use App\Models\MySQL\RistoranteGianlucaFranquias\UsuarioModel;

class UsuariosDAO extends Conexao
{
    public function __construct()
    {
        parent:: __construct();
    }

    //Verificar se o email existe. O email foi definido como um valor único no banco de dados.
    //Portanto, só um email poderá ser cadastrado por usuário. Assim só um usuário será retornado no final da função caso ele exista, ou nenhum usuário se não existir no banco de dados.
    //Ou então apenas um usuário do banco de dados, no caso o primeiro usuário que ele encontrar na posição 0 ($usuarios[0]).

    /*Nessa primeira parte do (UsuariosDAO) ele vai receber o email podendo retornar nulo ou um UsuarioModel dependendo do que ele conseguir capturar do banco. 
    Depois ele faz um (SELECT) através do email que ele conseguir encontrar, passa o email para a query, se não existir um usuário ele retorna nulo (NULL), senão ele constrói um (UsuarioModel) para retornar.*/
    public function getUserByEmail(string $email): ?UsuarioModel
    {
        $statement = $this->pdo
            ->prepare('SELECT
                    id,
                    nome,
                    email,
                    senha
                FROM usuarios
                WHERE email = :email;
            ');
        $statement->bindParam('email', $email);
        $statement->execute();
        $usuarios = $statement->fetchAll(\PDO::FETCH_ASSOC);
        if(count($usuarios) === 0)
            return null;
        $usuario = new UsuarioModel();
        $usuario->setId($usuarios[0]['id'])
            ->setNome($usuarios[0]['nome'])
            ->setEmail($usuarios[0]['email'])
            ->setSenha($usuarios[0]['senha']);
        return $usuario;
    }
}