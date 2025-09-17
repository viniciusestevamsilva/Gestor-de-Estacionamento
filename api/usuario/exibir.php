<?php
header("Content-Type: application/json");

include("../../conexao/conexao.php");


$sql = "SELECT id, nome, telefone, ano_nasc FROM tb_cliente";
$result = $conn->query($sql);

$dados = [];

while($row = $result->fetch_assoc()) {
    $dados[] = $row;}

echo json_encode($dados);