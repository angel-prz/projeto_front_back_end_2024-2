<?php
    require_once('config_upload.php');
    require_once('Paciente.php');
    require_once('PacienteDAO.php');
    define('BLA', '/var/www/projeto/projeto_front_back_end_2024-2/projeto/');

#CADASTRO paciente
    if(isset($_POST['cadastrar']))
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];
        $dataNascimento = $_POST['dataNascimento'];
        $tipopaciente = $_POST['tipopaciente'];
        $nome_arquivo=$_FILES['imagem']['name'];  
        $tamanho_arquivo=$_FILES['imagem']['size']; 
        $arquivo_temporario=$_FILES['imagem']['tmp_name']; 
        try {
            // Chama a função de upload
            $uploadedFile = uploadArquivo($_FILES['imagem'], $caminho);
    
            echo "Upload concluído com sucesso: $uploadedFile<br>";
            
                //usando construtor
                $paciente=new Paciente($nome, $email, $cpf, $senha, new DateTime($dataNascimento), $tipopaciente, $nome_arquivo, $historico,);

                //pegar data hora atual
                $dataCadastro = new DateTime('now');
                //setar formato do banco de dados ANO-MES-DIA HORA:MINUTO:SEGUNDO
                $paciente->setDataCadastro($dataCadastro);//$dataCadastro->format('Y-m-d H:i:s')

                $pacienteDAO= new PacienteDAO($paciente);

                $retorno=$pacienteDAO->inserirPaciente($paciente);
                    
                header('location:../../index.php');
        }catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    


#PESQUISAR PACIENTE 
if(isset($_POST['pesquisar']))
{
    $nome = $_POST['nome'];
    $pacientesDAO = new PacienteDAO();
    $pacientes = $pacientesDAO->listarPaciente($nome);
    include(__DIR__ . 'index.php?page=listarPaciente'); 
}

#DELETAR PACIENTE
if(isset($_POST['deletar'])){
    $cpf = $_POST['deletar'];

            $paciente=new Paciente();

            $paciente->setCpf($cpf);

            $PacienteDAO= new PacienteDAO();

            $retorno=$PacienteDAO->deletarPaciente($paciente);
   

    header('Location:../../index.php');
}



#EDITAR PACIENTE
if(isset($_POST['editar'])){
    
    $cpf = $_POST['cpf'];
    $pacientesDAO = new PacienteDAO();
    $pacientes = $pacientesDAO->listarPaciente($cpf);
    include(__DIR__ . 'index.php?page=listarPaciente'); 
}    

#ALTERAR PACIENTE
if(isset($_POST['alterar'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $dataNascimento = $_POST['dataNascimento'];
    $tipoUsuario = $_POST['tipoUsuario'];
    $nome_arquivo=$_FILES['imagem']['name'];  
    $tamanho_arquivo=$_FILES['imagem']['size']; 
    $arquivo_temporario=$_FILES['imagem']['tmp_name']; 

    $paciente=new paciente();
    $paciente->setNome($nome);
    $paciente->setEmail($email);
    $paciente->setCpf($cpf);
    $paciente->setSenha($senha);
    $paciente->setImagem($nome_arquivo);
    $paciente->setTipoUsuario($tipoUsuario);
    //converter a string para DateTIme
    $paciente->setDataNascimento(new DateTime($dataNascimento));
    $paciente->setDataCadastro(new DateTime());
    $PacienteDAO= new PacienteDAO();

    $retorno=$PacienteDAO->alterarPaciente($paciente);
    header('Location:../../index.php');
    //include(__DIR__ . 'index.php?page=listarPaciente');
}
?>