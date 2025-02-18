<?php

include __DIR__ . '/../model/Agendamento.php';
include __DIR__ . '/../model/DAO/AgendamentoDAO.php';

class AgendamentoController
{
	private $agendamento;
	private $agendamento_dao;

	public function __construct()
	{
		$this->agendamento = new Agendamento();
		$this->agendamento_dao = new AgendamentoDAO();
	}

	public function index()
	{
		$agendamentos = $this->agendamento_dao->listarTudo();
		session_start();
		$_SESSION['agendamentos'] = $agendamentos;
		header('Location: view/agendamento/Mostrar_tudo.php');
	}

	public function create()
	{
		header('Location: view/agendamento/Novo.php');
	}

	public function store()
	{
		session_start();

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$_SESSION['agendamento'] = [
				'data' => filter_var($_POST['data'], FILTER_SANITIZE_STRING),
				'horario' => filter_var($_POST['horario'], FILTER_SANITIZE_STRING),
				'duracao' => filter_var($_POST['duracao'], FILTER_SANITIZE_STRING),
				'status' => filter_var($_POST['status'], FILTER_SANITIZE_STRING)
			];
		}

		$agendamento = $_SESSION['agendamento'];

		$this->agendamento->data = $agendamento['data'];
		$this->agendamento->horario = $agendamento['horario'];
		$this->agendamento->duracao = $agendamento['duracao'];
		$this->agendamento->status = $agendamento['status'];

		$resp = $this->agendamento_dao->inserir($this->agendamento);
		if ($resp) {
			header('Location: view/home/Homepage.php');
		}
	}

	public function edit($id)
	{
		session_start();
		$_SESSION['agendamento'] = $this->agendamento_dao->buscar($id);
		header('Location: view/agendamento/Editar.php?id=' . $id);
	}

	public function update()
	{
		session_start();

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$_SESSION['agendamento'] = [
				'id' => filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT),
				'data' => filter_var($_POST['data'], FILTER_SANITIZE_STRING),
				'horario' => filter_var($_POST['horario'], FILTER_SANITIZE_STRING),
				'duracao' => filter_var($_POST['duracao'], FILTER_SANITIZE_STRING),
				'status' => filter_var($_POST['status'], FILTER_SANITIZE_STRING)
			];
		}

		$agendamento = $_SESSION['agendamento'];

		$this->agendamento->id = $agendamento['id'];
		$this->agendamento->data = $agendamento['data'];
		$this->agendamento->horario = $agendamento['horario'];
		$this->agendamento->duracao = $agendamento['duracao'];
		$this->agendamento->status = $agendamento['status'];

		$resp = $this->agendamento_dao->alterar($this->agendamento);

		if ($resp) {
			header('Location: view/home/Homepage.php');
		}
	}

	public function delete($id)
	{
		$resp = $this->agendamento_dao->excluir($id);
		if ($resp) {
			header('Location: view/home/Homepage.php');
		}
	}

	public function show($id)
	{
		session_start();
		$_SESSION['agendamento'] = $this->agendamento_dao->buscar($id);
		header('Location: view/agendamento/Mostrar_registro.php');
	}
}
?>