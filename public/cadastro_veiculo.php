<?php include "./header.php" ?>

<main class="container-form">
<<<<<<< HEAD
    <form id="formCadastro" class='formulario'>
        <label for="cliente">ID DO CLIENTE:</label>
=======
    
    <form id="formCadastro" class="formulario">
        <label for="number">ID DO CLIENTE:</label>
>>>>>>> 16258bdf15e4f79235c832a4f0270184ed59a658
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
<<<<<<< HEAD
            <button type="submit" id="cadastrar_veiculo">CADASTRAR VEICULO</button>
=======
            <button type="submit" id="cadastrar">CADASTRAR VEICULO</button>
>>>>>>> 16258bdf15e4f79235c832a4f0270184ed59a658

        </div>
        
    </form>

</main>


<table id="tabelaTarefas">

    <thead>
        <tr>
            <th>ID</th>
<<<<<<< HEAD
            <th>NOME</th>
            <th>TELEFONE</th>
            <th>ANO</th>
=======
            <th>Nome</th>
            <th>Número</th>
            <th>Ano</th>
>>>>>>> 16258bdf15e4f79235c832a4f0270184ed59a658
        </tr>
    </thead>
    <tbody id="usuarios"></tbody>

</table>

<script src="../js/script.js"></script>
<?php include "footer.php"; ?>