<?php
    session_start();
    if(!$_SESSION['logado'])
    {
	    header('location:login.php');
    }
    include_once('includes/componentes/cabecalho.php');
    include_once('includes/logica/UsuarioDAO.php');
?>  
<body>

<div class="container">
    <?php 
        include_once('includes/componentes/header.php');
        include('includes/componentes/navbar.php'); 
        
    ?>
     
    <main> 
    <?php
        // Define o arquivo a ser incluído no main dependendo da URL ou de uma lógica
        $page = isset($_GET['page']) ? $_GET['page'] : 'listarPaciente'; // Default para "listar"

        // Inclui o conteúdo do main dinamicamente
        switch ($page) {
            case 'cadastrarUsuario':
                include('view/cadastrarUsuario.php');
                break;
            case 'listarPaciente':
                include('view/listarPaciente.php');
                break;
            case 'listarPaciente':
                include('view/resultadoPaciente.php');
                break;
            case 'mostrarConsultas':
                include('view/mostrarConsultas.php');
                break;
            case 'mostrarExames':
                include('view/mostrarExames.php');
                break;
            default:
                include('view/listarPaciente.php'); // Redireciona para "listar" por padrão
                break;
        }
    ?>
    </main>
</div>
<?php require('includes/componentes/footer.php');?>
</body>

</html>