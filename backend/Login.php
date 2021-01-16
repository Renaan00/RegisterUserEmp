<?php

header("Access-Control-Allow-Origin:*");
header("Content-type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data["nome"]) && !empty($data["nome"]) && isset($data["senha"]) && !empty($data["senha"])) {
    require "Connection.php";
    $nome = $data["nome"];
    $senha = $data["senha"];
    $sql = $conn->query("SELECT * FROM cadastro WHERE nome = '$nome' AND senha = '$senha'");
    if ($sql->rowCount() > 0) {
        $getUser = $sql->fetchAll(PDO::FETCH_ASSOC);
        $result = true;
    }
    else {
        $result = false;
    }
} 
else {
    $result = false;
}
echo json_encode(["sucess"=>$result]);