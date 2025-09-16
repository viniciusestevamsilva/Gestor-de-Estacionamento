<?php include "./header.php" ?>
<img src="../img/parede-de-concreto.jpg" class='fundo-bk'>
<header>
    <h1>DILEVI Parking</h1>
</header>

<a href="cadastro_usuario.php"><strong> CADASTRO USUARIO </strong></a>
<a href="cadastro_veiculo.php"><strong> CADASTRO VEICULO </strong></a>
<a href="../index.php" id='btn-saida'>SAIR</a>

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
    <tbody id="vagas"></tbody>
</table>


<script src="../js/script.js"></script>
<?php include "./footer.php" ?>
