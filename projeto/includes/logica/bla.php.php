<?php

class Paciente {
    public string $nome;
    public string $cpf;
    public string $dataNascimento;
    public string $genero;
    public Endereco $endereco;
    public Contato $contato;

    public function __construct(string $nome, string $cpf, string $dataNascimento, string $genero, Endereco $endereco, Contato $contato) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->dataNascimento = $dataNascimento;
        $this->genero = $genero;
        $this->endereco = $endereco;
        $this->contato = $contato;
    }
}

class Endereco {
    public string $rua;
    public string $numero;
    public string $complemento;
    public string $bairro;
    public string $cidade;
    public string $estado;
    public string $cep;

    public function __construct(string $rua, string $numero, string $complemento, string $bairro, string $cidade, string $estado, string $cep) {
        $this->rua = $rua;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
    }
}

class Contato {
    public string $telefone;
    public string $email;

    public function __construct(string $telefone, string $email) {
        $this->telefone = $telefone;
        $this->email = $email;
    }
}

class Prontuario {
    public int $id;
    public string $dataAbertura;
    public Paciente $paciente;
    public Medico $medicoResponsavel;
    public array $historicoMedico;

    public function __construct(int $id, string $dataAbertura, Paciente $paciente, Medico $medicoResponsavel, array $historicoMedico = []) {
        $this->id = $id;
        $this->dataAbertura = $dataAbertura;
        $this->paciente = $paciente;
        $this->medicoResponsavel = $medicoResponsavel;
        $this->historicoMedico = $historicoMedico;
    }
}

class Medico {
    public string $nome;
    public string $crm;
    public string $especialidade;
    public Contato $contato;

    public function __construct(string $nome, string $crm, string $especialidade, Contato $contato) {
        $this->nome = $nome;
        $this->crm = $crm;
        $this->especialidade = $especialidade;
        $this->contato = $contato;
    }
}

class HistoricoMedico {
    public int $id;
    public string $data;
    public string $tipoAtendimento;
    public string $descricao;
    public array $prescricao;

    public function __construct(int $id, string $data, string $tipoAtendimento, string $descricao, array $prescricao = []) {
        $this->id = $id;
        $this->data = $data;
        $this->tipoAtendimento = $tipoAtendimento;
        $this->descricao = $descricao;
        $this->prescricao = $prescricao;
    }
}

class Prescricao {
    public int $id;
    public string $medicamento;
    public string $dosagem;
    public string $frequencia;
    public string $duracao;

    public function __construct(int $id, string $medicamento, string $dosagem, string $frequencia, string $duracao) {
        $this->id = $id;
        $this->medicamento = $medicamento;
        $this->dosagem = $dosagem;
        $this->frequencia = $frequencia;
        $this->duracao = $duracao;
    }
}

class Agendamento {
    public int $id;
    public string $dataHora;
    public string $tipoAtendimento;
    public Medico $medico;
    public Paciente $paciente;

    public function __construct(int $id, string $dataHora, string $tipoAtendimento, Medico $medico, Paciente $paciente) {
        $this->id = $id;
        $this->dataHora = $dataHora;
        $this->tipoAtendimento = $tipoAtendimento;
        $this->medico = $medico;
        $this->paciente = $paciente;
    }
}

class Login {
    public string $usuario;
    public string $senha;
    public string $tipoUsuario;

    public function __construct(string $usuario, string $senha, string $tipoUsuario) {
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->tipoUsuario = $tipoUsuario;
    }
}
