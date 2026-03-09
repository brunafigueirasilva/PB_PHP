<?php

require_once "Controller/LivroController.php";

$livroController = new LivroController();
$route = $_GET["route"] ??'';

switch ($route) {
    case 'livro/telaCadastro':
        $livroController ->telaCadastro();
        break;

    case 'livro/Salvar':
        $livroController ->cadastrar();
        break;

    case 'livro/listar':
        $livroController ->listarLivros();
        break;

    case 'livro/telaEditar':
        $livroController->telaEditar();
        break;

    case 'livro/atualizar':
        $livroController ->atualizar();
        break;
    
    case 'livro/excluir':
        $livroController->excluir();
        break;

    default:
        echo "Página não encontrada!";
        break;
}