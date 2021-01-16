<?php

$conn = new PDO("mysql:host=localhost;dbname=emp;charset=utf8", "root", "");

if($conn){
    return $conn;
} else {
    echo "<h1>Erro ao realizar a conexão!</h1>";
}  