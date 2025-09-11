<?php include "./header.php" ?>
<header>
    <h1>DILEVI Parking</h1>
</header>
<button>cadastro_usuario</button>
<button>cadastro_veiculo</button>
<?php include "./cadastro_usuario.php"?>

<table>
    <caption><strong>Situação das Vagas</strong></caption>
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

<a href="../index.php">SAIR</a>
<script src="../js/script.js"></script>
<?php include "./footer.php" ?>
