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
    <title>Editar Compra</title>
    <link rel="stylesheet" href="../../assets/editar.css">
</head>

<body>
    <h1><a href="../../view/home/Homepage.php">Barber2Men</a></h1>
    <form action="../../index.php?classe=Compra&metodo=update" method="POST">
        Data: <input type="text" name="data" value="<?php echo htmlspecialchars($compra->data) ?>" id="data"><br><br>
        Horário: <input type="text" name="horario" value="<?php echo htmlspecialchars($compra->horario) ?>"
            id="horario"><br><br>
        Quantidade: <input type="text" name="qtd" value="<?php echo htmlspecialchars($compra->qtd) ?>" id="qtd"><br><br>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($compra->id) ?>">
        <input type="submit" value="Alterar">
    </form>
</body>

</html>