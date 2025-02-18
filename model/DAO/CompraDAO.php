<?php

include_once __DIR__ . '/../../core/Conexao.php';

class CompraDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::conectar();
    }

    public function inserir($compra)
    {
        $sql = "INSERT INTO compras (data, horario, qtd) 
                VALUES (:data, :horario, :qtd)";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindParam(':data', $compra->data);
        $stmt->bindParam(':horario', $compra->horario);
        $stmt->bindParam(':qtd', $compra->qtd);
        return $stmt->execute();
    }

    public function listarTudo()
    {
        $sql = "SELECT * FROM compras";
        return $this->conexao->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscar($id)
    {
        $sql = "SELECT * FROM compras WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function alterar($compra)
    {
        $sql = "UPDATE compras 
            SET data = :data, horario = :horario, qtd = :qtd WHERE id = :id";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $compra->id, PDO::PARAM_INT);
        $stmt->bindParam(':data', $compra->data);
        $stmt->bindParam(':horario', $compra->horario);
        $stmt->bindParam(':qtd', $compra->qtd);
        return $stmt->execute();
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM compras WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}