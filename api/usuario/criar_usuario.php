<?php
header("Content-Type: application/json");

include("../../conexao/conexao.php");
// include $_SERVER['DOCUMENT_ROOT'] . '/conexao/conexao.php';

$dados = json_decode(file_get_contents("php://input"), true);

$nome = $conn->real_escape_string($dados["nome"]);
$telefone = $conn->real_escape_string($dados["numero"]);
$ano = $conn->real_escape_string($dados["ano"]);

$sql = "INSERT INTO tb_cliente (nome, telefone, ano_nasc) VALUES ('$nome', '$telefone', '$ano')";

$conn->query($sql);

echo json_encode(["id" => $conn->insert_id, "nome" => $nome, "telefone" => $telefone, "ano_nasc" => $ano]);
?>