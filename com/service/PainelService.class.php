<?php
include $_SERVER['DOCUMENT_ROOT'] . '/my-app/com/model/Produto.class.php';

class PainelService
{
    public function __construct()
    { }

    public function listagem()
    {
        $produto = new Produto();
        return $produto->list();
    }

    public function delete($prdCod)
    {
        $produto = new Produto();
        return $produto->delete($prdCod);
    }

    public function getImage($prdCod)
    {
        $produto = new Produto();
        $imagePrd = $produto->findById($prdCod);
        return base64_encode($imagePrd->prdEspImg);
    }
}
