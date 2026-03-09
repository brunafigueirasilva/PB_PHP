<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Livros</title>
</head>
    <body>
        <a href="/PB_PHP/MVCAvaliacao/livro/telaCadastro">Voltar para a Tela Cadastrar</a>
        <h2>Livros</h2>
        <table border="1">
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Ano Publicação</th>
                <th>Editora</th>
            </tr>
            <?php foreach($livros as $id => $l): ?>
                <tr>
                    <td><?= $l['TITULO']?></td>
                    <td><?= $l['AUTOR']?></td>
                    <td><?= $l['ANO']?></td>
                    <td><?= $l['EDITORA']?></td>
                    <td>
                        <a href="/PB_PHP/MVCAvaliacao/livro/telaEditar?id=<?= $l['ID'] ?>">Editar</a>
                        <a href="/PB_PHP/MVCAvaliacao/livro/excluir?id=<?= $l ['ID'] ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>