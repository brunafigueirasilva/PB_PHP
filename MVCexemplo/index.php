<?php //Início do PHP

require_once "Controller/UsuarioController.php"; //Criando o usuário

$usuarioController = new UsuarioController(); //Criando uma classe
$route = $_GET["route"] ?? '';

switch ($route) {
    case 'usuario/telaCadastro':
        $usuarioController -> telaCadastro(); //Função tela cadastro
        break;

    case 'usuario/Salvar':
        $usuarioController -> cadastrar();
        break;

    case 'usuario/listar':
        $usuarioController->listarUsuarios();
        break;

    case 'usuario/telaEditar':
        $usuarioController->telaEditar();
        break;

    case 'usuario/atualizar': 
        $usuarioController->atualizar();
        break;

    default:
        echo "Página não Encontrada!";
        break;
}


