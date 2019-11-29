<?php
include $_SERVER['DOCUMENT_ROOT'] . '/my-app/com/service/PainelService.class.php';

if (isset($_POST['action'])) {

    $controller = new PainelController();
    switch ($_POST['action']) {
        case 'put':
            $controller->update();
            break;
        case 'get':
            $controller->insert();
            break;
        case 'delete':
            echo json_encode(array("return" => $controller->delete($_POST['prdCod'])));
            break;
        case 'image':
            echo json_encode(array("imgStr" => $controller->getImage($_POST['prdCod'])));
            break;
    }
}

class PainelController
{

    public function __construct()
    { }

    public function listagem()
    {
        $service = new PainelService();
        return $service->listagem();
    }

    public function delete($prdCod)
    {
        $service = new PainelService();
        return $service->delete($prdCod);
    }

    public function getImage($prdCod)
    {
        $service = new PainelService();
        return $service->getImage($prdCod);
    }
}
