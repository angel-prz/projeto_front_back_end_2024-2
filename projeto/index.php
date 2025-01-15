<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
include_once('includes/componentes/cabecalho.php');
include_once('includes/componentes/header.php');
include_once('includes/logica/UsuarioDAO.php');
?>
<title>Prontuario</title>
</head>  
<body>
<script src="https://kit.fontawesome.com/5a35988550.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/style.css">
<div class="container">
        
        <?php
        // https://kit.fontawesome.com/5a35988550.js fonte dos icones
        // Inclui a barra de navegação
        include('includes/componentes/navbar.php');

        // Inclui a barra lateral
        //include('includes/componentes/aside.php');

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
    
</div>
<?php require('includes/componentes/footer.php');?>
</body>

</html>