
<main>
    <h2>Cadastro de Novo Item</h2>
    <form action="cadastrar_processar.php" method="POST">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" required></textarea>
        </div>
        <button type="submit">Cadastrar</button>
    </form>
</main>
