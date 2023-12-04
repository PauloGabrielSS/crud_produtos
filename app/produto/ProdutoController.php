<?php
namespace Produto;

class ProdutoController {

    private $produtoDTO;
    private $produto;
    private $database;

    // Construtores
    public function __construct($produto = null, $database = null) {
        if ($produto !== null)
            $this->produto = $produto;

        if ($database !== null)
            $this->database = $database;

        $this->produtoDTO = new ProdutoDTO($this->produto, $this->database);
    }

    // Getters
    public function getProdutoDTO() {
        return $this->produtoDTO;
    }

    public function getProduto() {
        return $this->produto;
    }

    public function getDatabase() {
        return $this->database;
    }

    // Setters
    public function setProdutoDTO($produtoDTO) {
        $this->produtoDTO = $produtoDTO;
    }

    public function setProduto($produto) {
        $this->produto = $produto;
    }

    public function setDatabase($database) {
        $this->database = $database;
    }

    // Métodos
    public function cadastrar() {
        $insert = $this->produtoDTO->cadastrar();

        $msg = array(
            'success' => false,
            'msg' => 'Não foi possível cadastrar o produto.'
        );

        if ($insert > 0){
            $msg = array(
                'success' => true,
                'msg' => 'Produto cadastrado com sucesso.'
            );
        }

        return $msg;
    }

    public function listar() {
        $array = $this->produtoDTO->listar();

        $produtos = array();
        foreach ($array as $item) {
            $produto = new Produto();
            $produto->setId($item['id']);
            $produto->setNome($item['nome']);
            $produto->setQuantidade($item['quantidade']);
            $produto->setPreco($item['preco']);
            $produto->setDescricao($item['descricao']);
            $produto->setDataCadastro($item['dataCadastro']);
            $produto->setHoraCadastro($item['horaCadastro']);
            $produtos[] = $produto;
        }

        return $produtos;
    }

    public function buscar($id) {
        $search = $this->produtoDTO->buscar($id);

        $produto = new Produto();
        $produto->setId($search['id']);
        $produto->setNome($search['nome']);
        $produto->setQuantidade($search['quantidade']);
        $produto->setPreco($search['preco']);
        $produto->setDescricao($search['descricao']);
        $produto->setDataCadastro($search['dataCadastro']);
        $produto->setHoraCadastro($search['horaCadastro']);

        return $produto;
    }

    public function alterar() {
        $update = $this->produtoDTO->alterar();

        $msg = array(
            'success' => true,
            'nochange' => true,
            'msg' => 'Não houve alterações no produto.'
        );

        if ($update > 0){
            $msg = array(
                'success' => true,
                'msg' => 'Produto alterado com sucesso.'
            );
        }

        return $msg;
    }

    public function excluir($id) {
        $delete = $this->produtoDTO->excluir($id);

        $msg = array(
            'success' => false,
            'msg' => 'Não foi possível excluir o produto.'
        );

        if ($delete > 0){
            $msg = array(
                'success' => true,
                'msg' => 'Produto excluído com sucesso.'
            );
        }

        return $msg;
    }

    public function buscarPorNome($nome) {

    }



}