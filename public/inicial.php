<?php include "./header.php" ?>
<img src="../img/parede-de-concreto.jpg" class='fundo-bk'>
<header>
    <h1>DILEVI Parking</h1>
</header>

<button>cadastro_usuario</button>
<button>cadastro_veiculo</button>
<a href="../index.php" id='btn-saida'>SAIR</a>
<?php include "./cadastro_usuario.php"?>

<table  id='tabelaTarefas'>
    <thead>
        <tr>
            <th>Situação</th>
            <th>Setor</th>
            <th>Número</th>
            <th>Nome</th>
            <th>Placa</th>
            <th>Hora de Entrada</th>
            <th>Hora de Saída</th>
            <th>Valor(R$)</th>
        </tr>
    </thead>
    <tbody id="vagas"></tbody>
</table>


<script src="../js/script.js"></script>
<?php include "./footer.php" ?>
