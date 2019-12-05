<?php
include $_SERVER['DOCUMENT_ROOT'] . '/my-app/com/model/dao/UsuarioDAO.class.php';

class Usuario
{
    public $usnCod;
    public $pesCod;
    public $usnDesNome;
    public $usnDesPass;

    public function __construct()
    { }

    public function login($usuario)
    {
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->login($usuario);
    }
}
