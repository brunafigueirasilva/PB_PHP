<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro Cadastro</title>
</head>
    <body>
        <a href="/PB_PHP/MVCAvaliacao/livro/listar">Ir para a tela Listar</a>
        <form method="POST" action="Salvar">
            <input type="text" name="titulo" placeholder="Digite o título do livro: " require>
            <input type="text" name="autor" placeholder="Digite o autor do livro: " require>
            <input type="date" name="ano_publicacao" placeholder="Digite o ano de publicação: " require>
            <input type="text" name="editora" placeholder="Digite a editora do livro: " require>
            <button type="submit">Cadastrar Livro</button>
        </form>
    </body>
</html>