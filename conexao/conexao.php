<?php
// Configurando toda a conexão com o banco
$host = "localhost";
$user = "root";
$pass = "";
$db = ""; // adicionar nome do banco

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connection_error) {
    die("Erro na conexão: " . $conn->connection_error);
}

?>