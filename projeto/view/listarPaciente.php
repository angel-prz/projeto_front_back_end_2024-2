<?php
require_once('includes/logica/PacienteDAO.php'); 
?>
<link rel="stylesheet" href="css/modal.css">
<script src="scripts/javascript.js?v=<?= time(); ?>"></script>
<div class="page_usuarios">
<title>Listar usúarios</title>
<h3> Listagem de Usuários </h3>
    <section>
    <form action="" method="post">
      <label for="nome_pesquisa">Pesquisa por nome: </label><input type="text" name="nome_pesquisa" id="nome_pesquisa">
      <button type="submit" id='pesquisar' name='pesquisar' value="Pesquisar"> Pesquisar </button>  
      <button type="button" id='limpar' name='limpar' value="limparPesquisa" onclick="limparPesquisa()"> Limpar pesquisa </button>      
    </form>
    <br>
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
                        <li><img id="imagem_perfil" class="flex-item imagem_perfil" src="imagens/<?php echo $paciente['imagem'];?>" alt="Foto de perfil"/></li>
                        <li id="il_listaPaciente">Nome: <?php echo $paciente['nome']; ?> </li>
                        
                        <li class="flex-item">
                            <button type="button" id="ficha" name="ficha" class="ficha" value="<?php echo $paciente['nome']; ?>"> Ficha </button> 
                        </li>
                        <li class="flex-item">
                            <button type="submit" name="deletar" id="deletar" class="flex-item deletar" value="<?php echo $paciente['cpf']; ?>" onclick = "return confirma_excluir()"> Deletar </button> 
                        </li>
                        <li class="flex-item">
                            <a href="index.php?page=mostrarExames">Exames</a>
                        </li>
                        <li class="flex-item">
                            <a href="index.php?page=mostrarConsultas">Consulta</a>
                        </li>
                    </ul>
                </form>
                <br><br>                                                          
            </section>
            <?php
            //<li id="il_listaPaciente">Email <?php echo $paciente['email'];
        }  
    ?>
</div>
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
            <div id="modal_background" class="modal">
                <div id="form_modal" class="form_modal">
                <span class="close">&times;</span>
                    <form action="includes/logica/logica_paciente.php" method="post" enctype="multipart/form-data" id="formCadastroUsuario">
                        <p><label for="nome">Nome: </label><input type="text" name="nome" id="nome" value="<?php echo $paciente['nome']?>"></p>
                        <p><label for="email">email: </label><input type="text" name="email" id="email" value="<?php echo $paciente['email']?>"></p>
                        <p><label for="cpf">CPF: </label><input type="text" name="cpf" id="cpf" class="campoCPF" maxlength="11" value="<?php echo $paciente['cpf']?>"></p>
                        <p><label for="senha">Senha: </label> <input type="password" name="senha" id="senha" value="<?php echo $paciente['senha']?>"></p>
                        <p><label for="dataNascimento">Data de Nascimento: </label> <input type="date" name="dataNascimento" id="dataNascimento" value="<?php echo $paciente['dataNascimento']?>"></p>
                        <p><label for="tipoUsuario">Tipo de Usuário: </label> <select name="tipoUsuario" id="tipoUsuario" value="<?php echo $paciente['tipoUsuario']?>"></p>
                            <option value="paciente">Paciente</option>
                            <option value="profissional_saude">Profissional de Saúde</option>
                            <option value="bolsista">Bolsista</option>
                            </select>
                        <br>
                        <p><label for="imagem">Foto: </label> <input type="file" name="imagem" id="imagem" src="../../imagens/<?php echo $paciente['imagem'];?>"></p>
                        <p> <input type="submit" id='alterar' name='alterar' value="Alterar" onclick="return verificarCadastro()">       
                    </form>
                </div>
            </div>
            <?php
        }
    
?>
        <script src="scripts/modal.js"></script>
        <script>
        </script>
</main>

