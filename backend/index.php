<!DOCTYPE html>
<html>

<?php

include_once('includes/componentes/cabecalho.php');
include_once('includes/componentes/header.php');
include_once('includes/logica/UsuarioDAO.php');

?>
<title>Listar Usuário</title>
</head>
<body>  
<body>

<main>
         <h2> Usuário Logado:  <?php echo $_SESSION['nome']; ?>  </h2>
         <h3> Listagem de Usuários </h3>
    <?php
        $pacientesDAO = new UsuarioDAO();
        $pacientes = $pacientesDAO->listarPaciente();
        if(empty($pacientes)){
            ?>
                <section>
                    <p>Não há pacientes cadastrados.</p>
                </section>
            <?php
        }
        foreach($pacientes as $paciente){
                 
            ?>
                <section>
                    <p>Nome: <?php echo $paciente['nome']; ?></p>
                    <p>Email <?php echo $paciente['email']; ?></p>
                    <p>CPF: <?php echo $paciente['cpf']; ?></p>
                    <p>Imagem: <img src="imagens/<?php echo $paciente['imagem'];?>" width='100px' height='100px'/></p>
                    
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
<?php require('includes/componentes/footer.php');?>
</body>
<script type="text/javascript">
    function confirma_excluir()
    {
        resp=confirm("Confirma Exclusão?")

        if (resp==true)
        {

            return true;
        }
        else
        {
            return false;

        }

    }
</script>
</html>