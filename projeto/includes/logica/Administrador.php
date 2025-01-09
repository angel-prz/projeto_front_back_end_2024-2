<?php 
require_once 'Usuario.php';
    Class Administrador extends Usuario
    {
        public function __construct(string $cpf, string $nome, string $email, string $senha, DateTime $dataNascimento, $imagem, DateTime $dataCadastro)
        {
            parent::__construct($cpf, $nome, $email, $senha, $dataNascimento, $imagem, $dataCadastro);       
        }

        //metodos no DAO?
        //public function cadastrarUsuario(): void{}
        //public function excluirUsuario(): void{}
    }
?>