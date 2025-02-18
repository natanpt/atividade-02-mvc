<?php
include_once __DIR__ . '/../../controller/CompraController.php';

session_start();
if (!isset($_SESSION['compra']) || empty($_SESSION['compra'])) {
    echo "<h2>Compra não encontrado.</h2>";
    echo '<a href="Mostrar_tudo.php">Voltar para a lista</a>';
    exit();
}

$compra = $_SESSION['compra'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Compra</title>
    <link rel="stylesheet" href="../../assets/registro.css">
</head>

<body>
    <h1><a href="../../view/home/Homepage.php">Barber2Men</a></h1>
    <div class="container">
        <h2>Detalhes da Compra</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php echo htmlspecialchars($compra->id); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($compra->data); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($compra->horario); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($compra->qtd); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>