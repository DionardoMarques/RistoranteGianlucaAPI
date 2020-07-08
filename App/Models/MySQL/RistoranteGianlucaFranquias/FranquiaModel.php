<?php
//O Model será basicamente o modelo do banco de dados, uma representação do BD dentro do código.

namespace App\Models\MySQL\RistoranteGianlucaFranquias;

//Nesta classe (FranquiaModel) estarão representados os atributos da tabela (Franquias) do banco de dados.
final class FranquiaModel
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $nome;
    /**
     * @var string
     */
    public $telefone;
    /**
     * @var string
     */
    public $endereco;
    
    // ==============================================================================================================================================
    public function __construct($id, $nome, $telefone, $endereco)
    {
        $this->id=$id;
        $this->nome=$nome;
        $this->telefone=$telefone;
        $this->endereco=$endereco;
    }
    //Getters and Setters: Funções que poderão capturar (Getter) o valor dos atributos, ou para definir um novo valor para eles (Setters).
    //Getter ID
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    //Setter ID
    /**
     * @param int $id
     * @return FranquiaModel
     */
    public function setId(int $id): FranquiaModel
    {
        $this->id = $id;
        return $this;
    }
    // ==============================================================================================================================================
    //Getter nome
    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }
    //Setter nome
    /**
     * @param string $nome
     * @return FranquiaModel
     */
    public function setNome(string $nome): FranquiaModel
    {
        $this->nome = $nome;
        return $this;
    }
    // ==============================================================================================================================================
    //Getter telefone
    /**
     * @return string
     */
    public function getTelefone(): string
    {
        return $this->telefone;
    }
    //Setter telefone
    /**
     * @param string $telefone
     * @return FranquiaModel
     */
    public function setTelefone(string $telefone): FranquiaModel
    {
        $this->telefone = $telefone;
        return $this;
    }
    // ==============================================================================================================================================
    //Getter endereco
    /**
     * @return string
     */
    public function getEndereco(): string
    {
        return $this->endereco;
    }
    //Setter endereco
    /**
     * @param string $endereco
     * @return FranquiaModel
     */
    public function setEndereco(string $endereco): FranquiaModel
    {
        $this->endereco = $endereco;
        return $this;
    }
}