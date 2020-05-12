<?php
//Criação de exceções específicas da aplicação.

namespace App\Exceptions;
//Criação da classe (TestException) que será uma execeção específica da nossa API que não tenha sido prevista anteriormente.
//O (TestException) foi utilizado no arquivo (ExceptionController.php) para demonstrar uma possível execeção persoanlizada da aplicação.
class TestException extends \Exception
{
    public function __construct($message, $code = 0, Exception $previous = null) 
    {
        //Garante que tudo está corretamente inicializado.
        parent::__construct($message, $code, $previous);
    }
    public function __toString(): string
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}