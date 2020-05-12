<?php
//O Model será basicamente o modelo do banco de dados, uma representação do BD dentro do código.

namespace App\Models\MySQL\RistoranteGianlucaFranquias;

//Nesta classe (UsuarioModel) estarão representados os atributos da tabela (Usuarios) do banco de dados.
final class UsuarioModel
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $nome;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $senha;

    // ==============================================================================================================================================
    //Getters and Setters: Funções que poderão retirar (Getter) o valor dos atributos, ou para definir um novo valor para eles (Setters).
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
     * @return self
     */
    public function setId(int $id): self
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
     * @return self
     */
    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }
    // ==============================================================================================================================================
    //Getter email
    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    //Setter email
    /**
     * @param string $email
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }
    // ==============================================================================================================================================
    //Getter senha
    /**
     * @return string
     */
    public function getSenha(): string
    {
        return $this->senha;
    }

    //Setter senha
    /**
     * @param string $senha
     * @return self
     */
    public function setSenha(string $senha): self
    {
        $this->senha = $senha;
        return $this;
    }
}