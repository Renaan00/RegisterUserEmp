<?php

header("Access-Control-Allow-Origin:*");
header("Content-type: application/json");

require "./Models/Crud.php";

$fase = new Crud;

$fase->nome = $_POST['nome'];
$fase->senha = $_POST['senha'];

$fase->getNivel();

echo json_encode($fase);