<?php include "./header.php" ?>

<div class="ajustes-header-footer">

    <main>
        <img src="../img/parede-de-concreto.jpg" class='fundo-bk'>

        <div class="botoes-container">

            <a href="cadastro_usuario.php">CADASTRO DE USUÁRIO</a>
            <a href="cadastro_veiculo.php">CADASTRO DE VEÍCULO</a>
            <a href="../index.php" id="btn-saida">VOLTAR</a>

        </div>

        <table  id="tabelaTarefas">
            <thead>
                <tr>
                    <th>Situação</th>
                    <th>Setor</th>
                    <th>Número</th>
                    <th>Nome</th>
                    <th>Placa</th>
                    <th>Cor</th>
                    <th>Hora de Entrada</th>
                    <th>Hora de Saída</th>
                    <th>Valor(R$)</th>
                    <th>Adicionar Saída</th>
                    <th>&#9888;&#65039; Deletar vaga &#9888;&#65039;</th>
                </tr>
            </thead>
            <tbody id="ocupacao"></tbody>
        </table>

    </main>

    <?php include "./footer.php" ?>
</div>

<script src="../js/script.js"></script>