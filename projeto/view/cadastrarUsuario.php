<link rel="stylesheet" href="assets/css/index.css">
<title>Cadastrar Usuário</title>
<main>
  <h2>Cadastrar Usuário</h2>
    <section>
    <form action="includes/logica/logica_usuario.php" method="post" enctype="multipart/form-data">
      <p><label for="nome">Nome: </label><input type="text" name="nome" id="nome"></p>
      <p><label for="email">email: </label><input type="text" name="email" id="email"></p>
      <p><label for="cpf">CPF: </label><input type="text" name="cpf" id="cpf"></p>
      <p><label for="senha">Senha: </label> <input type="password" name="senha" id="senha"></p>
      <p><label for="dataNascimento">Data de Nascimento: </label> <input type="date" name="dataNascimento" id="dataNascimento"></p>
      <p><label for="tipoUsuario">Tipo de Usuário: </label> <select name="tipoUsuario" id="tipoUsuario">
        <option value="paciente">Paciente</option>
        <option value="profissional_saude">Profissional de Saúde</option>
      <p><label for="imagem">Foto: </label> <input type="file" name="imagem" id="imagem"></p>
      <p><button type="submit" id='cadastrar' name='cadastrar' value="Cadastrar"> Cadastrar </button>  </p>      
    </form>
    </section>
</main>
