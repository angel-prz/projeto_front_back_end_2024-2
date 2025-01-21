<script src="scripts/mapa.js"></script>
<script src="scripts/javascript.js"></script>
<div class="page_consulta">
<h3> Mapa </h3>
<div id="map" name="div_map" style="height:50em" style="width: 5em;"></div>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="mapa.js"></script>
</div>
<title>Listar consultas</title>
<h3> Consultas </h3>
<section>
<form action="" method="post">
  <label for="nome_pesquisa">Pesquisa por paciente: </label><input type="text" name="nome_pesquisa" id="nome_pesquisa" value="cpf">
  <button type="submit" id='pesquisar' name='pesquisar' value="Pesquisar"> Pesquisar </button>  
  <button type="button" id='limpar' name='limpar' value="limparPesquisa" onclick="limparPesquisa()"> Limpar pesquisa </button>
  <br>
</section>
<?php
        $nome_pesquisa = isset($_POST['nome_pesquisa']) ? $_POST['nome_pesquisa'] : null;
        $consultasDAO = new ConsultaDAO();
        $consultas = $consultasDAO->listarConsulta($nome_pesquisa);
        if(empty($consultas))
        {
?>
                <section>
                        <p>Nenhum resultado encontrado.</p>
                </section>
        <?php
        }
        foreach($consultas as $consulta)
        {
                ?>
                <section>
                        <form action="includes/logica/logica_consulta.php" method="post">
                                <ul id="ul_listaConsulta" class="flex-container">
                                        <li id="il_listaConsulta">Paciente: <?php echo $consulta['nome']; ?> </li>
                                        <li id="il_listaConsulta">CPF: <?php echo $consulta['cpf']; ?> </li>
                                        <li id="il_listaConsulta">Data: <?php echo $consulta['data']; ?> </li>
                                        <li id="il_listaConsulta">Hora: <?php echo $consulta['hora']; ?> </li>
                                        <li id="il_listaConsulta">Médico: <?php echo $consulta['medico']; ?> </li>
                                        <li id="il_listaConsultae">Especialidade: <?php echo $consulta['especialidade']; ?> </li>
                                        <li id="il_listaConsulta">Observações: <?php echo $consulta['observacoes']; ?> </li>
                                        <li class="flex-item">
                                                <button type="submit" name="deletar" id="deletar" class="flex-item deletar" value="<?php echo $consulta['cpf']; ?>" onclick = "return confirma_excluir()"> Deletar </button> 
                                        </li>
                                </ul>
                        </form>
                        <br><br>
        <?php
        }
       ?>
                </section>
</section>