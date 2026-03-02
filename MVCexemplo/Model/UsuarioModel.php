<?php

class Usuario{
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

    public static function buscar($id) {
        // Retorna a edição de um usuario
        // Select * from usuario where id= $id;
        return $_SESSION['usuarios'] [$id] ?? null;
    }

    public function atualizar($id){
        if(isset($_SESSION['usuarios'][$id])) { // Verificar se o usuário existe
            $_SESSION['usuarios'][$id] = [ // Atualiza os novos dados
                'nome' => $this->nome,
                'email' => $this->email
            ];
        }
    }

    public static function excluir($id){
        if(isset($_SESSION['usuarios'][$id])){ // Verificar se o usuário existe
            unset($_SESSION['usuarios'][$id]); // Remove o usuário
        }
    }
}

