<?php

class Produto {
    private $nome;
    private $descricao;
    private $quantidade;
    private $data;

    public function __construct($nome, $descricao, $quantidade, $data) {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->quantidade = $quantidade;
        $this->data = $data;
    }

    public function Salvar() {
        if(!isset ($_SESSION['produtos'])){
            $_SESSION['produtos'] = [];
        }

        $_SESSION['produtos'][] = [
            'nome' => $this->nome,
            'descricao' =>$this->descricao,
            'quantidade' =>$this->quantidade,
            'data' =>$this->data
        ];
    }

    public static function listar () {
        // Retorna a lista de produtos
        return $_SESSION['produtos'] ?? [];
    }

    public static function buscar($id) {
        // Retorna a edição de um usuario
        // Select * from usuario where id= $id;
        return $_SESSION['produtos'] [$id] ?? null;
    }

    public function atualizar($id){
        if(isset($_SESSION['produtos'][$id])) {// Verificar se o usuário existe
        $_SESSION['produtos'][$id] = [ // Atualiza os novos dados
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'quantidade' => $this->quantidade,
            'data' => $this->data
        ];
    }
}

    public static function excluir($id){
        if(isset($_SESSION['produtos'][$id])) {
            unset($_SESSION['produtos'][$id]);
        }
    }

}