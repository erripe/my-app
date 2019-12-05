<?php
include $_SERVER['DOCUMENT_ROOT'] . '/my-app/com/model/Usuario.class.php';

class LoginService
{
    public function __construct()
    { }

    public function login($usuario)
    {
        $return = $usuario->login($usuario);
        return $return;
    }
}
