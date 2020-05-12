<?php
//O Model será basicamente o modelo do banco de dados, uma representação do BD dentro do código.

namespace App\Models\MySQL\RistoranteGianlucaFranquias;

//Nesta classe (TokenModel) estarão representados os atributos da tabela (Tokens) do banco de dados.
final class TokenModel
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $token;
    /**
     * @var string
     */
    private $refres_token;
    /**
     * @var string
     */
    private $expired_at;
    /**
     * @var int
     */
    private $usuarios_id;

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
    //Getter token
    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    //Setter token
    /**
     * @param string $token
     * @return self
     */
    public function setToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }
    // ==============================================================================================================================================
    //Getter refresh_toke
    /**
     * @return string
     */
    public function getRefresh_token(): string
    {
        return $this->refresh_token;
    }

    //Setter refresh_token
    /**
     * @param string $refresh_token
     * @return self
     */
    public function setRefresh_token(string $refresh_token): self
    {
        $this->refresh_token = $refresh_token;
        return $this;
    }
    // ==============================================================================================================================================
    //Getter expired_at
    /**
     * @return string
     */
    public function getExpired_at(): string
    {
        return $this->expired_at;
    }

    //Setter expired_at
    /**
     * @param string $expired_at
     * @return self
     */
    public function setExpired_at(string $expired_at): self
    {
        $this->expired_at = $expired_at;
        return $this;
    }
    // ==============================================================================================================================================
    //Getter usuarios_id
    /**
     * @return int
     */
    public function getUsuarios_id(): int
    {
        return $this->usuarios_id;
    }

    //Setter usuarios id
    /**
     * @param int $usuarios_id
     * @return self
     */
    public function setUsuarios_id(int $usuarios_id): self
    {
        $this->usuarios_id = $usuarios_id;
        return $this;
    }
}
