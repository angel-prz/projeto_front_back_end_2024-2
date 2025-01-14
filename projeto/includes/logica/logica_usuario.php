<?php
    require_once('Usuario.php');
    require_once('UsuarioDAO.php'); 
    require_once('config_upload.php');
    
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
    
            //nova instancia de usuario
            $usuario=new Usuario();
            $usuario->setNome($nome);
            $usuario->setEmail($email);
            $usuario->setCpf($cpf);
            $usuario->setSenha($senha);
            $usuario->setImagem($nome_arquivo);
            //converter a string para DateTIme
            $usuario->setDataNascimento(new DateTime($dataNascimento));
            $usuario->setTipoUsuario($tipoUsuario);

            //pegar data hora atual
            $dataCadastro = new DateTime('now');
            //setar formato do banco de dados ANO-MES-DIA HORA:MINUTO:SEGUNDO
            $usuario->setDataCadastro($dataCadastro);//$dataCadastro->format('Y-m-d H:i:s')

            $UsuarioDAO= new UsuarioDAO($usuario);

            $retorno=$UsuarioDAO->inserirUsuario($usuario);
                
            header('location:../../index.php');
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
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

        $usuario=new Usuario();
        $usuario->setEmail($email);
        $usuario->setSenha($senha);
        //$usuario->setCpf($cpf);
        //$usuario->setDataNascimento($dataNascimento);
        //$usuario->setTipoUsuario($tipoUsuario);
        //$usuario->setImagem($imagem);
        //$usuario->setDataCadastro($dataCadastro);

        $UsuarioDAO = new UsuarioDAO();
        var_dump($usuario);
        $retorno = $UsuarioDAO->acessarUsuario($usuario);
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

                require_once('/view/mostrarPessoa.php');
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