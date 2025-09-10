<?php include "./header.php" ?>

<form action="../index.php" method="POST">
    <label for="user">NOME DO CLIENTE:</label>
    <input type="text" name="user_name" id="user" required>
    <label for="number">NÚMERO DE CONTATO:</label>
    <input type="text" name="user_number" id="number" required>
    <label for="nascimento">ANO DE NASCIMENTO:</label>
    <input type="number" name="user_nascimento" id="nascimento" min="1900" required>
</form>

<script>
    document.getElementById("cadastrar").onclick = async () =>{
        const nome = document.getElementById("user").value;
        const numero = document.getElementById("number").value;
        const ano = document.getElementById("nascimento").value;

        await fetch("../api/usuario/criar.php",{
            method: "POST",
            body: JSON.stringify({
                nome, numero, ano
            })
        });
    }
</script>