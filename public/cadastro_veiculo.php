<?php include "./header.php" ?>

<main class="container-form">
    <form id="formCadastro" class='formulario'>
        <label for="cliente">ID DO CLIENTE:</label>
        <input type="number" name="id_cliente" id="cliente" required>

        <label for="placa">PLACA DO VEÍCULO:</label>
        <input type="text" name="num_placa" id="placa" required>

        <label for="cor">COR DO VEÍCULO:</label>
        <input type="text" name="nome_cor" id="cor">

        <label for="vagas">SELECIONE UMA VAGA</label>
        <select id="vagas" name="vagas_livres">
            <!-- <option value="a1">A1</option>
            <option value="a2">A2</option>
            <option value="a3">A3</option> -->
        </select>
        
        <div class="botoes-container">

            <a href="inicial.php" id='btn-saida'>VOLTAR</a>
            <button type="submit" id="cadastrar_veiculo">CADASTRAR VEICULO</button>

        </div>
        
    </form>

</main>


<table id="tabelaTarefas">

    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>TELEFONE</th>
            <th>ANO</th>
        </tr>
    </thead>
    <tbody id="usuarios"></tbody>

</table>

<script src="../js/script.js"></script>
<?php include "footer.php"; ?>