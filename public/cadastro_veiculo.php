<?php include "./header.php" ?>

<main class="container-form">
    <form action="../index.php" method="POST" class='formulario'>
        <label for="number">ID DO CLIENTE:</label>
        <input type="number" name="cliente" id="id_cliente" required>
        <label for="number">PLACA DO VEÍCULO:</label>
        <input type="text" name="placa" id="num_placa" required>
        <label for="nascimento">COR DO VEÍCULO:</label>
        <input type="text" name="cor" id="nome_cor">
        <button type="submit" id="cadastrar">CADASTRAR</button>
    </form>
</main>

<script>
    document.getElementById("cadastrar").onclick = async () =>{
        const nome = document.getElementById("user").value;
        const numero = document.getElementById("number").value;
        const ano = document.getElementById("nascimento").value;

        await fetch("../api/veiculo/criar.php",{
            method: "POST",
            body: JSON.stringify({
                nome, numero, ano
            })
        });
    }
</script>