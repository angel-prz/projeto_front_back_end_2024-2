<?php
class Paciente extends Usuario {
    public String $matricula;
    public Historico $historico;
    public String $tipoPaciente;


    public function __construct(int $idUsuario,String $nome, String $email, DateTime $dataNascimento, String $telefone, DateTime $dataCadastro, String $senha, String $matricula,
                                Historico $historico, String $tipoPaciente)
    {
        parent::__construct($idUsuario,$nome, $email, $dataNascimento, $telefone, $dataCadastro, $senha);
        $this->matricula = $matricula;
        $this->historico = $historico;
        $this->tipoPaciente = $tipoPaciente;
    }

    public function getMatricula(): string
    {
        return $this->matricula;
    }

    public function setMatricula(string $matricula): void
    {
        $this->matricula = $matricula;
    }

    public function getHistorico(): Historico
    {
        return $this->historico;
    }

    public function setHistorico(Historico $historico): void
    {
        $this->historico = $historico;
    }

    public function getTipoPaciente(): string
    {
        return $this->tipoPaciente;
    }

    public function setTipoPaciente(string $tipoPaciente): void
    {
        $this->tipoPaciente = $tipoPaciente;
    }


}