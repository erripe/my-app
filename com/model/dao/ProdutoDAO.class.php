<?php
include $_SERVER['DOCUMENT_ROOT'] . '/my-app/com/util/Database.class.php';

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

    public function list()
    {
        $sql = "SELECT * FROM Produtos";
        $result = $this->db->mysqli->query($sql);
        $rows = [];
        while ($entry = $result->fetch_object()) {
            $rows[] = $entry;
        }
        return $rows;
    }

    public function insert($produto)
    {

        $extensao = strtolower(substr($produto->prdImageName['name'], -4));
        $novo_nome =  md5(time()) . $extensao;
        $diretorio = "/my-app/view/image/produtos/file";

        //move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);
        $sql = "INSERT INTO Produtos (prdDesNome, prdMnyValor, prdEspDesc, prdImageName, prdDtaCadastro) VALUES (?, ?, ?, ?, SYSDATE())";
        $stmt = $this->db->mysqli->prepare($sql);
        $stmt->bind_param('sdss', $produto->prdDesNome, $produto->prdMnyValor, $produto->prdEspDesc, $produto->prdImageName);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function update($produto)
    {

        $sql = "UPDATE Produtos SET prdDesNome= ?, prdMnyValor= ?, 
                                    prdEspDesc= ?, prdImageName= ?, 
                                    prdDtaCadastro= SYSDATE() WHERE prdCod= $produto->prdCod";
        $stmt = $this->db->mysqli->prepare($sql);
        $stmt->bind_param('sdss', $produto->prdDesNome, $produto->prdMnyValor, $produto->prdEspDesc, $produto->prdImageName);
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
