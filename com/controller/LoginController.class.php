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
        case 'delete':
            //echo json_encode(array("return" => $controller->delete($_POST['pesCod'])));
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
}
