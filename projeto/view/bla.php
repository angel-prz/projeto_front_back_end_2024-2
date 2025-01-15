<?php
 require_once('includes/logica/PacienteDAO.php'); 
?>
<link rel="stylesheet" href="css/style.css">
<main>
<h3> Listagem de Usuários </h3>
    <section>
    <form action="includes/logica/logica_paciente.php" method="post">
      <p><label for="nome">Pesquisa por nome: </label><input type="text" name="nome" id="nome"></p>
      <p><button type="submit" id='pesquisar' name='pesquisar' value="Pesquisar"> Pesquisar </button>  </p>      
    </form>
    </section>
    <?php
    
        if(empty($retorno)){
        ?>
            <section>
                <p>Nenhum resultado encontrado.</p>
            </section>
        <?php
        }
        foreach($retorno as $paciente)
        {
            ?>
            <section>
                <ul id="ul_listaPaciente">
                <li>Imagem: <img class="imagem_perfil" src="imagens/<?php echo $paciente['imagem'];?>" /></li>
                    <li id="il_listaPaciente">Nome: <?php echo $paciente['nome']; ?> </li>
                    <li id="il_listaPaciente">Email <?php echo $paciente['email']; ?> </li>
                </ul>
                    
                <form action="includes/logica/logica_usuario.php" method="post">
                    <button type="submit" name="editar" value="<?php echo $paciente['cpf']; ?>"> Editar </button>
                    <button type="submit" name="deletar" value="<?php echo $paciente['cpf']; ?>" onclick = "return confirma_excluir()"> Deletar </button> 
                </form>
                <br><br>                                                          
            </section>
            <?php
        }
    
        
    ?>
</main>
