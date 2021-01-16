<?php

header("Access-Control-Allow-Origin:*");
header("Content-type: application/json");

require "./Models/Crud.php";

$alterar = new Crud;

$alterar->id = $_POST['id'];
$alterar->nome = $_POST['nome'];
$alterar->email = $_POST['email'];
$alterar->senha = $_POST['senha'];

$verifica = $alterar->getAtualizar();

if ($verifica == true) {
    echo json_encode(true);
} else {
    echo json_encode(false);
}


