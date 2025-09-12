<?php include "./header.php" ?>


<main class="container-form">
    <img src="../img/parede-de-concreto.jpg" class="fundo-bk">
    <form action="../index.php" method="POST" class="formulario">
  
        <label for="user">NOME DO CLIENTE:</label>
        <input type="text" name="user_name" id="user" required>
        <label for="number">NÚMERO DE CONTATO:</label>
        <input type="text" name="user_number" id="number" required>
        <label for="nascimento">ANO DE NASCIMENTO:</label>
        <input type="date" name="user_nascimento" id="nascimento" min="1900" required>
        <button type="submit" id="cadastrar">CADASTRAR</button>

    </form>
    
</main>

<table  id='tabelaTarefas'>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Número Contato</th>
            <th>Ano de Nascimento</th>
        </tr>
    </thead>
    <tbody id="vagas"></tbody>
</table>

<script src="../js/script.js"></script>
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