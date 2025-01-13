<link rel="stylesheet" href="css/style.css">
<script src="scripts/javascript.js"></script>
<title>Cadastrar Usuário</title>
<main>
  <h2>Cadastrar Usuário</h2>
    <section>
    <form action="includes/logica/logica_usuario.php" method="post" enctype="multipart/form-data" id="formCadastroUsuario">
      <p><label for="nome">Nome: </label><input type="text" name="nome" id="nome"></p>
      <p><label for="email">email: </label><input type="text" name="email" id="email"></p>
      <p><label for="cpf">CPF: </label><input type="text" name="cpf" id="cpf"></p>
      <p><label for="senha">Senha: </label> <input type="password" name="senha" id="senha"></p>
      <p><label for="dataNascimento">Data de Nascimento: </label> <input type="date" name="dataNascimento" id="dataNascimento"></p>
      <p><label for="tipoUsuario">Tipo de Usuário: </label> <select name="tipoUsuario" id="tipoUsuario"></p>
        <option value="paciente">Paciente</option>
        <option value="profissional_saude">Profissional de Saúde</option>
        <option value="bolsista">Bolsista</option>
      <br>
      <p><label for="imagem">Foto: </label> <input type="file" name="imagem" id="imagem"></p>
      <div id="divTipoProfissional">
        <p><label for="tipoProfissional">Tipo de Profissional: </label> <select name="tipoProfissional" id="tipoProfissional"></p>
          <option value="medico">Médico</option>
          <option value="enfermeiro">Enfermeiro</option>
          <option value="tec_enfermeiro">Técnico de Enfermagem</option>
          <option value="odontologista">Odontologista</option>
        <p><label for="tipoConselho">Conselho: </label> <input type="text" name="tipoConselho" id="tipoConselho" readonly ></p>
      </div>
      <div id="divNumeroConselho">
        <p><label for="numeroConselho">Número do Conselho: </label> <input type="text" name="numeroConselho" id="numeroConselho"></p>
      </div>
      <p><button type="submit" id='cadastrar' name='cadastrar' value="Cadastrar"> Cadastrar </button>  </p>      
    </form>
    </section>
</main>
