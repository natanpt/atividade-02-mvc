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
    <title>Editar Produto</title>
    <link rel="stylesheet" href="../../assets/editar.css">
</head>

<body>
    <h1><a href="../../view/home/Homepage.php">Barber2Men</a></h1>
    <form action="../../index.php?classe=Produto&metodo=update" method="POST">
        Nome: <input type="text" name="nome" value="<?php echo htmlspecialchars($produto->nome) ?>" id="nome"><br><br>
        Valor: <input type="text" name="valor" value="<?php echo htmlspecialchars($produto->valor) ?>"
            id="valor"><br><br>
        Categoria: <input type="text" name="categoria" value="<?php echo htmlspecialchars($produto->categoria) ?>"
            id="categoria"><br><br>
        Marca: <input type="text" name="marca" value="<?php echo htmlspecialchars($produto->marca) ?>"
            id="marca"><br><br>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($produto->id) ?>">
        <input type="submit" value="Alterar">
    </form>
</body>

</html>