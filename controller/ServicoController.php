<?php

include __DIR__ . '/../model/Servico.php';
include __DIR__ . '/../model/DAO/ServicoDAO.php';

class ServicoController
{
    private $servico;
    private $servico_dao;

    public function __construct()
    {
        $this->servico = new Servico();
        $this->servico_dao = new ServicoDAO();
    }

    public function index()
    {
        $servicos = $this->servico_dao->listarTudo();
        session_start();
        $_SESSION['servicos'] = $servicos;
        header('Location: view/servico/Mostrar_tudo.php');
    }

    public function create()
    {
        header('Location: view/servico/Novo.php');
    }

    public function store()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['servico'] = [
                'nome' => filter_var($_POST['nome'], FILTER_SANITIZE_STRING),
                'valor' => filter_var($_POST['valor'], FILTER_SANITIZE_STRING),
                'descricao' => filter_var($_POST['descricao'], FILTER_SANITIZE_STRING)
            ];
        }

        $servico = $_SESSION['servico'];

        $this->servico->nome = $servico['nome'];
        $this->servico->valor = $servico['valor'];
        $this->servico->descricao = $servico['descricao'];

        $resp = $this->servico_dao->inserir($this->servico);
        if ($resp) {
            header('Location: view/home/Homepage.php');
        }
    }

    public function edit($id)
    {
        session_start();
        $_SESSION['servico'] = $this->servico_dao->buscar($id);
        header('Location: view/servico/Editar.php?id=' . $id);
    }

    public function update()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['servico'] = [
                'id' => filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT),
                'nome' => filter_var($_POST['nome'], FILTER_SANITIZE_STRING),
                'valor' => filter_var($_POST['valor'], FILTER_SANITIZE_STRING),
                'descricao' => filter_var($_POST['descricao'], FILTER_SANITIZE_STRING)
            ];
        }

        $servico = $_SESSION['servico'];

        $this->servico->id = $servico['id'];
        $this->servico->nome = $servico['nome'];
        $this->servico->valor = $servico['valor'];
        $this->servico->descricao = $servico['descricao'];

        $resp = $this->servico_dao->alterar($this->servico);

        if ($resp) {
            header('Location: view/home/Homepage.php');
        }
    }

    public function delete($id)
    {
        $resp = $this->servico_dao->excluir($id);
        if ($resp) {
            header('Location: view/home/Homepage.php');
        }
    }

    public function show($id)
    {
        session_start();
        $_SESSION['servico'] = $this->servico_dao->buscar($id);
        header('Location: view/servico/Mostrar_registro.php');
    }
}