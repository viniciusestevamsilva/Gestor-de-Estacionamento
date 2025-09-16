<?php
header("Content-Type: application/json");

include("../conexao/conexao.php");
// include $_SERVER['DOCUMENT_ROOT'] . '/conexao/conexao.php';
$dados = json_decode(file_get_contents("php://input"), true);

$id = (int)$dados["id"];

$sql = "UPDATE tb_ocupacao SET hora_saida = CURRENT_TIMESTAMP WHERE id = $id;";
$conn->query($sql);

echo json_encode(["status" => "ok"]);
?>