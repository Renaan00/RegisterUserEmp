<?php

header("Access-Control-Allow-Origin:*");
header("Content-type: application/json");

require "Connection.php";

$id = (int)$_GET['id'];
if(isset($id) && !empty($id)){
    $sqlMod = $conn->query("DELETE cadastro, modulo FROM cadastro INNER JOIN modulo 
    ON cadastro.id_user = modulo.fk_user WHERE cadastro.id_user = '$id'");
    $sqlCad = $conn->query("DELETE FROM cadastro WHERE id_user = '$id'");
    if($sqlMod && $sqlCad) {
        $result = true;
    }
    else {
        $result = false;
    }     
} 
else {
    $result = false;
}
echo json_encode(["sucess"=> $result]);