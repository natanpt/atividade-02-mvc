<?php

include_once __DIR__ . '/../../core/Conexao.php';

class AgendamentoDAO
{
	private $conexao;

	public function __construct()
	{
		$this->conexao = Conexao::conectar();
	}

	public function inserir($agendamento)
	{
		$sql = "INSERT INTO agendamentos (data, horario, duracao, status) 
                VALUES (:data, :horario, :duracao, :status)";
		$stmt = $this->conexao->prepare($sql);

		$stmt->bindParam(':data', $agendamento->data);
		$stmt->bindParam(':horario', $agendamento->horario);
		$stmt->bindParam(':duracao', $agendamento->duracao);
		$stmt->bindParam(':status', $agendamento->status);
		return $stmt->execute();
	}

	public function listarTudo()
	{
		$sql = "SELECT * FROM agendamentos";
		return $this->conexao->query($sql)->fetchAll(PDO::FETCH_OBJ);
	}

	public function buscar($id)
	{
		$sql = "SELECT * FROM agendamentos WHERE id = :id";
		$stmt = $this->conexao->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function alterar($agendamento)
	{
		$sql = "UPDATE agendamentos 
            SET data = :data, horario = :horario, duracao = :duracao, status = :status WHERE id = :id";

		$stmt = $this->conexao->prepare($sql);
		$stmt->bindParam(':id', $agendamento->id, PDO::PARAM_INT);
		$stmt->bindParam(':data', $agendamento->data);
		$stmt->bindParam(':horario', $agendamento->horario);
		$stmt->bindParam(':duracao', $agendamento->duracao);
		$stmt->bindParam(':status', $agendamento->status);
		return $stmt->execute();
	}

	public function excluir($id)
	{
		$sql = "DELETE FROM agendamentos WHERE id = :id";
		$stmt = $this->conexao->prepare($sql);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	}
}