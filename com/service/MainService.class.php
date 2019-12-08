<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/html/com/model/Produto.class.php';

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
