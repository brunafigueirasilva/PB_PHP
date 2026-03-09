<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Editar</title>
</head>
    <body>
        <h2>Editar Livro</h2>
        <a href="/PB_PHP/MVCAvaliacao/livro/listar">Ir para a Tela Listar</a>
        <form method="POST" action="atualizar?id=<?= $_GET['id'] ?>">

            <input type="text" name="id" value="<?= htmlspecialchars($_GET ['id'])?>" disable>
            <input type="text" name="titulo" value="<?= htmlspecialchars($livro ['TITULO'])?>" require>
            <input type="text" name="autor" value="<?= htmlspecialchars($livro ['AUTOR'])?>" require>
            <input type="date" name="ano_publicacao" value="<?= htmlspecialchars($livro ['ANO'])?>" require>
            <input type="text" name="editora" value="<?= htmlspecialchars($livro ['EDITORA'])?>" require>
            <button type="submit">Editar</button>
        </form>
    </body>     
</html>