<?php
namespace Produto;

class Produto {
    // Variaveis
    private $id;
    private $nome;
    private $quantidade;
    private $preco;
    private $descricao;
    private $dataCadastro;
    private $horaCadastro;

    // Construtores
    public function __construct($id = null, $nome = null, $quantidade = null, $preco = null, $descricao = null, $dataCadastro = null, $horaCadastro = null) {
        if ($id !== null)
            $this->id = $id;
        
        if ($nome !== null) 
            $this->nome = $nome;
        
        if ($quantidade !== null) 
            $this->quantidade = $quantidade;
        
        if ($preco !== null) 
            $this->preco = $preco;
        
        if ($descricao !== null) 
            $this->descricao = $descricao;
        
        if ($dataCadastro !== null) 
            $this->dataCadastro = $dataCadastro;
        
        if ($horaCadastro !== null) 
            $this->horaCadastro = $horaCadastro;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function getHoraCadastro() {
        return $this->horaCadastro;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function setHoraCadastro($horaCadastro) {
        $this->horaCadastro = $horaCadastro;
    }

    // Metodos
    public function __toString() {
        return "Id: $this->id, Nome: $this->nome, Quantidade: $this->quantidade, Preço: $this->preco, Descrição: $this->descricao, Data de Cadastro: $this->dataCadastro, Hora de Cadastro: $this->horaCadastro";
    }

    public function getSQLCreate() {
        $sql = "CREATE TABLE IF NOT EXISTS produto (
            id INT NOT NULL AUTO_INCREMENT,
            nome MEDIUMTEXT NOT NULL,
            quantidade INT NOT NULL,
            preco DECIMAL(10,2) NOT NULL,
            descricao MEDIUMTEXT NOT NULL,
            dataCadastro DATE NOT NULL,
            horaCadastro TIME NOT NULL,
            PRIMARY KEY (id)
        )";

        return $sql;
    }


}