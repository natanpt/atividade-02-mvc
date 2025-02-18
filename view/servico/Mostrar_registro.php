<?php
include_once __DIR__ . '/../../controller/ServicoController.php';

session_start();
if (!isset($_SESSION['servico']) || empty($_SESSION['servico'])) {
    echo "<h2>Serviço não encontrado.</h2>";
    echo '<a href="Mostrar_tudo.php">Voltar para a lista</a>';
    exit();
}

$servico = $_SESSION['servico'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Serviço</title>
    <link rel="stylesheet" href="../../assets/registro.css">
</head>

<body>
    <h1><a href="../../view/home/Homepage.php">Barber2Men</a></h1>
    <div class="container">
        <h2>Detalhes do Serviço</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php echo htmlspecialchars($servico->id); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($servico->nome); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($servico->valor); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($servico->descricao); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>