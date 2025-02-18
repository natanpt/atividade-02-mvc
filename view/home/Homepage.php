<?php
include "../../core/Conexao.php";

$pdo = Conexao::conectar();

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
} else {
    $id = 1;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../../assets/style2.css">
</head>

<body>
    <h1><a href="../../view/home/Homepage.php">Barber2Men</a></h1>
    <ul>
        <li>Agendamentos</li>
        <ul>
            <li><a href="../../index.php?classe=Agendamento&metodo=create">Criar novo agendamento</a>
            <li><a href="../../index.php?classe=Agendamento&metodo=edit&id=<?php echo $id ?>">Editar agendamento</a>
            </li>
            <li><a href="../../index.php?classe=Agendamento&metodo=show&id=<?php echo $id ?>">Mostrar agendamento</a>
            </li>
            <li><a href="../../index.php?classe=Agendamento&metodo=index">Mostrar todos os agendamentos</a></li>
            <li><a href="../../index.php?classe=Agendamento&metodo=delete&id=<?php echo $id ?>">Deletar um
                    agendamento</a>
            </li>
        </ul>
        <li>Clientes</li>
        <ul>
            <li><a href="../../index.php?classe=Cliente&metodo=create">Criar novo cliente</a>
            <li><a href="../../index.php?classe=Cliente&metodo=edit&id=<?php echo $id ?>">Editar cliente</a></li>
            <li><a href="../../index.php?classe=Cliente&metodo=show&id=<?php echo $id ?>">Mostrar cliente</a></li>
            <li><a href="../../index.php?classe=Cliente&metodo=index">Mostrar todos os clientes</a></li>
            <li><a href="../../index.php?classe=Cliente&metodo=delete&id=<?php echo $id ?>">Deletar um cliente</a>
        </ul>
        <li>Compras</li>
        <ul>
            <li><a href="../../index.php?classe=Compra&metodo=create">Criar nova compra</a>
            <li><a href="../../index.php?classe=Compra&metodo=edit&id=<?php echo $id ?>">Editar compra</a></li>
            <li><a href="../../index.php?classe=Compra&metodo=show&id=<?php echo $id ?>">Mostrar compra</a></li>
            <li><a href="../../index.php?classe=Compra&metodo=index">Mostrar todas as compras</a></li>
            <li><a href="../../index.php?classe=Compra&metodo=delete&id=<?php echo $id ?>">Deletar uma compra</a>
        </ul>
        <li>Produtos</li>
        <ul>
            <li><a href="../../index.php?classe=Produto&metodo=create">Criar novo produto</a>
            <li><a href="../../index.php?classe=Produto&metodo=edit&id=<?php echo $id ?>">Editar produto</a></li>
            <li><a href="../../index.php?classe=Produto&metodo=show&id=<?php echo $id ?>">Mostrar produto</a></li>
            <li><a href="../../index.php?classe=Produto&metodo=index">Mostrar todos os produtos</a></li>
            <li><a href="../../index.php?classe=Produto&metodo=delete&id=<?php echo $id ?>">Deletar um produto</a>
        </ul>
        <li>Serviços</li>
        <ul>
            <li><a href="../../index.php?classe=Servico&metodo=create">Criar novo serviço</a>
            <li><a href="../../index.php?classe=Servico&metodo=edit&id=<?php echo $id ?>">Editar serviço</a></li>
            <li><a href="../../index.php?classe=Servico&metodo=show&id=<?php echo $id ?>">Mostrar serviço</a></li>
            <li><a href="../../index.php?classe=Servico&metodo=index">Mostrar todos os serviços</a></li>
            <li><a href="../../index.php?classe=Servico&metodo=delete&id=<?php echo $id ?>">Deletar um serviço</a>
        </ul>
    </ul>
</body>

</html>