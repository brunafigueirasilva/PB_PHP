<?php

session_start(); //Banco de dados - Onde salva as informações

require_once "./Model/UsuarioModel.php";

class UsuarioController{

    public function telaCadastro(){
        require "View/usuarioCadastrar.php";
    }

    public function cadastrar() {
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $usuario = new Usuario($nome, $email);
        $usuario->Salvar();
        // Redirecionar depois de salvar
        header ('Location: /PB_PHP/MVCExemplo/usuario/telaCadastro');
        exit;
    }

    public function listarUsuarios(){
        $usuarios = Usuario::listar();
        echo "<pre>";
        print_r($usuarios);
        echo "</pre>";
        require 'View/usuarioListar.php';

    }

    public function telaEditar(){
        $usuario = Usuario ::buscar($_GET['id']);
        require 'View/usuarioEditar.php';
    }

    public function atualizar(){
        $usuario = new Usuario($_POST['nome'], $_POST['email']);
        $usuario->atualizar($_GET['id']);
        header ('Location: /PB_PHP/MVCExemplo/usuario/telaEditar?id= '.($_GET['id']));
        exit;
    }

    public function excluir(){
        Usuario::excluir($_GET['id']);
        header ('Location: /PB_PHP/MVCExemplo/usuario/listar');
        exit;
    }
}

?>