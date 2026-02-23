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
}