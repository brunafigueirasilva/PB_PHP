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

    case 'produto/telaEditar':
        $ProdutoController->telaEditar();
        break;

    case 'produto/atualizar': 
        $ProdutoController->atualizar();
        break;

    case 'produto/excluir':
        $ProdutoController->excluir();
        break;

    default:
        echo "Página não Encontrada!";
        break;
}
