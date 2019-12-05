<?php
include $_SERVER['DOCUMENT_ROOT'] . '/my-app/com/model/dao/PessoaDAO.class.php';

class Pessoa
{
    public $pesCod;
    public $pesDesNome;

    public function __construct()
    { }

    public function findById($pesCod)
    {
        $pessoaDAO = new PessoaDAO();
        return $pessoaDAO->findById($pesCod);
    }

    public function list()
    {
        $pessoaDAO = new PessoaDAO();
        return $pessoaDAO->list();
    }

    public function insert()
    {
        $pessoaDAO = new PessoaDAO();
        return $this->pesCod = $pessoaDAO->insert($this);
    }

    public function update()
    {
        $pessoaDAO = new PessoaDAO();
        return $pessoaDAO->update($this);
    }

    public function delete()
    {
        $pessoaDAO = new PessoaDAO();
        return $pessoaDAO->delete($this);
    }
}
