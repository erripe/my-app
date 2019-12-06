<?php
include $_SERVER['DOCUMENT_ROOT'] . '/my-app/com/model/Produto.class.php';

class MainService
{
    public function __construct()
    { }

    public function listagem()
    {
        $produto = new Produto();
        return $produto->listMain();
    }
}
