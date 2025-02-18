<?php
include_once __DIR__ . '/../../controller/AgendamentoController.php';

session_start();
if (!isset($_SESSION['agendamentos']) || empty($_SESSION['agendamentos'])) {
    header("Location: view/home/Homepage.php");
    exit;
}

$agendamentos = $_SESSION['agendamentos'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Agendamentos</title>
    <link rel="stylesheet" href="../../assets/informacoes.css">
    <style>
        #agendamentoTable {
            width: 100%;
            border-collapse: collapse;
        }

        #agendamentoTable th,
        #agendamentoTable td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        #agendamentoTable th {
            background-color: #f2f2f2;
            cursor: pointer;
        }

        #agendamentoTable tr:nth-child(even) {
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
            let table = document.getElementById("agendamentoTable");
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
    <h2>Lista de Agendamentos</h2>
    <table id="agendamentoTable" data-sort="asc">
        <thead>
            <tr>
                <th onclick="sortTable(0)">ID</th>
                <th onclick="sortTable(1)">Data</th>
                <th onclick="sortTable(2)">Horário</th>
                <th onclick="sortTable(3)">Duração</th>
                <th onclick="sortTable(4)">Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($agendamentos as $agendamento): ?>
                <tr>
                    <td>
                        <?= htmlspecialchars($agendamento->id) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($agendamento->data) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($agendamento->horario) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($agendamento->duracao) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($agendamento->status) ?>
                    </td>
                    <td>
                        <a class="acao-link editar"
                            href="../../index.php?classe=Agendamento&metodo=edit&id=<?= $agendamento->id ?>">Editar</a>
                        <a class="acao-link excluir"
                            href="../../index.php?classe=Agendamento&metodo=delete&id=<?= $agendamento->id ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>