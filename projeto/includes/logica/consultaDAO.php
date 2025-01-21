<?php
require_once 'Conecta.php';

class ConsultadAO 
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

    function marcarConsulta($consulta)
    {
        try
        {
            $query = $this->conexao->prepare("INSERT INTO consulta (cpf_paciente, cpf_profissional, descricao, data_consulta, ) 
                                            VALUES (:cpf, :cpf, :data, :descricao)");
            $resultado = $query->execute([
                'cpf' => $consulta->getPaciente()->getCpf(),
                'cpf' => $consulta->getProfissional()->getCpf(),
                'data' => $consulta->getData()->format('Y-m-d'),
                'descricao' => $consulta->getDescricao()
            ]);

            return $resultado;

        }catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function listarConsultaPaciente($paciente)
    {
        try
        {
            $query = $this->conexao->prepare("SELECT * FROM consulta WHERE cpf_paciente = :cpf OR nome = :nome");
            $query->execute([
                'cpf' => $paciente->getCpf(),
                'nome' => $paciente->getNome(),
            ]);
            $consultaPaciente = $query->fetchAll();
            return $consultaPaciente;

        }catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function listarConsulta($argumento = null)
    {
        if($argumento)
        {
            try
            {
                $query = $this->conexao->prepare("SELECT * FROM consulta WHERE cpf_paciente = :cpf OR cpf_profissional = :cpf OR nome = :nome");
                $query->execute([
                    'cpf' => $argumento,
                    'nome' => $argumento
                ]);
                $consultas = $query->fetchAll();
                return $consultas;

            }catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
        try
        {
            $query = $this->conexao->prepare("SELECT * FROM consulta WHERE data_consulta = :data_atual");
            $query->bindParam(':data_consulta', $_SESSION['dataAtual'], PDO::PARAM_STR);
            $query->execute();
            $consultas = $query->fetchAll();
            return $consultas;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>