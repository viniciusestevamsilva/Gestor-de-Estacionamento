<?php include "./header.php" ?>

<form action="../index.php" method="POST" class='mini-formulario'>
    <label for="user">NOME DO CLIENTE:</label>
    <input type="text" name="user_name" id="user" required>
    <label for="number">NÚMERO DE CONTATO:</label>
    <input type="text" name="user_number" id="number" required>
    <label for="nascimento">ANO DE NASCIMENTO:</label>
    <input type="number" name="user_nascimento" id="nascimento" min="1900" required>
    <button type="button" id="cadastrar">CADASTRAR</button>
</form>

<script>
    document.getElementById("cadastrar").onclick = async () =>{
        const nome = document.getElementById("user").value;
        const telefone = document.getElementById("number").value;
        const ano = document.getElementById("nascimento").value;

        await fetch("../api/usuario/criar.php",{
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                nome, telefone, ano
            })
        });
    }
</script>