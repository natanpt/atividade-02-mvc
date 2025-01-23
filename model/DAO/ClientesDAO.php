<?php
   include "../../core/Conexao.php";

class ClientesDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::conectar();
    }

    public function inserir ($clientes) {
        //$id = $clientes->getId();
        $nome = $clientes->getNome();
        $cpf = $clientes->getCpf();
        $dt_nasc = $clientes->getData();
        $whatsapp = $clientes->getWhatsapp();
        $logradouro = $clientes->getLogradouro();
        $num = $clientes->getNum();
        $bairro = $clientes->getBairro();

        $sql = "INSERT INTO clientes (nome, cpf, dt_nasc, whataspp, logradouro, num, bairro) VALUES(:nome, :cpf, :dt_nasc, :whataspp, :logradouro, :num, :bairro)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':dt_nasc', $dt_nasc);
        $stmt->bindParam(':whatsapp', $whatsapp);
        $stmt->bindParam(':logradouro', $logradouro);
        $stmt->bindParam(':num', $num);
        $stmt->bindParam(':bairro', $bairro);
        $ok = $stmt->execute();
        return $ok;
    }

    public function listar_tudo() {
        $sql = "SELECT * FROM clientes";
        $stmt = $this->pdo->query($sql);
        $result = $stmt->fetchALL(PDO::FETCH_ASSOC);

        for ($i = 0; $i< $stmt->rowCount();$i++) {
            $clientes[$i] = new Cliente();
            $clientes[$i]->setNome($result[$i]['nome']);
            $clientes[$i]->setCpf($result[$i]['cpf']);
            $clientes[$i]->setData($result[$i]['dt_nasc']);
            $clientes[$i]->setWhatsapp($result[$i]['whatsapp']);
            $clientes[$i]->setLogradouro($result[$i]['logradouro']);
            $clientes[$i]->setNum($result[$i]['num']);
            $clientes[$i]->setBairro($result[$i]['bairro']);
        }
        return $clientes;
    }

    public function alterar($clientes) {
        $id = $clientes->getId();
        $nome = $clientes->getNome();
        $cpf = $clientes->getCpf();
        $dt_nasc = $clientes->getData();
        $whatsapp = $clientes->getWhatsapp();
        $logradouro = $clientes->getLogradouro();
        $num = $clientes->getNum();
        $bairro = $clientes->getBairro();
        
        $sql = "UPDATE clientes SET nome = :nome, cpf = :cpf, dt_nasc = :dt_nasc,
            whatsapp = :whatsapp, logradouro = :logradouro, num = :num, bairro = :bairro WHERE id = '$id'";
        $update = $pdo->prepare($sql);
        
        $update->bindParam(':nome', $nome);
        $update->bindParam(':cpf', $cpf);
        $update->bindParam(':dt_nasc', $dt_);
        $update->bindParam(':whatsapp', $whatsapp);
        $update->bindParam(':logradouro', $logradouro);
        $update->bindParam(':num', $num);
        $update->bindParam(':bairro', $bairro);
        $update->execute();
    }

    public function buscar($id) {
        
    }

    public function excluir($clientes) {
        $id = $clientes->getId();
        $sql = "DELETE FROM clientes WHERE id = :id;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute()
    }
}