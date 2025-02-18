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
    <title>Editar Agendamento</title>
    <link rel="stylesheet" href="../../assets/editar.css">
</head>

<body>
    <h1><a href="../../view/home/Homepage.php">Barber2Men</a></h1>
    <form action="../../index.php?classe=Agendamento&metodo=update" method="POST">
        Data: <input type="text" name="data" value="<?php echo htmlspecialchars($agendamento->data) ?>"
            id="data"><br><br>
        Horário: <input type="text" name="horario" value="<?php echo htmlspecialchars($agendamento->horario) ?>"
            id="horario"><br><br>
        Duração: <input type="text" name="duracao" value="<?php echo htmlspecialchars($agendamento->duracao) ?>"
            id="duracao"><br><br>
        Status: <input type="text" name="status" value="<?php echo htmlspecialchars($agendamento->status) ?>"
            id="status"><br><br>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($agendamento->id) ?>">
        <input type="submit" value="Alterar">
    </form>
</body>

</html>