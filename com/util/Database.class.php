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
        $this->servidor = "localhost";
        $this->usuario = "root";
        $this->senha = "123456";
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
