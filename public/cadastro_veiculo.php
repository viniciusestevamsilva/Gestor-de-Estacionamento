<?php include "./header.php" ?>

<main class="container-form">
    <form id="formCadastro" class='formulario'>
        <label for="number">ID DO CLIENTE:</label>
        <input type="number" name="id_cliente" id="cliente" required>
        <label for="number">PLACA DO VEÍCULO:</label>
        <input type="text" name="num_placa" id="placa" required>
        <label for="nascimento">COR DO VEÍCULO:</label>
        <input type="text" name="cor" id="nome_cor">
        <label for="vagas">SELECIONE UMA VAGA</label>
        <select id="vagas" name="vagas_livres">
            <!-- <option value="a1">A1</option>
            <option value="a2">A2</option>
            <option value="a3">A3</option> -->
        </select>
        <button type="submit" id="cadastrar">CADASTRAR</button>
        <a href="inicial.php" id='btn-saida'>SAIR</a>
    </form> ''
</main>

<table id="tabelaTarefas">
    <thead>
        <tr>
            <th>ID</th>
            <th>ID CLIENTE</th>
            <th>PLACA</th>
            <th>COR</th>
        </tr>
    </thead>
    <tbody id="usuarios"></tbody>
</table>

<script src="../js/script.js"></script>