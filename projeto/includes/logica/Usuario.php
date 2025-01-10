<?php
class Usuario 
{
    //private static int $lastId = 0
    //protected int $idUsuario;
    protected string $cpf;
    protected string $nome;
    protected string $email;
    protected string $senha;
    protected DateTime $dataNascimento;
    protected string $tipoUsuario;
    protected string $imagem;
    protected DateTime $dataCadastro;
    
   
    //construtor *****estudar******
    /*public function __construct(string $cpf, string $nome, string $email, string $senha, DateTime $dataNascimento, string $tipoUsuario, string $imagem, DateTime $dataCadastro)
    {
        //self::$lastId++;
        //$this->idUsuario = $idUsuario;
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->dataNascimento = $dataNascimento;
        $this->tipoUsuario = $tipoUsuario;
        $this->imagem = $imagem;
        $this->dataCadastro = $dataCadastro;
    }
    */
    //setters
    function setCpf(string $cpf): void {$this->cpf = $cpf;}
    function setNome(string $nome): void {$this->nome = $nome;}
    function setEmail(string $email): void {$this->email = $email;}
    function setSenha(string $senha): void {$this->senha = $senha;}
    function setDataNascimento(DateTime $dataNascimento): void {$this->dataNascimento = $dataNascimento;}
    function setTipoUsuario(string $tipoUsuario) : void {$this->tipoUsuario = $tipoUsuario;}
    function setImagem(string $imagem): void {$this->imagem = $imagem;}
    function setDataCadastro(DateTime $dataCadastro): void {$this->dataCadastro = $dataCadastro;}


    //getters
    public function getCpf(): string {return $this->cpf;}
    public function getNome(): string {return $this->nome;}
    public function getEmail(): string {return $this->email;}
    public function getSenha(): string {return $this->senha;}
    public function getDataNascimento():DateTime {return $this->dataNascimento;}
    public function getTipoUsuario(): string {return $this->tipoUsuario;}
    public function getImagem(): string {return $this->imagem;}
    public function getDataCadastro():DateTime {return $this->dataCadastro;}
   
    //metodos em usuarioDAO ?
    //public function editarUsuario(): void{}
}
?>