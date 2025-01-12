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
        if (!empty($nome_arquivo))
        {
            if($sobrescrever=="não" && file_exists("$caminho/$nome_arquivo"))
                die("Arquivo já existe");

            if($limitar_tamanho=="sim" && ($tamanho_arquivo > $tamanho_bytes))  
                die("Arquivo deve ter o no máximo $tamanho_bytes bytes");

            $ext = strrchr($nome_arquivo,'.');
            if (($limitar_ext == "sim") && !in_array($ext,$extensoes_validas))
                die("Extensão de arquivo inválida para upload");

            if (move_uploaded_file($arquivo_temporario, "../../imagens/$nome_arquivo")) 
            {
                    echo " Upload do arquivo: ". $nome_arquivo." foi concluído com sucesso <br>";
                    //usando construtor
                    $paciente=new Paciente($nome, $email, $cpf, $senha, new DateTime($dataNascimento), $tipoUsuario, $nome_arquivo, $historico);

                    //pegar data hora atual
                    $dataCadastro = new DateTime('now');
                    //setar formato do banco de dados ANO-MES-DIA HORA:MINUTO:SEGUNDO
                    $paciente->setDataCadastro($dataCadastro);//$dataCadastro->format('Y-m-d H:i:s')

                    $pacienteDAO= new PacienteDAO($paciente);

                    $retorno=$pacienteDAO->inserirPaciente($paciente);
                    
                    header('location:../../index.php');
            }
        }
    }
#ENTRAR
    if(isset($_POST['entrar'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        //$cpf = $_POST['cpf'];
        //$dataNascimento = $_POST['dataNascimento'];
        //$tipoUsuario = $_POST['tipo_usuario'];
        //$imagem = $_POST['imagem'];
        //$dataCadastro = $_POST['dataCadastro'];

        $paciente=new Usuario();
        $paciente->setEmail($email);
        $paciente->setSenha($senha);
        //$paciente->setCpf($cpf);
        //$paciente->setDataNascimento($dataNascimento);
        //$paciente->setTipoUsuario($tipoUsuario);
        //$paciente->setImagem($imagem);
        //$paciente->setDataCadastro($dataCadastro);

        $pacienteDAO = new UsuarioDAO();
        var_dump($paciente);
        $retorno = $pacienteDAO->acessarUsuario($paciente);
        var_dump($retorno);
        if($retorno){
            session_start();
            $_SESSION['logado'] = true;
            $_SESSION['cpf'] = $retorno['cpf'];
            $_SESSION['nome'] = $retorno['nome'];
            header('location:../../index.php');
        }
        else{
            header('location:../../login.php');
            echo $email , $senha;
        }
    }

#SAIR
    if(isset($_POST['sair'])){
            session_start();
            session_destroy();
            header('location:../../index.php');
    }

#EDITAR PESSOA
    if(isset($_POST['editar'])){
    
                $codpessoa = $_POST['editar'];

                $pessoa=new Pessoa();

                $pessoa->setcodpessoa($codpessoa);

                $PessoaDAO= new PessoaDAO();

                $retorno=$PessoaDAO->buscarPessoa($pessoa);

                require_once('../../alterarPessoa.php');
    }    
#ALTERAR PESSOA
    if(isset($_POST['alterar'])){
    
            $codpessoa = $_POST['codpessoa'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $cpf = $_POST['cpf'];
            $senha = $_POST['senha'];    

            $pessoa=new Pessoa();
            $pessoa->setnome($nome);
            $pessoa->setemail($email);
            $pessoa->setcpf($cpf);
            $pessoa->setsenha($senha);
            $pessoa->setcodpessoa($codpessoa);

            $PessoaDAO= new PessoaDAO();



            $retorno=$PessoaDAO->alterarPessoa($pessoa);

            header('location:../../index.php');
    }
#DELETAR PESSOA
    if(isset($_POST['deletar'])){
        $codpessoa = $_POST['deletar'];

                $pessoa=new Pessoa();

                $pessoa->setcodpessoa($codpessoa);

                $PessoaDAO= new PessoaDAO();

                $retorno=$PessoaDAO->deletarPessoa($pessoa);
       

        header('Location:../../index.php');
    }

#PESQUISAR PESSOA
    if(isset($_POST['pesquisar'])){

                $pessoa=new Pessoa();

                $nome = "%".strtoupper($_POST['nome'])."%";

                $pessoa->setnome($nome);

                $PessoaDAO= new PessoaDAO();

                $retorno=$PessoaDAO->pesquisarPessoa($pessoa);

                require_once('../../mostrarPessoa.php');
    }
#ALTERAR PERFIL
    if(isset($_POST['alterarPerfil'])){
 
            session_start();

            $codpessoa = $_POST['codpessoa'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $cpf = $_POST['cpf'];
            $senha = $_POST['senha'];    

            $pessoa=new Pessoa();
            $pessoa->setnome($nome);
            $pessoa->setemail($email);
            $pessoa->setcpf($cpf);
            $pessoa->setsenha($senha);
            $pessoa->setcodpessoa($codpessoa);

            $PessoaDAO= new PessoaDAO();

            $retorno=$PessoaDAO->alterarPessoa($pessoa);

            $_SESSION['nome'] = $nome;
            echo $_SESSION['nome'];
            header('location:../../alterarPerfil.php');
    }
?>