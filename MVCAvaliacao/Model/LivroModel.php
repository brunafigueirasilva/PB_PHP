<?php

require_once "./database/database.php";

class Livro{
    private $titulo;
    private $autor;
    private $ano_publicacao;
    private $editora;

    public function __construct($titulo, $autor, $ano_publicacao, $editora) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->ano_publicacao = $ano_publicacao;
        $this->editora = $editora;
    }

    public function Salvar() {
        $pdo = Database::conectar();
        $sql = "INSERT INTO livros (titulo, autor, ano, editora) VALUES (:titulo, :autor, :ano, :editora)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['titulo'=> $this->titulo, 'autor' => $this->autor, 'ano' => $this->ano_publicacao, 'editora' => $this->editora]);

    }

    public static function listar() {
        $pdo = Database::conectar();
        $stmt = $pdo->query("SELECT * FROM livros");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscar ($id) {
        $pdo = Database::conectar();
        $stmt = $pdo->prepare("SELECT * FROM livros WHERE id = :id");
        $stmt->execute(['id'=>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar ($id) {
        $pdo = Database::conectar();
        $stmt = $pdo->prepare("UPDATE livros SET titulo = :titulo, autor = :autor, ano = :ano, editora = :editora WHERE id= :id");
        $stmt->execute(['id'=>$id, 'titulo'=> $this->titulo, 'autor'=> $this->autor, 'ano'=> $this->ano_publicacao,'editora'=> $this->editora]);
    }

    public static function excluir ($id) {
    $pdo = Database::conectar();
       $stmt = $pdo->prepare("DELETE FROM livros WHERE id = :id");
       $stmt->execute(['id'=> $id]);
    }
}