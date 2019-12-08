<?php

class Database
{
    public $servidor;
    public $usuario;
    public $senha;
    public $banco;
    public $mysqli;

    public function __construct()
    {
        $this->servidor = "teste.com.zz";
        $this->usuario = "root";
        $this->senha = "";
        $this->banco = "ReloLoss";

        $this->mysqli = new mysqli($this->servidor, $this->usuario, $this->senha, $this->banco);

        if (mysqli_connect_errno()) {
            printf("Erro na conexão. ", mysqli_connect_error());
            exit();
        }
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }
}
