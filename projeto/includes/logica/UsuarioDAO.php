<?php

require_once 'Conecta.php';
//require_once 'Usuario.php';
//classe com DAO genericos
class UsuarioDAO
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
    function inserirUsuario($usuario)
    {
        try {
            $query = $this->conexao->prepare("INSERT INTO usuario (cpf, nome, email, senha, dataNascimento, tipo_usuario, imagem, dataCadastro) VALUES (:cpf, :nome, :email, :senha, :dataNascimento, :tipo_usuario, :imagem, :dataCadastro)");
            $resultado = $query->execute([
                'cpf' => $usuario->getCpf(),
                'nome' => $usuario->getNome(),
                'email' => $usuario->getEmail(),
                'senha' => $usuario->getsenha(),
                'dataNascimento' => $usuario->getDataNascimento()->format('Y-m-d'),
                'tipo_usuario' => $usuario->getTipoUsuario(),
                'imagem' => $usuario->getImagem(),
                'dataCadastro' => $usuario->getDataCadastro()->format('Y-m-d') //converte DateTIme para string
            ]);

            return $resultado;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function alterarPessoa($pessoa)
    {
        try {
            $query = $this->conexao->prepare("update pessoa set nome= :nome, email = :email, cpf= :cpf, senha= :senha where codpessoa = :codpessoa");
            $resultado = $query->execute(['nome' => $pessoa->getnome(), 'email' => $pessoa->getemail(), 'cpf' => $pessoa->getcpf(), 'senha' => $pessoa->getsenha(), 'codpessoa' => $pessoa->getcodpessoa()]);
            return $resultado;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function deletarPessoa($pessoa)
    {
        try {
            $query = $this->conexao->prepare("delete from pessoa where codpessoa = :codpessoa");
            $resultado = $query->execute(['codpessoa' => $pessoa->getcodpessoa()]);
            return $resultado;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function buscarPessoa($pessoa)
    {
        try {
            $query = $this->conexao->prepare("select * from pessoa where codpessoa=:codpessoa");
            if ($query->execute(['codpessoa' => $pessoa->getcodpessoa()])) {
                $pessoa = $query->fetch(); //coloca os dados num array $usuario
                return $pessoa;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function acessarUsuario($usuario)
    {
        try {
            $query = $this->conexao->prepare("SELECT * FROM usuario where email=:email and senha=:senha");
            if ($query->execute(['email' => $usuario->getEmail(), 'senha' => $usuario->getSenha()])) {
                $usuario = $query->fetch(); //coloca os dados num array $usuario
                if ($usuario) {
                    return $usuario;
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

    function pesquisarPessoa($pessoa)
    {
        try {
            $query = $this->conexao->prepare("select * from usuario where upper(nome) like :nome");
            if ($query->execute(['nome' => $pessoa->getnome()])) {
                $pessoas = $query->fetchAll(); //coloca os dados num array $pessoa
                if ($pessoas) {
                    return $pessoas;
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
