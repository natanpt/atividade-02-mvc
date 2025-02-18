<?php

include __DIR__ . '/../model/Compra.php';
include __DIR__ . '/../model/DAO/CompraDAO.php';

class CompraController
{
    private $compra;
    private $compra_dao;

    public function __construct()
    {
        $this->compra = new Compra();
        $this->compra_dao = new CompraDAO();
    }

    public function index()
    {
        $compras = $this->compra_dao->listarTudo();
        session_start();
        $_SESSION['compras'] = $compras;
        header('Location: view/compra/Mostrar_tudo.php');
    }

    public function create()
    {
        header('Location: view/compra/Novo.php');
    }

    public function store()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['compra'] = [
                'data' => filter_var($_POST['data'], FILTER_SANITIZE_STRING),
                'horario' => filter_var($_POST['horario'], FILTER_SANITIZE_STRING),
                'qtd' => filter_var($_POST['qtd'], FILTER_SANITIZE_STRING)
            ];
        }

        $compra = $_SESSION['compra'];

        $this->compra->data = $compra['data'];
        $this->compra->horario = $compra['horario'];
        $this->compra->qtd = $compra['qtd'];

        $resp = $this->compra_dao->inserir($this->compra);
        if ($resp) {
            header('Location: view/home/Homepage.php');
        }
    }

    public function edit($id)
    {
        session_start();
        $_SESSION['compra'] = $this->compra_dao->buscar($id);
        header('Location: view/compra/Editar.php?id=' . $id);
    }

    public function update()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['compra'] = [
                'id' => filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT),
                'data' => filter_var($_POST['data'], FILTER_SANITIZE_STRING),
                'horario' => filter_var($_POST['horario'], FILTER_SANITIZE_STRING),
                'qtd' => filter_var($_POST['qtd'], FILTER_SANITIZE_STRING)
            ];
        }

        $compra = $_SESSION['compra'];

        $this->compra->id = $compra['id'];
        $this->compra->data = $compra['data'];
        $this->compra->horario = $compra['horario'];
        $this->compra->qtd = $compra['qtd'];

        $resp = $this->compra_dao->alterar($this->compra);

        if ($resp) {
            header('Location: view/home/Homepage.php');
        }
    }

    public function delete($id)
    {
        $resp = $this->compra_dao->excluir($id);
        if ($resp) {
            header('Location: view/home/Homepage.php');
        }
    }

    public function show($id)
    {
        session_start();
        $_SESSION['compra'] = $this->compra_dao->buscar($id);
        header('Location: view/compra/Mostrar_registro.php');
    }
}