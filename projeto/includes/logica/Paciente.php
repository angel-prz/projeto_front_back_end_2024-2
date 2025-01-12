<?php 
require_once 'Usuario.php';
    Class Paciente extends Usuario
    {
        private $historico = [];
        public function __construct(string $cpf, string $nome, string $email, string $senha, 
        DateTime $dataNascimento, $imagem, DateTime $dataCadastro, array $historico)
        {
            parent::__construct($cpf, $nome, $email, $senha, $dataNascimento, $imagem, $dataCadastro);  
            $this->historico = $historico;     
        }

        //metodos no DAO?
        //public function cadastrarUsuario(): void{}
        //public function excluirUsuario(): void{}

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
        public function getNome(): string {return $this->nome;}
        public function getEmail(): string {return $this->email;}
        public function getSenha(): string {return $this->senha;}
        public function getDataNascimento(): DateTime {return $this->dataNascimento;}
        public function getTipoUsuario(): string {return $this->tipoUsuario;}
        public function getImagem(): string {return $this->imagem;}
        public function getDataCadastro(): DateTime {return $this->dataCadastro;}
        public function getHistorico() {return $this->historico;}

        //metodos
        //add obj consulta ao vetor historico
        public function marcarConsulta(Consulta $consulta) {$this->historico[] = $consulta;}
    }
?>