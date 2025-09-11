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
    <a href="../index.php" id="btn-saida">SAIR</a>

    <table id="tabelaTarefas">
        <thead>
            <tr>
                <th>Ocupação ID</th>
                <th>Vaga ID</th>
                <th>Veículo ID</th>
                <th>Entrada</th>
                <th>Saída</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script>
        document.addEventListener("DOMContentLoaded", carregarTarefas);

        async function carregarTarefas() {
            try {
                const resposta = await fetch("../api/veiculo/exibir.php");
                if (!resposta.ok) throw new Error("Erro ao carregar dados");

                const tarefas = await resposta.json();
                const tabela = document.querySelector("#tabelaTarefas tbody");
                tabela.innerHTML = "";

                tarefas.forEach(t => {
                    const row = tabela.insertRow();

                    row.insertCell().textContent = t.id;
                    row.insertCell().textContent = t.id_vaga;
                    row.insertCell().textContent = t.id_veiculo;
                    row.insertCell().textContent = t.hora_entrada;
                    row.insertCell().textContent = t.hora_saida || "Ainda não saiu";
                    row.insertCell().textContent = `R$${t.valor || "0,00"}`;

                    // Coluna de ações
                    const acaoCell = row.insertCell();
                    const btnExcluir = document.createElement("button");
                    btnExcluir.textContent = "Excluir";
                    btnExcluir.classList.add("btn-excluir");
                    btnExcluir.onclick = () => excluirOcupacao(t.id);
                    acaoCell.appendChild(btnExcluir);
                });
            } catch (error) {
                console.error("Erro:", error);
                alert("Não foi possível carregar os dados.");
            }
        }

        async function excluirOcupacao(id) {
            if (!confirm("Tem certeza que deseja excluir esta ocupação?")) return;

            try {
                const resposta = await fetch("../api/veiculo/excluir.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({ id })
                });

                const resultado = await resposta.json();

                if (resultado.status === "ok") {
                    alert("Ocupação excluída com sucesso!");
                    carregarTarefas();
                } else {
                    alert("Erro ao excluir: " + (resultado.mensagem || "Desconhecido"));
                }
            } catch (error) {
                console.error("Erro:", error);
                alert("Não foi possível excluir a ocupação.");
            }
        }
    </script>

    <?php include "./footer.php" ?>
    
</body>
</html>