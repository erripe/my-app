<?php
include $_SERVER['DOCUMENT_ROOT'] . '/my-app/com/model/dao/ProdutoDAO.class.php';

class Produto
{

    public $prdCod;
    public $prdDesNome;
    public $prdMnyValor;
    public $prdEspDesc;
    public $prdEspImg;
    public $prdDtaCadastro;

    public function __construct()
    { }

    public function findById($prdCod)
    {
        $produtoDAO = new ProdutoDAO();
        return $produtoDAO->findById($prdCod);
    }

    public function list()
    {
        $produtoDAO = new ProdutoDAO();
        return $produtoDAO->list();
    }

    public function insert()
    {
        $produtoDAO = new ProdutoDAO();
        return $this->prdCod = $produtoDAO->insert($this);
    }

    public function update()
    {
        $produtoDAO = new ProdutoDAO();
        return $produtoDAO->update($this);
    }

    public function delete($prdCod)
    {
        $produtoDAO = new ProdutoDAO();
        return $produtoDAO->delete($prdCod);
    }
}
