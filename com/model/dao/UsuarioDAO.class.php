<?php
include $_SERVER['DOCUMENT_ROOT'] . '/my-app/com/util/Database.class.php';

class UsuarioDAO
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function login($usuario)
    {
        $sql = "SELECT * FROM Usuarios WHERE usnDesNome = '$usuario->usnDesNome' AND usnDesPass = '$usuario->usnDesPass'";
        $result = $this->db->mysqli->query($sql);
        return $result->fetch_object();
    }
}
