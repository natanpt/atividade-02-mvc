<?php

include __DIR__ . '/../model/Produto.php';
include __DIR__ . '/../model/DAO/ProdutoDAO.php';

class ProdutoController
{
    private $produto;
    private $produto_dao;

    public function __construct()
    {
        $this->produto = new Produto();
        $this->produto_dao = new ProdutoDAO();
    }

    public function index()
    {
        $produtos = $this->produto_dao->listarTudo();
        session_start();
        $_SESSION['produtos'] = $produtos;
        header('Location: view/produto/Mostrar_tudo.php');
    }

    public function create()
    {
        header('Location: view/produto/Novo.php');
    }

    public function store()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['produto'] = [
                'nome' => filter_var($_POST['nome'], FILTER_SANITIZE_STRING),
                'valor' => filter_var($_POST['valor'], FILTER_SANITIZE_STRING),
                'categoria' => filter_var($_POST['categoria'], FILTER_SANITIZE_STRING),
                'marca' => filter_var($_POST['marca'], FILTER_SANITIZE_STRING)
            ];
        }

        $produto = $_SESSION['produto'];

        $this->produto->nome = $produto['nome'];
        $this->produto->valor = $produto['valor'];
        $this->produto->categoria = $produto['categoria'];
        $this->produto->marca = $produto['marca'];

        $resp = $this->produto_dao->inserir($this->produto);
        if ($resp) {
            header('Location: view/home/Homepage.php');
        }
    }

    public function edit($id)
    {
        session_start();
        $_SESSION['produto'] = $this->produto_dao->buscar($id);
        header('Location: view/produto/Editar.php?id=' . $id);
    }

    public function update()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['produto'] = [
                'id' => filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT),
                'nome' => filter_var($_POST['nome'], FILTER_SANITIZE_STRING),
                'valor' => filter_var($_POST['valor'], FILTER_SANITIZE_STRING),
                'categoria' => filter_var($_POST['categoria'], FILTER_SANITIZE_STRING),
                'marca' => filter_var($_POST['marca'], FILTER_SANITIZE_STRING)
            ];
        }

        $produto = $_SESSION['produto'];

        $this->produto->id = $produto['id'];
        $this->produto->nome = $produto['nome'];
        $this->produto->valor = $produto['valor'];
        $this->produto->categoria = $produto['categoria'];
        $this->produto->marca = $produto['marca'];

        $resp = $this->produto_dao->alterar($this->produto);

        if ($resp) {
            header('Location: view/home/Homepage.php');
        }
    }

    public function delete($id)
    {
        $resp = $this->produto_dao->excluir($id);
        if ($resp) {
            header('Location: view/home/Homepage.php');
        }
    }

    public function show($id)
    {
        session_start();
        $_SESSION['produto'] = $this->produto_dao->buscar($id);
        header('Location: view/produto/Mostrar_registro.php');
    }
}
?>