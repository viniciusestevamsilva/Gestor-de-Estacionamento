<form action="../index.php" method="POST">
    <label for="user">NOME:</label>
    <input type="text" name="user_name" id="user" required>
    <label for="login">LOGIN:</label>
    <input type="text" name="user_login" id="login" required>
    <label for="pass">SENHA:</label>
    <input type="password" name="password" id="pass" required>
    <label for="new_pass">CONFIRMAR SENHA:</label>
    <input type="password" name="new_password" id="new_pass" required>
    <button type="submit" id="cadastrar">CADASTRAR</button>
    <a href="./redefinir.php">Esqueci minha senha</a>
</form>

<script>
    document.getElementById("cadastrar").onclick = async () =>{
        const nome = document.getElementById("user").value;
        const login = document.getElementById("login").value;
        const senha = document.getElementById("pass").value;

        await fetch("../api/usuario/criar.php",{
            method: "POST",
            body: JSON.stringify({
                nome, login, senha
            })
        });
    }
</script>

<a href="../index.php">Voltar</a>