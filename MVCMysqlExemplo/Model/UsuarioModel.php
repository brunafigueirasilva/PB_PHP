<?php

require_once "./database/database.php";

class Usuario{
    private $nome;
    private $email;

    public function __construct($nome, $email) {
        $this->nome = $nome;
        $this->email = $email;
    }

    public function Salvar() {
        $pdo = Database::conectar();
        $sql = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nome'=> $this->nome, 'email'=> $this->email]);
    }

    public static function listar() {
        $pdo = Database::conectar();
        $stmt = $pdo->query("SELECT * FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscar($id) {
        $pdo = Database::conectar();
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->execute(['id'=>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id){
        $pdo = Database::conectar();
        $stmt = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email WHERE id= :id");
        $stmt->execute(['id'=>$id, 'nome'=> $this->nome, 'email'=> $this->email]);
    }

    public static function excluir($id){
       $pdo = Database::conectar();
       $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
       $stmt->execute(['id'=> $id]);
    }
}

