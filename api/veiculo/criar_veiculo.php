<?php
header("Content-Type: application/json");

include("../../conexao/conexao.php");
// include $_SERVER['DOCUMENT_ROOT'] . '/conexao/conexao.php';


$dados = json_decode(file_get_contents("php://input"), true);

$id_usuario = $conn->real_escape_string($dados["id_usuario"]);
$placa = $conn->real_escape_string($dados["placa"]);
$cor = $conn->real_escape_string($dados["cor"]);
$vaga = $conn->real_escape_string($dados["vaga"]);



$sql = "INSERT INTO tb_veiculo (id_usuario, placa, cor) VALUES ('$id_usuario', '$placa', '$cor')";
$conn->query($sql);

$id_veiculo = $conn->insert_id;

// $sql3 = "SELECT id FROM tb_veiculo WHERE placa = $placa";

$sql1 = "INSERT INTO tb_ocupacao(id_vaga, id_veiculo) VALUES ('$vaga', '$id_veiculo')";

$sql2 = "UPDATE tb_vaga SET situacao = 0 WHERE id = $vaga";



$conn->query($sql1);
$conn->query($sql2);


echo json_encode(["id" => $conn->insert_id, "id_usuario" => $id_usuario, "placa" => $placa, "cor" => $cor,]);
?>