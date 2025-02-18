<?php
include_once __DIR__ . '/../../controller/ClienteController.php';

session_start();
if (!isset($_SESSION['clientes']) || empty($_SESSION['clientes'])) {
    // header("Location: view/home/Homepage.php");
    echo ("Deu ruim");
}

$clientes = $_SESSION['clientes'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Clientes</title>
    <link rel="stylesheet" href="../../assets/informacoes.css">
    <style>
        #clienteTable {
            width: 100%;
            border-collapse: collapse;
        }

        #clienteTable th,
        #clienteTable td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        #clienteTable th {
            background-color: #f2f2f2;
            cursor: pointer;
        }

        #clienteTable tr:nth-child(even) {
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
            let table = document.getElementById("clienteTable");
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
    <h2>Lista de Clientes</h2>
    <table id="clienteTable" data-sort="asc">
        <thead>
            <tr>
                <th onclick="sortTable(0)">ID</th>
                <th onclick="sortTable(1)">Nome</th>
                <th onclick="sortTable(2)">CPF</th>
                <th onclick="sortTable(3)">Data de Nascimento</th>
                <th onclick="sortTable(4)">Whatsapp</th>
                <th onclick="sortTable(5)">Logradouro</th>
                <th onclick="sortTable(6)">Número</th>
                <th onclick="sortTable(7)">Bairro</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td>
                        <?php echo htmlspecialchars($cliente->id); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($cliente->nome); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($cliente->cpf); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($cliente->dt_nasc); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($cliente->whatsapp); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($cliente->logradouro); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($cliente->num); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($cliente->bairro); ?>
                    </td>
                    <td>
                        <a class="acao-link editar"
                            href="../../index.php?classe=Cliente&metodo=edit&id=<?php echo $cliente->id ?>">Editar</a>
                        <a class="acao-link excluir"
                            href="../../index.php?classe=Cliente&metodo=edit&id=<?php echo $cliente->id ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>