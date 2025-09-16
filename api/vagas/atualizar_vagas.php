<?php
header("Content-Type: application/json");

include("../../conexao/conexao.php");
// include $_SERVER['DOCUMENT_ROOT'] . '/conexao/conexao.php';
$dados = json_decode(file_get_contents("php://input"), true);

$id = (int)$dados["id"];
$vaga = (int)$dados["id_vaga"];
$situacao = (int)$dados["situacao"];

// Adicionando dois comando para que a atualização acontece simultaneamente no banco
$sql = "UPDATE tb_ocupacao SET hora_saida = CURRENT_TIMESTAMP WHERE id = $id";
$sql1 = "UPDATE tb_vaga SET situacao = $situacao WHERE id = $vaga";

$conn->query($sql);
$conn->query($sql1);

echo json_encode(["status" => "ok"]);
?>