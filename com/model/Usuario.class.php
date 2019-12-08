<?php
include('com/model/dao/UsuarioDAO.class.php');

class Usuario
{
    public $usnCod;
    public $pesCod;
    public $usnDesNome;
    public $usnDesPass;

    public function __construct()
    { }

    public function findById($usnCod)
    {
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->findById($usnCod);
    }

    public function list()
    {
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->list();
    }

    public function insert()
    {
        $usuarioDAO = new UsuarioDAO();
        return $this->usnCod = $usuarioDAO->insert($this);
    }

    public function update()
    {
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->update($this);
    }

    public function delete($usnCod)
    {
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->delete($usnCod);
    }

    public function login($usuario)
    {
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->login($usuario);
    }
}
