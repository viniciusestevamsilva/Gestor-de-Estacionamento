<?php
header("Content-Type: application/json");
include '../conexao.php';

$data = json_decode(file_get_contents("php://input"));
$id = isset($data->id) ? intval($data->id) : 0;

if ($id > 0) {
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
    $ok = $stmt->execute([$id]);

    echo json_encode([
        "mensagem" => $ok ? "Usuário excluído com sucesso." : "Erro ao excluir o usuário."
    ]);
} else {
    echo json_encode(["erro" => "ID inválido."]);
}
?>
