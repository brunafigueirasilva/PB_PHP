<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Tela Editar</title>
</head>
    <body>
        <h2>Editar Produto</h2>
        <a href="/PB_PHP/AtividadeMVC01/produto/listar">Ir para a tela Listar</a>

        <form method="POST" action="atualizar?id=<?= $_GET['id'] ?>"">
            <input type="text" name="id" value="<?= htmlspecialchars($_GET ['id'])?>" disabled>
            <input type="text" name="nome" value="<?= htmlspecialchars($produto ['nome'])?>" require>
            <input type="text" name="descricao" value="<?= htmlspecialchars($produto ['descricao'])?>" require> 
            <input type="text" name="quantidade" value="<?= htmlspecialchars($produto ['quantidade'])?>" require>
            <input type="text" name="data" value="<?= htmlspecialchars($produto ['data'])?>" require> 
            <button type="submit">Editar</button>
        </form>
    </body>
</html>
