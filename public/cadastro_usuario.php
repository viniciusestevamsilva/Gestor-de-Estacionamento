<?php include "header.php"; ?>

<main class="container-form">
    <img src="../img/parede-de-concreto.jpg" class="fundo-bk">
    

    <form id="formCadastro" class="formulario">
        <label for="user">NOME DO CLIENTE:</label>
        <input type="text" id="user" required>

        <label for="number">NÚMERO DE CONTATO:</label>
        <input type="text" id="number" required>

        <label for="nascimento">ANO DE NASCIMENTO:</label>
        <input type="number" id="nascimento" min="1900" required>

        <button type="submit" id="cadastrar">CADASTRAR</button>
        <a href="inicial.php" id='btn-saida'>SAIR</a>
    </form>

</main>

     <table id="tabelaTarefas">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Número Contato</th>
                <th>Ano de Nascimento</th>
            </tr>
        </thead>
        <tbody id="usuarios"></tbody>
    </table>


<script src="../js/script.js"></script>
<?php include "footer.php"; ?>