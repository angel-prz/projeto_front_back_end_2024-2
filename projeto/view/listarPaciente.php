<?php
require_once('includes/logica/PacienteDAO.php'); 
?>
<link rel="stylesheet" href="css/style.css">
<main>
<h3> Listagem de Usuários </h3>
    <section>
    <form action="" method="post">
      <label for="nome_pesquisa">Pesquisa por nome: </label><input type="text" name="nome_pesquisa" id="nome_pesquisa">
      <button type="submit" id='pesquisar' name='pesquisar' value="Pesquisar"> Pesquisar </button>  
      <button type="button" id='limpar' name='limpar' value="limparPesquisa" onclick="limparPesquisa()"> Limpar pesquisa </button>      
    </form>

    </section>
    <?php
    //se for null só lista os usuarios
        $nomePesquisa = isset($_POST['nome_pesquisa']) ? $_POST['nome_pesquisa'] : null;
        $pacientesDAO = new PacienteDAO();
        $pacientes = $pacientesDAO->listarPaciente($nomePesquisa);
        if(empty($pacientes)){
        ?>
            <section>
                <p>Nenhum resultado encontrado.</p>
            </section>
        <?php
        }
        foreach($pacientes as $paciente)
        {
            ?>
            <section>
                <form action="includes/logica/logica_usuario.php" method="post">
                    <ul id="ul_listaPaciente" class="flex-container">
                        <li><img id="imagem_perfil" class="flex-item imagem_perfil" src="imagens/<?php echo $paciente['imagem'];?>" /></li>
                        <li id="il_listaPaciente">Nome: <?php echo $paciente['nome']; ?> </li>
                        
                        <li class="flex-item">
                            <button type="submit" name="ficha" class="flex-item nome" value="<?php echo $paciente['cpf']; ?>"> Ficha </button> 
                        </li>
                        <li class="flex-item">
                        <button type="submit" name="deletar" value="<?php echo $paciente['cpf']; ?>" onclick = "return confirma_excluir()"> Deletar </button> 
                        </li>
                    </ul>
                    
                    
                </form>
                <br><br>                                                          
            </section>
            <?php
            //<li id="il_listaPaciente">Email <?php echo $paciente['email'];
        }
    
        
    ?>
</main>
