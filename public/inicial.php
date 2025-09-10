<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="shortcut icon" href="../img/estacionamento.ico" type="image/x-icon">

    <title>DILEVI Parking</title>
</head>
<body>

    <img src="../img/90743.jpg" class="fundo-bk">

    <?php include "./header.php" ?>
    <a href="../index.php">SAIR</a>
    <br>
    <h2>Lista de Ocupações</h2>
    <br>
    <ul id="listaTarefas"></ul>

    <script>
        document.addEventListener("DOMContentLoaded", carregarTarefas);

        async function carregarTarefas() {
            try {
                const resposta = await fetch("../api/veiculo/exibir.php");
                if (!resposta.ok) throw new Error("Erro ao carregar dados");

                const tarefas = await resposta.json();

                console.log("Dados recebidos:", tarefas); // debug

                const lista = document.getElementById("listaTarefas");
                lista.innerHTML = "";

                tarefas.forEach(t => {
                    const li = document.createElement("li");

                    li.textContent = `Ocupação ID: ${t.id} | Vaga ID: ${t.id_vaga} | Veículo ID: ${t.id_veiculo} | Entrada: ${t.hora_entrada} | Saída: ${t.hora_saida || "Ainda não saiu"} | Valor: R$${t.valor || "0,00"}`;

                    lista.appendChild(li);
                });
            } catch (error) {
                console.error("Erro:", error);
                alert("Não foi possível carregar os dados.");
            }
        }
    </script>
    <?php include "./footer.php" ?>
</body>
