<?php
include $_SERVER['DOCUMENT_ROOT'] . '/my-app/com/util/Database.class.php';

class PessoaDAO
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function findById($pesCod)
    {
        $sql = "SELECT * FROM Pessoas WHERE pesCod = $pesCod";
        $result = $this->db->mysqli->query($sql);
        return $result->fetch_object();
    }

    public function list()
    {
        $sql = "SELECT * FROM Pessoas";
        $result = $this->db->mysqli->query($sql);
        while ($entry = $result->fetch_object()) {
            $rows[] = $entry;
        }
        return $rows;
    }

    public function insert($pessoa)
    {
        $sql = "INSERT INTO Pessoas (pesCod, pesDesNome) VALUES (NULL, '$pessoa->pesDesNome')";
        $this->db->mysqli->query($sql);
        return $this->db->mysqli->insert_id;
    }

    public function update($pessoa)
    {
        $sql = "UPDATE Pessoas SET pesDesNome = '$pessoa->pesDesNome' WHERE pesCod = $pessoa->pesCod";
        if ($this->db->mysqli->query($sql)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function delete($pessoa)
    {
        $sql = "DELETE FROM Pessoas WHERE pesCod = $pessoa->pesCod";
        if ($this->db->mysqli->query($sql)) {
            return 1;
        } else {
            return 0;
        }
    }
}
