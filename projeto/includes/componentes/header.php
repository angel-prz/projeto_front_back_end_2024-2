<link rel="stylesheet" href="css/style.css">
<header>
    <div class="header-container">
        <!-- Logo -->
        <div class="logo">
            <img src="imagens/prontuario.png" alt="Prontuario" class="logo-img"> <!-- Use sua imagem aqui -->
            <span>Prontuario</span>
        </div>

        <div>
            <?php echo $_SESSION['dataAtual']; ?>
        </div>
        <!-- Navigation Icons -->
         <div class="nav-icons">
            <div class="dropdown">          
                <button onclick="mostrarDropdown()" class="dropbtn"><i class="fas fa-user-circle">    
                </i></button>
                <div id="Dropdown" class="dropdown-content">
                    <a href="#profile">Meu Perfil</a>
                    <a href="#settings">Configurações</a>
                    <form action="includes/logica/logica_usuario.php" method="post">
                        <input type="submit" name="sair" value="Sair" class="botao_sair">
                    </form>
                </div>
            </div> 
        </div>
    </div>
</header>
