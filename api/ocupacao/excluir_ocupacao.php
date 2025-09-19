<?php
include '../../conexao/conexao.php';

$data = json_decode(file_get_contents("php://input"));

if (isset($data->id)) {
    $id = $data->id;

    $sql = "DELETE FROM tb_ocupacao WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        http_response_code(200);
        echo json_encode(["mensagem" => "Excluído com sucesso"]);
    } else {
        http_response_code(500);
        echo json_encode(["mensagem" => "Erro ao excluir"]);
    }
} else {
    http_response_code(400);
    echo json_encode(["mensagem" => "ID não informado"]);
}
?>
