<?php

header("Access-Control-Allow-Origin:*");
header("Content-type: application/json");

require "Connection.php";

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data["nome"]) && !empty($data["email"]) && !empty($data["senha"])) {
    $nome = $data["nome"];
    $email = $data["email"];
    $senha = $data["senha"];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = $conn->query("INSERT INTO cadastro (nome, email, senha) values ('$nome','$email', '$senha')");
        if ($sql) {
            $result = true;
        }
        else {
            $result = false;
        }
    } 
    else {
        $result = false;
    }
} 
else {
    $result = false;
}

echo json_encode(["sucess"=>$result]);

//------------------------------------------

/* $_POST = json_decode(file_get_contents("php://input"), true);

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if ($nome != "" && $email != "" && $senha != "") {
    $connection = Connection::getDb();
    if ($_POST == NULL) {
        $result = "";
    } 
    else {
        $stmt = $connection->query("INSERT INTO cadastro (nome, email, senha) values ('$nome','$email', '$senha')");
    }
    if ($_POST == TRUE) {
        $result = "Dados enviados";
    } 
    else {
        $result = "Falha ao enviar";
    }
} else {
    $result = "Falha ao enviar";
}

echo json_encode($result);
*/
