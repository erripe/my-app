<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/com/model/Produto.class.php';

class PainelService
{
    public function __construct()
    { }

    public function findById($prdCod)
    {
        $produto = new Produto();
        return $produto->findById($prdCod);
    }

    public function findList($prdDesNome)
    {
        $produto = new Produto();
        return $produto->findList($prdDesNome);
    }

    public function listagem()
    {
        $produto = new Produto();
        return $produto->list();
    }

    public function insert($produto)
    {
        return $produto->insert();
    }

    public function update($produto)
    {
        return $produto->update();
    }

    public function delete($prdCod)
    {
        $produto = new Produto();
        return $produto->delete($prdCod);
    }
}
