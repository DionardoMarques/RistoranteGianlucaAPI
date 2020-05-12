<?php
//Criação de uma classe de conexão que reaproveitará o código

namespace App\DAO\MySQL\RistoranteGianlucaFranquias;

//PDO: É uma biblioteca de PHP para trabalhar com banco de dados voltado para a orientação a objetos.
abstract class Conexao
{
    //O (protected) permite as classes que herdarem de conexão também usem o PDO.
    //Criação do $pdo via protected
    protected $pdo;

    public function __construct()
    {
        //Conexão com o banco de dados estabelecida a partir das variáveis $host, $port, $user, $pass e $dbname.
        $host = getenv('RISTORANTEGIANLUCA_FRANQUIAS_MYSQL_HOST');
        $port = getenv('RISTORANTEGIANLUCA_FRANQUIAS_MYSQL_PORT');
        $user = getenv('RISTORANTEGIANLUCA_FRANQUIAS_MYSQL_USER');
        $pass = getenv('RISTORANTEGIANLUCA_FRANQUIAS_MYSQL_PASSWORD');
        $dbname = getenv('RISTORANTEGIANLUCA_FRANQUIAS_MYSQL_DBNAME');

        //($dsn) é a string que faz conexão com o banco de dados.
        $dsn = "mysql:host={$host};dbname={$dbname};port={$port}";
        
        $this->pdo = new \PDO($dsn, $user, $pass);
        //Configuração das exceções do PDO em casos de erro.
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }
}