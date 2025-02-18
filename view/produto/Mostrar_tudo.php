<?php
include_once __DIR__ . '/../../controller/ProdutoController.php';

session_start();
if (!isset($_SESSION['produtos']) || empty($_SESSION['produtos'])) {
    header("Location: view/home/Homepage.php");
}

$produtos = $_SESSION['produtos'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Serviços</title>
    <link rel="stylesheet" href="../../assets/informacoes.css">
    <style>
        #produtoTable {
            width: 100%;
            border-collapse: collapse;
        }

        #produtoTable th,
        #produtoTable td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        #produtoTable th {
            background-color: #f2f2f2;
            cursor: pointer;
        }

        #produtoTable tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .acao-link {
            padding: 5px 10px;
            margin: 0 5px;
            text-decoration: none;
            border-radius: 4px;
        }

        .acao-link.editar {
            background-color: #4CAF50;
            color: white;
        }

        .acao-link.excluir {
            background-color: #f44336;
            color: white;
        }
    </style>
    <script>
        function sortTable(n) {
            let table = document.getElementById("produtoTable");
            let rows = Array.from(table.rows).slice(1);
            let asc = table.getAttribute("data-sort") === "asc";

            rows.sort((rowA, rowB) => {
                let cellA = rowA.cells[n].innerText.toLowerCase();
                let cellB = rowB.cells[n].innerText.toLowerCase();
                return (cellA > cellB ? 1 : -1) * (asc ? 1 : -1);
            });

            rows.forEach(row => table.appendChild(row));
            table.setAttribute("data-sort", asc ? "desc" : "asc");
        }
    </script>
</head>

<body>
    <h1><a href="../../view/home/Homepage.php">Barber2Men</a></h1>
    <h2>Lista de Produtos</h2>
    <table id="produtoTable" data-sort="asc">
        <thead>
            <tr>
                <th onclick="sortTable(0)">ID</th>
                <th onclick="sortTable(1)">Nome</th>
                <th onclick="sortTable(2)">Valor</th>
                <th onclick="sortTable(3)">Categoria</th>
                <th onclick="sortTable(4)">Marca</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td>
                        <?php echo htmlspecialchars($produto->id); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($produto->nome); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($produto->valor); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($produto->categoria); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($produto->marca); ?>
                    </td>
                    <td>
                        <a class="acao-link editar"
                            href="../../index.php?classe=Produto&metodo=edit&id=<?php echo $produto->id ?>">Editar</a>
                        <a class="acao-link excluir"
                            href="../../index.php?classe=Produto&metodo=edit&id=<?php echo $produto->id ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>