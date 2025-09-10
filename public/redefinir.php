<?php include "./header.php" ?>

<form action="../index.php" method="POST">
    <label for="user">USUÁRIO:</label>
    <input type="text" name="login" id="user" required>
    <label for="pass">NOVA SENHA:</label>
    <input type="password" name="password" id="pass" required>
    <label for="new_pass">CONFIRMAR NOVA SENHA:</label>
    <input type="password" name="password" id="new_pass" required>
    <button type="submit">REDEFINIR</button>
    <a href="./cadastro_usuario.php">CADASTRE-SE</a>
</form>

<a href="../index.php">Voltar</a>

