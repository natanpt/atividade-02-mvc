<?php

include_once __DIR__ . '/../../core/Conexao.php';

class ServicoDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::conectar();
    }

    public function inserir($servico)
    {
        $sql = "INSERT INTO servicos (nome, valor, descricao) 
                VALUES (:nome, :valor, :descricao)";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindParam(':nome', $servico->nome);
        $stmt->bindParam(':valor', $servico->valor);
        $stmt->bindParam(':descricao', $servico->descricao);
        return $stmt->execute();
    }

    public function listarTudo()
    {
        $sql = "SELECT * FROM servicos";
        return $this->conexao->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscar($id)
    {
        $sql = "SELECT * FROM servicos WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function alterar($servico)
    {
        $sql = "UPDATE servicos 
            SET nome = :nome, valor = :valor, descricao = :descricao WHERE id = :id";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $servico->id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $servico->nome);
        $stmt->bindParam(':valor', $servico->valor);
        $stmt->bindParam(':descricao', $servico->descricao);
        return $stmt->execute();
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM servicos WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}