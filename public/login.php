<main class="container-form">

    <form action="public/inicial.php" method="POST"  class="formulario">
        <label for="user">LOGIN:</label>
        <input type="text" name="login" id="user" required>
        <label for="pass">SENHA:</label>
        <input type="password" name="password" id="pass" required>
        <button type="submit">ENTRAR</button>
        <a href="public/cadastro_usuario.php">CADASTRE-SE</a>
        <a href="public/redefinir.php">Esqueci minha senha</a>
    </form>
</main>