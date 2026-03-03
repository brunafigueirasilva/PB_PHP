<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Tela Editar</title>
</head>
    <body>
        <h2>Editar Usuário</h2>
        <a href="/PB_PHP/MVCMysqlExemplo/usuario/listar">Ir para a tela Listar</a>

        <form method="POST" action="atualizar?id=<?= $_GET['id'] ?>">
            <input type="text" name="id" value="<?= htmlspecialchars($_GET ['id'])?>" disabled>
            <input type="text" name="nome" value="<?= htmlspecialchars($usuario ['NOME'])?>" require>
            <input type="text" name="email" value="<?= htmlspecialchars($usuario ['EMAIL'])?>" require> 
            <button type="submit">Editar</button>
        </form>
    </body>
</html>
