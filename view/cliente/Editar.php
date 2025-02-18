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
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../../assets/editar.css">
</head>

<body>
    <h1><a href="../../view/home/Homepage.php">Barber2Men</a></h1>
    <form action="../../index.php?classe=Cliente&metodo=update" method="POST">
        Nome: <input type="text" name="nome" value="<?php echo htmlspecialchars($cliente->nome) ?>" id="nome"><br><br>
        CPF: <input type="text" name="cpf" value="<?php echo htmlspecialchars($cliente->cpf) ?>" id="cpf"><br><br>
        Data de nascimento: <input type="text" name="dt_nasc" value="<?php echo htmlspecialchars($cliente->dt_nasc) ?>"
            id="dt_nasc"><br><br>
        Whatsapp: <input type="text" name="whatsapp" value="<?php echo htmlspecialchars($cliente->whatsapp) ?>"
            id="whatsapp"><br><br>
        Logradouro: <input type="text" name="logradouro" value="<?php echo htmlspecialchars($cliente->logradouro) ?>"
            id="logradouro"><br><br>
        Número: <input type="text" name="num" value="<?php echo htmlspecialchars($cliente->num) ?>" id="num"><br><br>
        Bairro: <input type="text" name="bairro" value="<?php echo htmlspecialchars($cliente->bairro) ?>"
            id="bairro"><br><br>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($cliente->id) ?>">
        <input type="submit" value="Alterar">
    </form>
</body>

</html>