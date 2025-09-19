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

$sql1 = "SELECT id FROM tb_veiculo WHERE placa = '$placa'";
$res = $conn->query($sql1);
// echo json_encode($res);

$row = $res->fetch_assoc();
$id_veiculo = $row['id'];

// // $conn->query($sql2);

$sql3 = "UPDATE tb_vaga SET situacao = 0 WHERE id = $vaga";
$conn->query($sql3);

//
// B.O
$sql2 = "INSERT INTO tb_ocupacao(id_vaga, id_veiculo) VALUES ('$vaga', '$id_veiculo')";
$conn->query($sql2);
//=============================================================================

echo json_encode(["id" => $conn->insert_id, "id_usuario" => $id_usuario, "placa" => $placa, "cor" => $cor,]);
?>