<link rel="stylesheet" href="css/style.css">
<header>
    <div class="header-container">
        <!-- Logo -->
        <div class="logo">
            <img src="imagens/prontuario.png" alt="Prontuario" class="logo-img"> <!-- Use sua imagem aqui -->
            <span>Prontuario</span>
        </div>

        <!-- Navigation Icons -->
         <div class="nav-icons">
            <button class="icon-btn" id="dropdownButton">
                   
                <i class="fas fa-user-circle">    
                </i>
                <div class="dropdown-menu" id="dropdownMenu">
                    <ul>
                        <li>
                            <a href="#profile">Meu Perfil</a>
                        </li>
                        <li>
                            <a href="#settings">Configurações</a>
                        </li>
                        <li>
                            <form action="includes/logica/logica_usuario.php" method="post">
                                <input type="submit" name="sair" value="Sair" class="botao_sair">
                            </form>
                        </li>  
                    </ul>
                </div>
            </button>
        </div>
    </div>
</header>
