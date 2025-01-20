<?php
include('paciente.php');
include('profissional.php');
class Consulta
{
    private $id;
    private $data;
    private Paciente $paciente;
    private Profissional $profissional;
    private $descricao;

    public function __construct() {}
    //setter
    public function setId(){}
    //getter
    public function getId() {return $this->id;}
    public function getData() {return $this->data;}
    public function getPaciente() {return $this->paciente;}
    public function getProfissional() {return $this->profissional;}
    public function getDescricao() {return $this->descricao;}

}