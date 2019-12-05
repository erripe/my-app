<?php
include $_SERVER['DOCUMENT_ROOT'] . '/my-app/com/service/LoginService.class.php';

if (isset($_POST['action'])) {

    $controller = new LoginController();
    switch ($_POST['action']) {
        case 'login':
            $usuario = new Usuario();
            if (isset($_POST['usnDesNome'])) {
                $usuario->usnDesNome = $_POST['usnDesNome'];
            }
            if (isset($_POST['usnDesPass'])) {
                $usuario->usnDesPass = $_POST['usnDesPass'];
            }
            echo json_encode(array("return" => $controller->login($usuario)));
            break;
        case 'update':
            $usuario = new Usuario();
            if (isset($_POST['usnCod'])) {
                $usuario->usnCod = $_POST['usnCod'];
            }
            if (isset($_POST['usnDesNome'])) {
                $usuario->usnDesNome = $_POST['usnDesNome'];
            }
            if (isset($_POST['usnDesPass'])) {
                $usuario->usnDesPass = $_POST['usnDesPass'];
            }
            if ($usuario->usnCod != '') {
                echo json_encode(array("return" => $controller->update($usuario)));
            } else {
                echo json_encode(array("return" => $controller->insert($usuario)));
            }
            break;
        case 'delete':
            echo json_encode(array("return" => $controller->delete($_POST['usnCod'])));
            break;
    }
}

class LoginController
{

    public function __construct()
    { }

    public function login($usuario)
    {
        $service = new LoginService();
        return $service->login($usuario);
    }

    public function findById($pesCod)
    {
        $service = new LoginService();
        return $service->findById($pesCod);
    }

    public function list()
    {
        $service = new LoginService();
        return $service->list();
    }

    public function insert($usuario)
    {
        $service = new LoginService();
        return $service->insert($usuario);
    }

    public function update($usuario)
    {
        $service = new LoginService();
        return $service->update($usuario);
    }

    public function delete($usnCod)
    {
        $service = new LoginService();
        return $service->delete($usnCod);
    }
}
