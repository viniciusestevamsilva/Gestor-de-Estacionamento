<?php
header("Content-Type: application/json");

include("../../conexao/conexao.php");
// include $_SERVER['DOCUMENT_ROOT'] . '/conexao/conexao.php';

// $sql = "SELECT tb_ocupacao.id, situacao, setor, numero, nome, placa, hora_entrada, hora_saida, valor, tb_vaga.id
// FROM tb_ocupacao
// JOIN tb_veiculo ON tb_ocupacao.id_veiculo = tb_veiculo.id
// JOIN tb_vaga ON tb_ocupacao.id_vaga = tb_vaga.id
// JOIN tb_usuario ON tb_veiculo.id_usuario = tb_usuario.id;";
$sql = "SELECT tb_ocupacao.id, tb_vaga.id as vaga, situacao, setor, numero, nome, placa, hora_entrada, hora_saida, valor FROM tb_ocupacao JOIN tb_veiculo ON tb_ocupacao.id_veiculo = tb_veiculo.id JOIN tb_vaga ON tb_ocupacao.id_vaga = tb_vaga.id JOIN tb_cliente ON tb_veiculo.id_usuario = tb_cliente.id;";

$result = $conn->query($sql);

$vagas = [];

while($row = $result->fetch_assoc()) {
    $vagas[] = $row;
    // echo $vagas;
}

echo json_encode($vagas);
?>