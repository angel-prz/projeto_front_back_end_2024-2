<?php

require_once 'Conecta.php';
require_once 'UsuarioDAO.php';

class PacienteDAO extends UsuarioDAO
{
    private $conexao;

    public function __construct()
    {
        //criar instancia da classe conecta
        $db = new Conecta();
        //obter a conexão PDO a partir da classe Conecta
        $this->conexao = $db->getConexao();
        //echo 'FML: ' . $this->conexao->getAttribute(PDO::ATTR_CONNECTION_STATUS) . PHP_EOL;
    }

    /*  =======================
        * Usuario Base
        * ======================= */
    function inserirPaciente($paciente)
    {
        try {
            $query = $this->conexao->prepare("INSERT INTO usuario (cpf, nome, email, senha, dataNascimento, tipo_usuario, imagem, dataCadastro) VALUES (:cpf, :nome, :email, :senha, :dataNascimento, :tipo_usuario, :imagem, :dataCadastro)");
            $resultado = $query->execute([
                'cpf' => $paciente->getCpf(),
                'nome' => $paciente->getNome(),
                'email' => $paciente->getEmail(),
                'senha' => $paciente->getsenha(),
                'dataNascimento' => $paciente->getDataNascimento()->format('Y-m-d'),
                'tipo_usuario' => $paciente->getTipoUsuario(),
                'imagem' => $paciente->getImagem(),
                'dataCadastro' => $paciente->getDataCadastro()->format('Y-m-d') //converte DateTIme para string
            ]);

            return $resultado;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    /*  =======================
    * Paciente
    * =======================*/
    function listarPaciente()
    {
        try {
            //listar por ordem de criação do usuário 
            $query = $this->conexao->prepare("SELECT * FROM usuario WHERE tipo_usuario = 'paciente' ORDER BY dataCadastro DESC");
            $query->execute();
            $pacientes = $query->fetchAll();
            return $pacientes;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function alterarpaciente($paciente)
    {
        try {
            $query = $this->conexao->prepare("update paciente set nome= :nome, email = :email, cpf= :cpf, senha= :senha where codpaciente = :codpaciente");
            $resultado = $query->execute(['nome' => $paciente->getnome(), 'email' => $paciente->getemail(), 'cpf' => $paciente->getcpf(), 'senha' => $paciente->getsenha(), 'codpaciente' => $paciente->getcodpaciente()]);
            return $resultado;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function deletarpaciente($paciente)
    {
        try {
            $query = $this->conexao->prepare("delete from paciente where codpaciente = :codpaciente");
            $resultado = $query->execute(['codpaciente' => $paciente->getcodpaciente()]);
            return $resultado;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function acessarUsuario($paciente)
    {
        try {
            $query = $this->conexao->prepare("SELECT * FROM usuario where email=:email and senha=:senha");
            if ($query->execute(['email' => $paciente->getEmail(), 'senha' => $paciente->getSenha()])) {
                $paciente = $query->fetch(); //coloca os dados num array $paciente
                if ($paciente) {
                    return $paciente;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

   
    function pesquisarPaciente($paciente)
    {
        try {
            $query = $this->conexao->prepare("SELECT * FROM usuario WHERE UPPER(nome) like :nome AND tipo_usuario = 'paciente'");
            if ($query->execute(['nome' => $paciente->getnome()])) {
                $pacientes = $query->fetchAll(); //coloca os dados num array $paciente
                if ($pacientes) {
                    return $pacientes;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
