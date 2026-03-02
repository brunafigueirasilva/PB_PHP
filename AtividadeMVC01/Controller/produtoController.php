<?php

session_start(); //Banco de dados - Onde salva as informações

require_once "./Model/ProdutoModel.php";

class ProdutoController{

    public function telaRegistro(){
        require "View/registroProdutos.php";
    }

    public function registrar() {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $quantidade = $_POST['quantidade'];
        $data = $_POST['data'];

        $produto = new Produto($nome, $descricao, $quantidade, $data);
        $produto ->Salvar();
        // Redirecionar depois de salvar
        header ('Location: /PB_PHP/AtividadeMVC01/produto/telaRegistro');
        exit;
    }

    public function listarProdutos(){
        $produtos = Produto::listar();
        echo "<pre>";
        print_r($produtos);
        echo "</pre>";
        require 'View/produtosListar.php';
    }

    public function telaEditar(){
        $produto = Produto ::buscar($_GET['id']);
        require 'View/produtoEditar.php';
    }

    public function atualizar(){
        $produto = new Produto($_POST['nome'], $_POST['descricao'], $_POST['quantidade'], $_POST['data']);
        $produto->atualizar($_GET['id']);
        header ('Location: /PB_PHP/AtividadeMVC01/produto/telaEditar?id='.($_GET['id']));
        exit;
    }

    public function excluir(){
        Produto::excluir($_GET['id']);
        header ('Location: /PB_PHP/AtividadeMVC01/produto/listar');
        exit;
    }
}
