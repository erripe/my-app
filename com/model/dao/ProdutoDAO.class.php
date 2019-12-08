<?php
include_once('com/util/Database.class.php');

class ProdutoDAO
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function findById($prdCod)
    {
        $sql = "SELECT * FROM Produtos WHERE prdCod = $prdCod";
        $result = $this->db->mysqli->query($sql);
        return $result->fetch_object();
    }

    public function findList($prdDesNome)
    {
        $sql = "SELECT * FROM Produtos WHERE prdDesNome LIKE ('%" . $prdDesNome . "%') ORDER BY prdDtaCadastro DESC";
        $result = $this->db->mysqli->query($sql);
        $rows = [];
        while ($entry = $result->fetch_object()) {
            $rows[] = $entry;
        }
        return $rows;
    }

    public function list()
    {
        $sql = "SELECT * FROM Produtos ORDER BY prdDtaCadastro DESC";
        $result = $this->db->mysqli->query($sql);
        $rows = [];
        while ($entry = $result->fetch_object()) {
            $rows[] = $entry;
        }
        return $rows;
    }

    public function listMain()
    {
        $sql = "SELECT * FROM Produtos ORDER BY prdDtaCadastro DESC LIMIT 3";
        $result = $this->db->mysqli->query($sql);
        $rows = [];
        while ($entry = $result->fetch_object()) {
            $rows[] = $entry;
        }
        return $rows;
    }

    public function insert($produto)
    {
        $ext = strtolower(substr($produto->prdImage['name'], -4));
        $new_name =  md5(time()) . $ext;
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/view/img/produtos/';
        move_uploaded_file($produto->prdImage['tmp_name'], $dir . $new_name);

        $sql = "INSERT INTO Produtos (prdDesNome, prdMnyValor, prdEspDesc, prdImageName, prdDtaCadastro) VALUES (?, ?, ?, ?, SYSDATE())";
        $stmt = $this->db->mysqli->prepare($sql);
        $stmt->bind_param('sdss', $produto->prdDesNome, $produto->prdMnyValor, $produto->prdEspDesc, $new_name);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function update($produto)
    {
        $ext = strtolower(substr($produto->prdImage['name'], -4));
        $new_name =  md5(time()) . $ext;
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/view/img/produtos/';
        move_uploaded_file($produto->prdImage['tmp_name'], $dir . $new_name);

        $sql = "UPDATE Produtos SET prdDesNome= ?, prdMnyValor= ?, 
                                    prdEspDesc= ?, prdImageName= ?, 
                                    prdDtaCadastro= SYSDATE() WHERE prdCod= $produto->prdCod";
        $stmt = $this->db->mysqli->prepare($sql);
        $stmt->bind_param('sdss', $produto->prdDesNome, $produto->prdMnyValor, $produto->prdEspDesc, $new_name);
        if ($stmt->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function delete($prdCod)
    {

        $sql = "DELETE FROM Produtos WHERE prdCod = $prdCod";
        if (!$this->db->mysqli->query($sql)) {
            echo "Sql error!";
        }
        if ($this->db->mysqli->affected_rows > 0) {
            return 1;
        } else {
            return 0;
        }
    }
}
