<?php
include_once __DIR__ . '/../../controller/ClienteController.php';

session_start();
if (!isset($_SESSION['cliente']) || empty($_SESSION['cliente'])) {
    echo "<h2>Cliente não encontrado.</h2>";
    echo '<a href="Mostrar_tudo.php">Voltar para a lista</a>';
    exit();
}

$cliente = $_SESSION['cliente'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Cliente</title>
    <link rel="stylesheet" href="../../assets/registro.css">
</head>

<body>
    <h1><a href="../../view/home/Homepage.php">Barber2Men</a></h1>
    <div class="container">
        <h2>Detalhes do Cliente</h2>
        <table>
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data de nascimento</th>
                <th>Whatsapp</th>
                <th>Logradouro</th>
                <th>Número</th>
                <th>Bairro</th>
            </thead>
            <tbody>
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
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>