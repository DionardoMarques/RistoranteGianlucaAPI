<?php
//DAO que irá gerenciar a tabela (Franquias) no banco de dados.

namespace App\DAO\MySQL\RistoranteGianlucaFranquias;

use App\Models\MySQL\RistoranteGianlucaFranquias\FranquiaModel;

//A classe (FranquiasDAO) herdando de (Conexao) poderá fazer tudo que (Conexao() estiver permitido lá no arquivo (Conexao.php) e liberar para ela. Ou seja, fazer a conexão com o banco de dados e utilizar o PDO.
class FranquiasDAO extends Conexao
{
    //Criação da função construtora, que executará o construtor da classe pai, ou seja, da classe (Conexao). Porque o construtor só é executado quando se instancia uma classe, e como o (Conexao) não pode ser instaciado, o construtor dela nunca será executado.
    //Portanto, o (parent:: __construct) deverá ser chamado em todos os DAO's que forem construídos.
    //Chamando o (parent:: __construct), ele irá executar toda public function ( __construct) que está no arquivo (Conexao.php) e irá configurar o PDO para uso.
    
    public function __construct()
    {
        parent:: __construct();
    }

    //Lista todas as franquias cadastradas.
    //Em cada função estará a estruturação de como será fornecido o retorno da requisição feita pelo usuário. Detalhe para o getAllFranquias que utilizará o método array como retorno, para que todas as franquias existentes no banco de dados venham em formato de lista, assim facilitando a visualização do usuário.
    public function getAllFranquias(): array
    {
        //Utilização do pdo criado e definido em (Conexao.php)
        $franquias = $this->pdo
            //query SQL que irá retornar Franquias
            //Informando todos os atributos que serão selecionados no banco e aparecerão na tela do usuário.
            ->query('SELECT
                    id,
                    nome,
                    telefone,
                    endereco
                FROM franquias;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        //Retornando as franquias.
        return $franquias;
    }

    //Insere a(s) Franquias(s).
    //Já nessa função, o usuário terá um retorno (void), ou seja vazio, pois o FranquiasDAO estará apenas inserindo no banco uma nova franquia de acordo com os dados informados na estrutura abaixo.
    public function insertFranquia(FranquiaModel $franquia): void
    {
        $statement = $this->pdo
        //Inserção dos atributos, (null) é referente ao id que será gerado automaticamente pelo banco, já o (nome, telefone, endereço) serão forncedios ao banco por meio deste DAO na tabela franquias.
            ->prepare('INSERT INTO franquias VALUES(
                null,
                :nome,
                :telefone,
                :endereco
            );');
        //Executando tudo aquilo que foi inserido pelo usuário no banco de dados, mais especificamente na tabela (Franquias).
        $statement->execute([
            'nome' => $franquia->getNome(),
            'telefone' => $franquia->getTelefone(),
            'endereco' => $franquia->getEndereco()
        ]);
    }

    //Atualiza a(s) Franquias(s).
    //Funcionamento parecido com a função (inserFraqnuia).
    public function updateFranquia(FranquiaModel $franquia): void
    {
        $statement = $this->pdo
        //Nesta função mudará apenas um pouco da sintaxe utulizada pelo DAO para se comunicar com o banco de dados. Foi utilizado o termos (UPDATE) e (SET), ao invés de (INSERT) e (VALUES).
            ->prepare('UPDATE franquias SET
                    nome = :nome,
                    telefone = :telefone,
                    endereco = :endereco
                WHERE
                    id = :id
            ;');
        $statement->execute([
            //Executando tudo que foi passado pelo usuário.
            'nome' => $franquia->getNome(),
            'telefone' => $franquia->getTelefone(),
            'endereco' => $franquia->getEndereco(),
            'id' => $franquia->getId()
        ]);
    }

    //Deleta a(s) franquia(s).
    //Função mais simples de todas que fará apena a exclusão no banco dados, a partir do termo (DELETE FROM).
    public function deleteFranquia(int $id): void
    {
        $statement = $this->pdo
            ->prepare('DELETE FROM franquias WHERE id = :id;');
        $statement->execute([
            'id' => $id
        ]);
    }
}