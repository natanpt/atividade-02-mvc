<?php

include_once __DIR__ . '/../../core/Conexao.php';

class ClienteDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::conectar();
    }

    public function inserir($cliente)
    {
        $sql = "INSERT INTO clientes (nome, cpf, dt_nasc, whatsapp, logradouro, num, bairro) 
                VALUES (:nome, :cpf, :dt_nasc, :whatsapp, :logradouro, :num, :bairro)";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindParam(':nome', $cliente->nome);
        $stmt->bindParam(':cpf', $cliente->cpf);
        $stmt->bindParam(':dt_nasc', $cliente->dt_nasc);
        $stmt->bindParam(':whatsapp', $cliente->whatsapp);
        $stmt->bindParam(':logradouro', $cliente->logradouro);
        $stmt->bindParam(':num', $cliente->num);
        $stmt->bindParam(':bairro', $cliente->bairro);
        return $stmt->execute();
    }

    public function listarTudo()
    {
        $sql = "SELECT * FROM clientes";
        return $this->conexao->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscar($id)
    {
        $sql = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function alterar($cliente)
    {
        $sql = "UPDATE clientes SET nome = :nome, cpf = :cpf, dt_nasc = :dt_nasc, whatsapp = :whatsapp, logradouro = :logradouro, num = :num, bairro= :bairro WHERE id = :id";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $cliente->id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $cliente->nome);
        $stmt->bindParam(':cpf', $cliente->cpf);
        $stmt->bindParam(':dt_nasc', $cliente->dt_nasc);
        $stmt->bindParam(':whatsapp', $cliente->whatsapp);
        $stmt->bindParam(':logradouro', $cliente->logradouro);
        $stmt->bindParam(':num', $cliente->num);
        $stmt->bindParam(':bairro', $cliente->bairro);
        return $stmt->execute();
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM clientes WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}