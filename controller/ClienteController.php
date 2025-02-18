<?php

include __DIR__ . '/../model/Cliente.php';
include __DIR__ . '/../model/DAO/ClienteDAO.php';

class ClienteController
{
    private $cliente;
    private $cliente_dao;

    public function __construct()
    {
        $this->cliente = new Cliente();
        $this->cliente_dao = new ClienteDAO();
    }

    public function index()
    {
        $clientes = $this->cliente_dao->listarTudo();
        session_start();
        $_SESSION['clientes'] = $clientes;
        header('Location: view/cliente/Mostrar_tudo.php');
    }

    public function create()
    {
        header('Location: view/cliente/Novo.php');
    }

    public function store()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['cliente'] = [
                'nome' => filter_var($_POST['nome'], FILTER_SANITIZE_STRING),
                'cpf' => filter_var($_POST['cpf'], FILTER_SANITIZE_STRING),
                'dt_nasc' => filter_var($_POST['dt_nasc'], FILTER_SANITIZE_STRING),
                'whatsapp' => filter_var($_POST['whatsapp'], FILTER_SANITIZE_STRING),
                'logradouro' => filter_var($_POST['logradouro'], FILTER_SANITIZE_STRING),
                'num' => filter_var($_POST['num'], FILTER_SANITIZE_STRING),
                'bairro' => filter_var($_POST['data'], FILTER_SANITIZE_STRING)
            ];
        }

        $cliente = $_SESSION['cliente'];

        $this->cliente->nome = $cliente['nome'];
        $this->cliente->cpf = $cliente['cpf'];
        $this->cliente->dt_nasc = $cliente['dt_nasc'];
        $this->cliente->whatsapp = $cliente['whatsapp'];
        $this->cliente->logradouro = $cliente['logradouro'];
        $this->cliente->num = $cliente['num'];
        $this->cliente->bairro = $cliente['bairro'];

        $resp = $this->cliente_dao->inserir($this->cliente);
        if ($resp) {
            header('Location: view/home/Homepage.php');
        }
    }

    public function edit($id)
    {
        session_start();
        $_SESSION['cliente'] = $this->cliente_dao->buscar($id);
        header('Location: view/cliente/Editar.php?id=' . $id);
    }

    public function update()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['cliente'] = [
                'id' => filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT),
                'nome' => filter_var($_POST['nome'], FILTER_SANITIZE_STRING),
                'cpf' => filter_var($_POST['cpf'], FILTER_SANITIZE_STRING),
                'dt_nasc' => filter_var($_POST['dt_nasc'], FILTER_SANITIZE_STRING),
                'whatsapp' => filter_var($_POST['whatsapp'], FILTER_SANITIZE_STRING),
                'logradouro' => filter_var($_POST['logradouro'], FILTER_SANITIZE_STRING),
                'num' => filter_var($_POST['num'], FILTER_SANITIZE_STRING),
                'bairro' => filter_var($_POST['data'], FILTER_SANITIZE_STRING)
            ];
        }

        $cliente = $_SESSION['cliente'];

        $this->cliente->id = $cliente['id'];
        $this->cliente->nome = $cliente['nome'];
        $this->cliente->cpf = $cliente['cpf'];
        $this->cliente->dt_nasc = $cliente['dt_nasc'];
        $this->cliente->whatsapp = $cliente['whatsapp'];
        $this->cliente->logradouro = $cliente['logradouro'];
        $this->cliente->num = $cliente['num'];
        $this->cliente->bairro = $cliente['bairro'];

        $resp = $this->cliente_dao->alterar($this->cliente);

        if ($resp) {
            header('Location: view/home/Homepage.php');
        }
    }

    public function delete($id)
    {
        $resp = $this->cliente_dao->excluir($id);
        if ($resp) {
            header('Location: view/home/Homepage.php');
        }
    }

    public function show($id)
    {
        session_start();
        $_SESSION['cliente'] = $this->cliente_dao->buscar($id);
        header('Location: view/cliente/Mostrar_registro.php');
    }
}