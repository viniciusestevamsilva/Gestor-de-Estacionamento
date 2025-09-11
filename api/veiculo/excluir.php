

<?php
header("Content-Type: application/json");
include("../../conexao/conexao.php");

$dados = json_decode(file_get_contents("php://input"), true);
$id = (int)$dados["id"];

if (!$id) {
    echo json_encode(["status" => "erro", "mensagem" => "ID inválido"]);
    exit;
}

$sql = "DELETE FROM tb_ocupacao WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "ok"]); // Se a exclusão foi bem-sucedida,
} else {
    echo json_encode(["status" => "erro", "mensagem" => "Erro ao excluir"]); // Se houve algum erro na exclusão
}
?>