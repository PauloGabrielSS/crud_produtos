<?php
namespace Produto;

class ProdutoDTO {
    private $produto;
    private $database;

    // Construtores
    public function __construct($produto = null, $database = null) {
        if ($produto !== null)
            $this->produto = $produto;

        if ($database !== null)
            $this->database = $database;
    }

    // Getters
    public function getProduto() {
        return $this->produto;
    }

    public function getDatabase() {
        return $this->database;
    }

    // Setters
    public function setProduto($produto) {
        $this->produto = $produto;
    }

    public function setDatabase($database) {
        $this->database = $database;
    }

    // Métodos
    public function cadastrar() {
        $sql = "INSERT INTO produto (nome, quantidade, preco, descricao, dataCadastro, horaCadastro) VALUES (:nome, :quantidade, :preco, :descricao, :dataCadastro, :horaCadastro)";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->bindValue(':nome', $this->produto->getNome());
        $stmt->bindValue(':quantidade', $this->produto->getQuantidade());
        $stmt->bindValue(':preco', $this->produto->getPreco());
        $stmt->bindValue(':descricao', $this->produto->getDescricao());
        $stmt->bindValue(':dataCadastro', $this->produto->getDataCadastro());
        $stmt->bindValue(':horaCadastro', $this->produto->getHoraCadastro());
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function listar() {
        $sql = "SELECT * FROM produto";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->execute();
        $produtos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $produtos;
    }

    public function buscar($id) {
        $sql = "SELECT * FROM produto WHERE id = :id";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $produto = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $produto;
    }

    public function alterar() {
        $sql = "UPDATE produto SET nome = :nome, quantidade = :quantidade, preco = :preco, descricao = :descricao, dataCadastro = :dataCadastro, horaCadastro = :horaCadastro WHERE id = :id";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->bindValue(':id', $this->produto->getId());
        $stmt->bindValue(':nome', $this->produto->getNome());
        $stmt->bindValue(':quantidade', $this->produto->getQuantidade());
        $stmt->bindValue(':preco', $this->produto->getPreco());
        $stmt->bindValue(':descricao', $this->produto->getDescricao());
        $stmt->bindValue(':dataCadastro', $this->produto->getDataCadastro());
        $stmt->bindValue(':horaCadastro', $this->produto->getHoraCadastro());
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function excluir($id) {
        $sql = "DELETE FROM produto WHERE id = :id";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function buscarPorNome($nome) {
        $sql = "SELECT * FROM produto WHERE nome LIKE :nome";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->bindValue(':nome', "%$nome%");
        $stmt->execute();
        $produtos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $produtos;
    }



}