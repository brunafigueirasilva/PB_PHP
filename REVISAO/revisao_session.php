<?php
        session_start(); //Inicia ou retoma uma sessão

// Função para calcular idade     
function calcularIdade($data) {
    $dataNascimento = new DateTime($data);
    $idadeatual = new DateTime();
    return $idadeatual->diff($dataNascimento)->y;
}

function calcularMedia($alunos) {
    $soma = 0;
    $quantidade = 0;

    foreach ($alunos as $aluno){
        $soma = $soma + intval( $aluno['nota']);
        $quantidade++;
    }
    

    $media = $soma / $quantidade;
    
    // Retorna o valor calculado
    return $media;

}

        class Aluno { // Declaração da classe Aluno
        // Atributos privados (só acessíveis dentro da classe)
        private $nome;
        private $sobrenome;
        private $nota;
        private $data;
        private $idade;

        // Construtor da classe
        // O construtor DEVE ficar dentro da classe
        public function __construct($nome, $sobrenome, $nota, $data){
            $this->nome = $nome;
            $this->sobrenome = $sobrenome;
            $this->nota = $nota;
            $this->data = $data;
            $this->idade = calcularIdade($data);

        }

        public function salvar(){
            //Criar o array se ainda não existir
            if(!isset ($_SESSION['alunos'])){
                $_SESSION['alunos'] = [];   
            }

            $_SESSION ['alunos'][] = [
                'nome' => $this->nome,
                'sobrenome' => $this->sobrenome,
                'nota' => $this->nota,
                'data' => $this->data,
                'idade' => $this->idade
            ];
        }
    }

    // Verifica se o formulário foi enviado via método POST
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Captura os dados enviados pelo formulário
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $nota = $_POST['nota'];
        $data = $_POST['data'];

        $aluno= new Aluno($nome, $sobrenome, $nota, $data);
        $aluno->salvar();
    }

    if(isset ($_GET ['reset'])) {

    // Destrói a sessão (apaga o histórico)
    session_destroy();
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário Revisão</title>
</head>

<body>

    <!-- Título do formulário -->
    <h2>Cadastro de Alunos</h2>

    <!-- Formulário que envia dados via POST -->
    <form action="" method="POST" 
          style="padding:15px; border-radius:8px; width: 300px">

        <!-- Campos -->
        Nome: <br>
        <input type="text" name="nome" style="width: 100%; margin-bottom: 10px"><br>
        Sobrenome: <br>
        <input type="text" name="sobrenome" style="width: 100%; margin-bottom: 10px"><br>
        Nota: <br>
        <input type="number" name="nota" style="width: 100%; margin-bottom: 10px"><br>
        Data Nascimento: <br>
        <input type="date" name="data" style="width: 100%; margin-bottom: 10px"><br>

        <!-- Botões -->
        <button type="submit" style="padding: 5px 10px;">
            Cadastrar
        </button>
        <button type="reset" style="padding: 5px 10px;">
            Limpar
        </button> 
    </form>
    <br>

    <?php if(isset($_SESSION ['alunos'])): ?>

    <!-- Tabela de exemplo -->
    <table border="1" cellspacing="0">
        <thead> <!-- Cabeçalho da Tabela -->
            <tr> <!-- Linha da Tabela -->
                <th>Nome</th> 
                <th>Sobrenome</th>
                <th>Nota</th>
                <th>Data</th>
                <th>Idade</th>
            </tr>
        </thead>
        <tbody> <!-- Corpo da Tabela -->
            <?php foreach ($_SESSION ['alunos'] as $aluno): ?>
            <tr>
                <!-- Dados fixos apenas para exemplo -->
                <td><?= $aluno['nome']?></td>
                <td><?= $aluno['sobrenome']?></td>
                <td><?= $aluno['nota']?></td>
                <td><?= $aluno['data']?></td>
                <td><?= $aluno['idade']?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <span>Média dos Alunos: <?= calcularMedia($_SESSION ['alunos']) ?></span>
    <?php endif; ?>

</body>
</html>