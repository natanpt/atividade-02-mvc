<?php
include_once __DIR__ . '/../../controller/ProdutoController.php';

session_start();
if (!isset($_SESSION['produto']) || empty($_SESSION['produto'])) {
    echo "<h2>Produto não encontrado.</h2>";
    echo '<a href="Mostrar_tudo.php">Voltar para a lista</a>';
    exit();
}

$produto = $_SESSION['produto'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Produto</title>
    <link rel="stylesheet" href="../../assets/registro.css">
</head>

<body>
    <h1><a href="../../view/home/Homepage.php">Barber2Men</a></h1>
    <div class="container">
        <h2>Detalhes do Produto</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Categoria</th>
                    <th>Marca</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php echo htmlspecialchars($produto->id) ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($produto->nome) ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($produto->valor) ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($produto->categoria) ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($produto->marca) ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>