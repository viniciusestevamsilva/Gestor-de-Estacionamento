<?php
header("Content-Type: application/json");

include("../../conexao/conexao.php");
// include $_SERVER['DOCUMENT_ROOT'] . '/conexao/conexao.php';


$dados = json_decode(file_get_contents("php://input"), true);

$id_usuario = $conn->real_escape_string($dados["id_usuario"]);
$placa = $conn->real_escape_string($dados["placa"]);
$cor = $conn->real_escape_string($dados["cor"]);

$sql = "INSERT INTO tb_veiculo (id_usuario, placa, cor) VALUES ('$id_usuario', '$placa', '$cor')";

$conn->query($sql);


echo json_encode(["id" => $conn->insert_id, "id_usuario" => $id_usuario, "placa" => $placa, "cor" => $cor,]);
?>