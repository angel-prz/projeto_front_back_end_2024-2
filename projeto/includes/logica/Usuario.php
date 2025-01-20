<?php
class Usuario 
{
    //private static int $lastId = 0
    //protected int $idUsuario;
    protected  $cpf;
    protected  $nome;
    protected  $email;
    protected  $senha;
    protected DateTime $dataNascimento;
    protected  $tipoUsuario;
    protected  $imagem;
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
    function setCpf($cpf): void {$this->cpf = $cpf;}
    function setNome( $nome): void {$this->nome = $nome;}
    function setEmail( $email): void {$this->email = $email;}
    function setSenha($senha): void {$this->senha = $senha;}
    function setDataNascimento(DateTime $dataNascimento): void {$this->dataNascimento = $dataNascimento;}
    function setTipoUsuario($tipoUsuario) : void {$this->tipoUsuario = $tipoUsuario;}
    function setImagem($imagem): void {$this->imagem = $imagem;}
    function setDataCadastro(DateTime $dataCadastro): void {$this->dataCadastro = $dataCadastro;}


    //getters
    public function getCpf() {return $this->cpf;}
    public function getNome() {return $this->nome;}
    public function getEmail() {return $this->email;}
    public function getSenha() {return $this->senha;}
    public function getDataNascimento():DateTime {return $this->dataNascimento;}
    public function getTipoUsuario(){return $this->tipoUsuario;}
    public function getImagem(){return $this->imagem;}
    public function getDataCadastro():DateTime {return $this->dataCadastro;}
   
    //metodos em usuarioDAO ?
    //public function editarUsuario(): void{}
}
?>