<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
        $this->usuario = "loss";
        $this->senha = "1234";
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
