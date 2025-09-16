<main class="container-form">
    
    <form action="public/inicial.php" method="POST" class="formulario">
        <label for="user"><strong>LOGIN:</strong></label>
        <input type="text" name="login" id="user" required>
        <label for="pass"><strong>SENHA:</strong></label>
        <input type="password" name="password" id="pass" required>
        <button type="submit"><strong>ENTRAR</strong></button>
    </form>
</main>

<head>
    <link rel="shortcut icon" href="img/estacionamento.ico" type="image/x-icon">
</head>
<img src="./img/parede-de-concreto.jpg" class="fundo-bk">

<?php include "public/header.php"?>

</body>
</html>