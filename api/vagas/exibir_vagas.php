<?php 
header("Content-Type: application/json");

include("../../conexao/conexao.php");

$sql = "SELECT * FROM tb_vaga";

$resultado = $conn->query($sql);

$dados = [];

while($row = $resultado->fetch_assoc()){
    $dados[] = $row;
}

echo json_encode($dados);
?>