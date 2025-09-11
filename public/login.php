<main class="container-form">

    <form action="public/inicial.php" method="POST"  class="formulario">
        <label for="user"><strong>Login:</strong></label>
        <input type="text" name="login" id="user" required>
        <label for="pass"><strong>Senha:</strong></label>
        <input type="password" name="password" id="pass" required>
        <button type="submit">Entrar</button>
        <a href="public/cadastro_usuario.php" class="btn">CADASTRE-SE</a>
        <a href="public/redefinir.php" class="btn">Esqueci minha senha</a>
    </form>
</main>