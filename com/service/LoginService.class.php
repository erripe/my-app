<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/html/com/model/Usuario.class.php';

class LoginService
{
    public function __construct()
    { }

    public function login($usuario)
    {
        return $usuario->login($usuario);;
    }

    public function findById($usnCod)
    {
        $usuario = new Usuario();
        return $usuario->findById($usnCod);
    }

    public function list()
    {
        $usuario = new Usuario();
        return $usuario->list();
    }

    public function insert($usuario)
    {
        return $usuario->insert();
    }

    public function update($usuario)
    {
        return $usuario->update();
    }

    public function delete($usnCod)
    {
        $usuario = new Usuario();
        return $usuario->delete($usnCod);
    }
}
