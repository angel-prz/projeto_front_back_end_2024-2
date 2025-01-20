<?php
class Profissional extends Usuario
{
    private $tipoProfissional;
    private $registro;
    
    //construtor com valores padrões/vazio
    public function __construct(/*string $cpf ="", string $nome ="", string $email ="", string $senha ="", 
    DateTime $dataNascimento = null, $imagem ="", DateTime $dataCadastro = null, array $historico = []*/)
    {
        /*parent::__construct($cpf, $nome, $email, $senha, $dataNascimento, $imagem, $dataCadastro);  
*/
    }

    //setters
    public function setTipoProfissional($tipoProfissional): void {$this->$tipoProfissional = $tipoProfissional;}
    public function setRegistro($registro): void {$this->$registro = $registro;}
    //getters
    public function getTipoProfissional() {return $this->tipoProfissional;}
    public function getRegistro() {return $this->registro;}
}