<?php
header("Content-Type: application/json");

include("../../conexao/conexao.php");
// include $_SERVER['DOCUMENT_ROOT'] . '/conexao/conexao.php';

$sql = "SELECT * FROM tb_usuario;";

$result = $conn->query($sql);

$usuarios = [];

while($row = $result->fetch_assoc()) {
    $usuarios[] = $row;
    // echo $usuarios;
}

echo json_encode($usuarios);
?>