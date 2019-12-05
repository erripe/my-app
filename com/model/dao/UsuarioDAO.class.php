<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/my-app/com/util/Database.class.php';

class UsuarioDAO
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function findById($usnCod)
    {
        $sql = "SELECT * FROM Usuarios WHERE usnCod = $usnCod";
        $result = $this->db->mysqli->query($sql);
        return $result->fetch_object();
    }

    public function list()
    {
        $sql = "SELECT * FROM Usuarios";
        $result = $this->db->mysqli->query($sql);
        $rows = [];
        while ($entry = $result->fetch_object()) {
            $rows[] = $entry;
        }
        return $rows;
    }

    public function insert($usuarios)
    {
        $sql = "INSERT INTO Usuarios (usnDesNome, usnDesPass) VALUES (?, ?)";
        $stmt = $this->db->mysqli->prepare($sql);
        $stmt->bind_param('ss', $usuarios->usnDesNome, $usuarios->usnDesPass);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function update($usuarios)
    {
        $sql = "UPDATE Usuarios SET usnDesNome = ?, usnDesPass = ? WHERE usnCod = '$usuarios->usnCod'";
        $stmt = $this->db->mysqli->prepare($sql);
        $stmt->bind_param('ss', $usuarios->usnDesNome, $usuarios->usnDesPass);
        if ($stmt->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function delete($usnCod)
    {

        $sql = "DELETE FROM Usuarios WHERE usnCod = '$usnCod'";
        if (!$this->db->mysqli->query($sql)) {
            echo "Sql error!";
        }
        if ($this->db->mysqli->affected_rows > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function login($usuario)
    {
        $sql = "SELECT * FROM Usuarios WHERE usnDesNome = '$usuario->usnDesNome' AND usnDesPass = '$usuario->usnDesPass'";
        $result = $this->db->mysqli->query($sql);
        return $result->fetch_object();
    }
}
