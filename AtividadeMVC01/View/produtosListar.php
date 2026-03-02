<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
    <body>
        <a href="/PB_PHP/AtividadeMVC01/produto/telaRegistro">Ir para a tela de Cadastro de Produtos</a>
        <h2>Produtos</h2>
        <table border="1">
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Data</th>
            </tr>
            <?php foreach($produtos as $id => $p): ?>
                <tr>
                    <td><?= $p['nome']?></td>
                    <td><?= $p['descricao']?></td>
                    <td><?= $p['quantidade']?></td>
                    <td><?= $p['data']?></td>   
                    <td>
                          <a href="/PB_PHP/AtividadeMVC01/produto/telaEditar?id=<?= $id ?>">Editar</a>
                          <a href="/PB_PHP/AtividadeMVC01/produto/excluir?id=<?= $id ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>    
    </body>
</html>