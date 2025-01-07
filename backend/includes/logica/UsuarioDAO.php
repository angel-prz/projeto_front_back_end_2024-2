<?php

    require_once 'Conecta.php';

   Class UsuarioDAO{
    private $conexao;

    public function __construct() 
    {
        //criar instancia da classe conecta
        $db = new Conecta();
        //obter a conexão PDO a partir da classe Conecta
        $this->conexao = $db->getConexao();
    }
/*  =======================
 * Usuario Base
 * ======================= */
    function inserirUsuario($usuario){
        try {
            $query = $this->conexao->prepare("INSERT INTO usuario (cpf, nome, email, senha, dataNascimento, tipo_usuario, imagem) VALUES (:cpf, :nome, :email, :senha, :dataNascimento, :tipo_usuario, :imagem)");
            $resultado = $query->execute(['cpf' => $usuario->getCpf(), 'nome' => $usuario->getNome(), 'email' => $usuario->getEmail(), 'senha' => $usuario->getsenha(), 
            'dataNascimento' => $usuario->getDataNascimento, 'tipo_usuario' => $usuario->getTipoUsuario, 'imagem' => $pessoa->getimagem()]);

            return $resultado;
            
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }
/*  =======================
 * Paciente
 * ======================= */
    

    function listarPaciente(){
        try {
          $query = $this->conexao->prepare("SELECT * FROM usuario WHERE tipo_usuario = 'paciente'");      
          $query->execute();
          $pacientes = $query->fetchAll();
          return $pacientes;
        }catch(PDOException $e) {
              echo 'Error: ' . $e->getMessage();
        }  
  


    function alterarPessoa($pessoa){
        try {
            $query = $this->conexao->prepare("update pessoa set nome= :nome, email = :email, cpf= :cpf, senha= :senha where codpessoa = :codpessoa");
            $resultado = $query->execute(['nome' => $pessoa->getnome(),'email' => $pessoa->getemail(),'cpf' => $pessoa->getcpf(),'senha' => $pessoa->getsenha(),'codpessoa' => $pessoa->getcodpessoa()]);   
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function deletarPessoa($pessoa){
        try {
            $query = $this->conexao->prepare("delete from pessoa where codpessoa = :codpessoa");
            $resultado = $query->execute(['codpessoa' => $pessoa->getcodpessoa()]);   
             return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }
 
    
    }

     function buscarPessoa($pessoa){
        try {
        $query = $this->conexao->prepare("select * from pessoa where codpessoa=:codpessoa");
        if($query->execute(['codpessoa' => $pessoa->getcodpessoa()])){
            $pessoa = $query->fetch(); //coloca os dados num array $usuario
            return $pessoa;
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }

    function acessarUsuario($usuario){
        try {
        $query = $this->conexao->prepare("SELECT * FROM usuario where email=:email and senha=:senha");
        if($query->execute(['email' => $usuario->getEmail(), 'senha' => $usuario->getSenha()])){
            $usuario = $query->fetch(); //coloca os dados num array $usuario
          if ($usuario)
            {  
                return $usuario;
            }
        else
            {
                return false;
            }
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }

 function pesquisarPessoa($pessoa){
        try {
        $query = $this->conexao->prepare("select * from pessoa where upper(nome) like :nome");
        if($query->execute(['nome' => $pessoa->getnome()])){
            $pessoas = $query->fetchAll(); //coloca os dados num array $pessoa
          if ($pessoas)
            {  
                return $pessoas;
            }
        else
            {
                return false;
            }
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }

}
   ?>