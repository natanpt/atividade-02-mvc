<?php
include_once __DIR__ . '/../../controller/AgendamentoController.php';

session_start();
if (!isset($_SESSION['agendamento']) || empty($_SESSION['agendamento'])) {
    echo "<h2>Agendamento não encontrado.</h2>";
    echo '<a href="Mostrar_tudo.php">Voltar para a lista</a>';
    exit();
}

$agendamento = $_SESSION['agendamento'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Agendamento</title>
    <link rel="stylesheet" href="../../assets/registro.css">
</head>

<body>
    <h1><a href="../../view/home/Homepage.php">Barber2Men</a></h1>
    <div class="container">
        <h2>Detalhes do Agendamento</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Duração</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php echo htmlspecialchars($agendamento->id); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($agendamento->data); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($agendamento->horario); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($agendamento->duracao); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($agendamento->status); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>