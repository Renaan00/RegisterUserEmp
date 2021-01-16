<?php

header("Access-Control-Allow-Origin:*");
header("Content-type: application/json");

require "./Models/Crud.php";

$apagar = new Crud;

$apagar->id = $_POST['id'];

$verifica = $apagar->getRemover();

if ($verifica == true) {
    echo json_encode(true);
} else {
    echo json_encode(false);
}