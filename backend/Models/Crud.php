<?php 

require "Connection.php";

class Crud
{
    public $id;
    public $nome;
    public $email;
    public $senha;

    public function getAll()
    {
        if ($nome != "" && $email != "" && $senha != "") {
            $connection = Connection::getDb();

            $stmt = $connection->query("INSERT INTO cadastro (nome, email, senha) 
            values ('$this->nome','$this->email', '$this->senha')");

            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
        else {
            return false;
        }
        
    }
    public function getEntrar()
    {
        $connection = Connection::getDb();

        $stmt = $connection->query("SELECT id_user, nome, senha FROM cadastro 
        WHERE nome='$this->nome' AND senha='$this->senha'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);   
    }
    public function getNivel()
    {
        $connection = Connection::getDb();

        $stmt =  $connection->query("SELECT id_user AS id, id_modulo AS fase FROM cadastro AS c INNER JOIN modulo AS m
        ON c.id_user = m.fk_user WHERE c.nome='$this->nome' AND c.senha='$this->senha'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getRemover()
    {
        $connection = Connection::getDb();

        $stmt = $connection->query("DELETE cadastro, modulo FROM cadastro INNER JOIN modulo 
        ON cadastro.id_user = modulo.fk_user WHERE cadastro.id_user = $this->id");

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function getAtualizar()
    {
        $connection = Connection::getDb();

        $stmt = $connection->query("UPDATE cadastro SET nome='$this->nome', 
        email='$this->email', senha='$this->senha' WHERE id_user=$this->id;");

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
} 