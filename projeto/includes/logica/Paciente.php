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
        //getters
        public function getHistorico() {return $this->historico;}

        //metodos
        //add obj consulta ao vetor historico
        public function marcarConsulta(Consulta $consulta) {$this->historico[] = $consulta;}
    }
?>