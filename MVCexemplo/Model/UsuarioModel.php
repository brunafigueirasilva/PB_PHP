<?php

class Usuario {
    private $nome;
    private $email;

    public function __construct($nome, $email) {
        $this->nome = $nome;
        $this->email = $email;
    }

    public function Salvar() {
        if(!isset ($_SESSION['usuarios'])){
            $_SESSION['usuarios'] = [];
        }

        $_SESSION['usuarios'][] = [
            'nome' => $this->nome,
            'email' =>$this->email
        ];
    }

    public static function listar() {
        // Retorna a lista de usuários
        return $_SESSION['usuarios'] ?? [];
    }
}