<?php
header("Content-Type: application/json");

include("../../conexao/conexao.php");
// include $_SERVER['DOCUMENT_ROOT'] . '/conexao/conexao.php';


$dados = json_decode(file_get_contents("php://input"), true);

$nome = $conn->real_escape_string($dados["nome"]);
$login = $conn->real_escape_string($dados["login"]);
$senha = $conn->real_escape_string($dados["senha"]);

$sql = "INSERT INTO tb_usuario (nome, login, senha) VALUES ('$nome', '$login', '$senha')";

$conn->query($sql);


echo json_encode(["id" => $conn->insert_id, "nome" => $nome, "login" => $login, "senha" => $senha]);
?>