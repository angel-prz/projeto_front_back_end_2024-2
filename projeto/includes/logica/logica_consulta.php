<?php
require_once('config_upload.php');
require_once('Usuario.php');
require_once('consultaDAO.php');
require_once('Consulta.php');
require_once('Paciente.php');
require_once('Profissional.php');

if(isset($_POST['marcar']))
{
    $cpf_paciente = $_POST['cpf_paciente'];
    $nome_paciente = $_POST['nome_paciente'];
    $cpf_profissional = $_POST['cpf_profissional'];
    $nome_profissional = $_POST['nome_profissional'];
    $data = $_POST['data'];
    $descricao = $_POST['descricao'];

    $paciente = new Paciente();
    $paciente->setCpf($cpf_paciente);
    $paciente->setNome($nome_paciente);

    $profissional = new Profissional();
    $profissional->setCpf($cpf_profissional);
    $profissional->setNome($nome_profissional);

    $consulta = new Consulta();
    $consulta->setPaciente($paciente);
    $consulta->setProfissional($profissional);
    $consulta->setData(new DateTime($data));
    $consulta->setDescricao($descricao);

    $consultaDAO = new ConsultaDAO($consulta);
    $retorn = $consultaDAO->marcarConsulta($consulta);
}

if(isset($_POST['listarConsultaPaciente']))
{
    $cpf_paciente = $_POST['cpf_paciente'];
    $dataAtual = $_POST['dataAtual'];
    $paciente = new Paciente();
    $paciente->setCpf($cpf_paciente);

    $consultaDAO = new ConsultaDAO();
    $consultas = $consultaDAO->listarConsultaPaciente($paciente);
}