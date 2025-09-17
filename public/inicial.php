<!-- Exemplo de estrutura em inicial.php -->
<?php include "./header.php" ?>

<div class="ajustes-header-footer">
    <main>
        <img src="../img/parede-de-concreto.jpg" class='fundo-bk'>

        <div class="botoes-container">
            <a href="cadastro_usuario.php"><strong>CADASTRO USUÁRIO</strong></a>
            <a href="cadastro_veiculo.php"><strong>CADASTRO VEÍCULO</strong></a>
            <a href="../index.php" id="btn-saida"><strong>SAIR</strong></a>
        </div>

<table  id='tabelaTarefas'>
    <thead>
        <tr>
            <!-- <th>ID</th> -->
            <th>Situação</th>
            <th>Setor</th>
            <th>Número</th>
            <th>Nome</th>
            <th>Placa</th>
            <th>Hora de Entrada</th>
            <th>Hora de Saída</th>
            <th>Valor(R$)</th>
            <th>Adicionar Saída</th>
        </tr>
    </thead>
    <tbody id="ocupacao"></tbody>
</table>

    </main>

    <?php include "./footer.php" ?>
</div>

<script src="../js/script.js"></script>
