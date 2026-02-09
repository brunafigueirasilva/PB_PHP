<?php
        session_start(); //Inicia ou retoma uma sessão

        class Usuario { // Declaração da classe Usuario
        // Atributos privados (só acessíveis dentro da classe)
        private $nome;
        private $email;
        private $senha;

        // Construtor da classe
        // O construtor DEVE ficar dentro da classe
        public function __construct($nome, $email, $senha){
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
        }

        public function salvar(){
            //Criar o array se ainda não existir
            if(!isset ($_SESSION['usuarios'])){
                $_SESSION['usuarios'] = [];
            }

            $_SESSION ['usuarios'][] = [
                'nome' => $this->nome,
                'email' => $this->email,
                'senha' => $this->senha
            ];
        }
    }

    // Verifica se o formulário foi enviado via método POST
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Captura os dados enviados pelo formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = new Usuario($nome, $email, $senha);
        $usuario->salvar();
    }

    if(isset ($_GET ['reset'])) {

    // Destrói a sessão (apaga o histórico)
    session_destroy();
    }

    //Exibir session
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário Revisão</title>
</head>

<body>

    <!-- Título do formulário -->
    <h2 style="color: darkblue; font-family: arial">Cadastro Usuário</h2>

    <!-- Formulário que envia dados via POST -->
    <form action="" method="POST" 
          style="background:#f2f2f2; padding:15px; border-radius:8px; width: 300px">

        <!-- Campos -->
        Nome: <br>
        <input type="text" name="nome" style="width: 100%; margin-bottom: 10px"><br>
        Email: <br>
        <input type="email" name="email" style="width: 100%; margin-bottom: 10px"><br>
        Senha: <br>
        <input type="password" name="senha" style="width: 100%; margin-bottom: 10px"><br>

        <!-- Botões -->
        <button type="submit" style="background: green; color: white; padding: 5px 10px;">
            Cadastrar
        </button>
        <button type="reset" style="background: red; color: white; padding: 5px 10px;">
            Limpar
        </button> 
    </form>
    <br>

    <?php if(isset($_SESSION ['usuarios'])): ?>

    <!-- Tabela de exemplo -->
    <table border="1" cellspacing="0">
        <thead> <!-- Cabeçalho da Tabela -->
            <tr> <!-- Linha da Tabela -->
                <th>Nome</th> 
                <th>Email</th>
                <th>Senha</th>
            </tr>
        </thead>
        <tbody> <!-- Corpo da Tabela -->
            <?php foreach ($_SESSION ['usuarios'] as $usuario): ?>
            <tr>
                <!-- Dados fixos apenas para exemplo -->
                <td><?= $usuario['nome']?></td>
                <td><?= $usuario['email']?></td>
                <td><?= $usuario['senha']?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?php endif; ?>

</body>
</html>