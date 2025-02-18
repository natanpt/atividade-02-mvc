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
    <title>Editar Serviço</title>
    <link rel="stylesheet" href="../../assets/editar.css">
</head>

<body>
    <h1><a href="../../view/home/Homepage.php">Barber2Men</a></h1>
    <form action="../../index.php?classe=Servico&metodo=update" method="POST">
        Nome: <input type="text" name="nome" value="<?php echo htmlspecialchars($servico->nome) ?>" id="nome"><br><br>
        Valor: <input type="text" name="valor" value="<?php echo htmlspecialchars($servico->valor) ?>"
            id="valor"><br><br>
        Descrição: <input type="text" name="descricao" value="<?php echo htmlspecialchars($servico->descricao) ?>"
            id="descricao"><br><br>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($servico->id) ?>">
        <input type="submit" value="Alterar">
    </form>
</body>

</html>