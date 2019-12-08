<?php
include('com/service/MainService.class.php');

class MainController
{

    public function __construct()
    { }

    public function listagem()
    {
        $service = new MainService();
        return $service->listagem();
    }
}
