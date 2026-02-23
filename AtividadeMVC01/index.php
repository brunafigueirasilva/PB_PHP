<?php //Início do PHP

require_once "Controller/produtoController.php"; //Criando o usuário

$ProdutoController = new produtoController(); //Criando uma classe
$route = $_GET["route"] ?? '';

switch ($route) {
    case 'produto/telaRegistro':
        $ProdutoController -> telaRegistro(); //Função tela cadastro
        break;

    case 'produto/Salvar':
        $ProdutoController -> registrar();
        break;

    case 'produto/listar':
        $ProdutoController-> listarProdutos ();
        break;

    default:
        echo "Página não Encontrada!";
        break;
}
