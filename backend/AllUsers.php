<?php

header("Access-Control-Allow-Origin:*");
header("Content-type: application/json");

require "Connection.php";

$sql = $conn->query("SELECT * FROM cadastro");
if ($sql->rowCount() > 0) {
    $allUsers = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(["sucess"=>true, "users"=>$allUsers]);
}
else {
    echo json_encode(["sucess"=>false]);
}

