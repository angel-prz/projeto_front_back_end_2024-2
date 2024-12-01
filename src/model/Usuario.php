<?php
abstract class Usuario 
{
    //private static int $lastId = 0

    protected int $idUsuario;
    protected string $nome;
    protected string $email;
    protected DateTime $dataNascimento;
    protected string $telefone;
    protected DateTime $dataCadastro;
    protected string $senha;


    function __construct($idUsuario,$nome, $email, $dataNascimento, $telefone, $dataCadastro, $senha)
    {
        //self::$lastId++;
        $this->idUsuario = $idUsuario;
        $this->nome = $nome;
        $this->email = $email;
        $this->dataNascimento = $dataNascimento;
        $this->telefone = $telefone;
        $this->dataCadastro = $dataCadastro;
        $this->senha = $senha;
    }

    function setNome($nome) 
    {
        $this-nome = $nome;
    }
    


    public function cadastrarUsuario(): void 
    {

    } 
}
?>