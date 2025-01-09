<?php
// Inclui o cabeçalho
include('includes/header.php');
?>
<link rel="stylesheet" href="css/style.css">
<div class="container">
    <?php
    // Inclui a barra de navegação
    include('includes/navbar.php');

    // Inclui a barra lateral
    include('includes/aside.php');

    // Define o arquivo a ser incluído no main dependendo da URL ou de uma lógica
    $page = isset($_GET['page']) ? $_GET['page'] : 'listar'; // Default para "listar"

    // Inclui o conteúdo do main dinamicamente
    switch ($page) {
        case 'cadastrar':
            include('includes/cadastrar.php');
            break;
        case 'listar':
            include('includes/listar.php');
            break;
        default:
            include('includes/listar.php'); // Redireciona para "listar" por padrão
            break;
    }
    ?>
    <?php
    // Inclui o rodapé
    include('includes/footer.php');
    ?>
</div>
