<?php
header("Content-Type: application/json");
include("../conexao/conexao.php");

$dados = json_decode(file_get_contents("php://input"), true);

$id = (int)$dados["id"];

// Verifica se o ID foi enviado
if (!$id) {
    echo json_encode(["status" => "erro", "mensagem" => "ID inválido"]);
    exit;
}

// Essas exclusões manuais devem ser usadas apenas se o banco NÃO tiver ON DELETE CASCADE
// Primeiro, exclui as ocupações dos veículos do usuário
// $conn->query("DELETE FROM tb_ocupacao WHERE id_veiculo IN (SELECT id FROM tb_veiculo WHERE id_usuario = $id)");
// Depois, exclui os veículos do usuário
// $conn->query("DELETE FROM tb_veiculo WHERE id_usuario = $id");

$sql = "DELETE FROM tb_usuario WHERE id = $id";
$conn->query($sql);

echo json_encode(["status" => "ok"]);
?>