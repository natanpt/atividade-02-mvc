<?php

include_once __DIR__ . '/../../core/Conexao.php';

class ProdutoDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::conectar();
    }

    public function inserir($produto)
    {
        $sql = "INSERT INTO produtos (nome, valor, categoria, marca) 
                VALUES (:nome, :valor, :categoria, :marca)";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindParam(':nome', $produto->nome);
        $stmt->bindParam(':valor', $produto->valor);
        $stmt->bindParam(':categoria', $produto->categoria);
        $stmt->bindParam(':marca', $produto->marca);
        return $stmt->execute();
    }

    public function listarTudo()
    {
        $sql = "SELECT * FROM produtos";
        return $this->conexao->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscar($id)
    {
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function alterar($produto)
    {
        $sql = "UPDATE produtos 
            SET nome = :nome, valor = :valor, categoria = :categoria, marca = :marca WHERE id = :id";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $produto->id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $produto->nome);
        $stmt->bindParam(':valor', $produto->valor);
        $stmt->bindParam(':categoria', $produto->categoria);
        $stmt->bindParam(':marca', $produto->marca);
        return $stmt->execute();
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}