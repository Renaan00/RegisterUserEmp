<?php

header("Access-Control-Allow-Origin:*");
header("Content-type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data["nomeLog"]) && !empty($data["nomeLog"]) && isset($data["senhaLog"]) && !empty($data["senhaLog"])) {
    require "Connection.php";
    $nome = $data["nomeLog"];
    $senha = $data["senhaLog"];
    $sql = $conn->query("SELECT * FROM cadastro WHERE nome = '$nome' AND senha = '$senha'");
    if ($sql->rowCount() > 0) {
        $getUser = $sql->fetchAll(PDO::FETCH_ASSOC)[0];
        $id = $getUser["id_user"];
        $result = true;
    }
    else {
        $result = false;
    }
} 
else {
    $result = false;
}
echo json_encode(["sucess"=>$result, "id"=>$id]);
