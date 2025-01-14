<?php
    require_once('config_upload.php');
    require_once('Paciente.php');
    require_once('PacienteDAO.php');

#CADASTRO USUARIO
    if(isset($_POST['cadastrar']))
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];
        $dataNascimento = $_POST['dataNascimento'];
        $tipoUsuario = $_POST['tipoUsuario'];
        $nome_arquivo=$_FILES['imagem']['name'];  
        $tamanho_arquivo=$_FILES['imagem']['size']; 
        $arquivo_temporario=$_FILES['imagem']['tmp_name']; 
        try {
            // Chama a função de upload
            $uploadedFile = uploadArquivo($_FILES['imagem'], $caminho);
    
            echo "Upload concluído com sucesso: $uploadedFile<br>";
            
                //usando construtor
                $paciente=new Paciente($nome, $email, $cpf, $senha, new DateTime($dataNascimento), $tipoUsuario, $nome_arquivo, $historico);

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
if(isset($_POST['pesquisar'])){

    $paciente=new Paciente();

    $nome = "%".strtoupper($_POST['nome'])."%";

    $paciente->setNome($nome);

    $PacienteDAO= new PacienteDAO();

    $retorno=$PacienteDAO->pesquisarpaciente($paciente);

    require_once('../../resultadoPaciente.php');
}
?>