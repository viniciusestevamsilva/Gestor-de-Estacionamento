<?php
header("Content-Type: application/json");

include("../../conexao/conexao.php");

$dados = json_decode(file_get_contents("php://input"), true);

$nome = $conn->real_escape_string($dados["nome"] ?? '');
$numero = $conn->real_escape_string($dados["numero"] ?? '');
$ano = intval($dados["ano"] ?? 0);

$sql = "INSERT INTO tb_cliente (nome, telefone, ano_nasc) VALUES ('$nome', '$numero', $ano)";

if ($conn->query($sql)) {
    echo json_encode([
        "mensagem" => "Cliente cadastrado com sucesso!",
        "id" => $conn->insert_id,
        "nome" => $nome,
        "numero" => $numero,
        "ano" => $ano
    ]);
} else {
    echo json_encode([
        "erro" => "Erro ao inserir no banco: " . $conn->error
    ]);
}
?>

