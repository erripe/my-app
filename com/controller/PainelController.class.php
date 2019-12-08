<?php
include $_SERVER['DOCUMENT_ROOT'] . '/com/service/PainelService.class.php';

if (isset($_POST['action'])) {

    $controller = new PainelController();
    switch ($_POST['action']) {
        case 'update':
            $produto = new Produto();
            if (isset($_POST['prdCod'])) {
                $produto->prdCod = $_POST['prdCod'];
            }
            if (isset($_POST['prdDesNome'])) {
                $produto->prdDesNome = $_POST['prdDesNome'];
            }
            if (isset($_POST['prdMnyValor'])) {
                $produto->prdMnyValor = $_POST['prdMnyValor'];
            }
            if (isset($_POST['prdEspDesc'])) {
                $produto->prdEspDesc = $_POST['prdEspDesc'];
            }
            if (isset($_FILES['prdImage'])) {
                $produto->prdImage = $_FILES['prdImage'];
            }
            if ($produto->prdCod != '') {
                echo json_encode(array("return" => $controller->update($produto)));
            } else {
                echo json_encode(array("return" => $controller->insert($produto)));
            }

            break;
        case 'delete':
            echo json_encode(array("return" => $controller->delete($_POST['prdCod'])));
            break;
    }
}

class PainelController
{

    public function __construct()
    { }

    public function findById($prdCod)
    {
        $service = new PainelService();
        return $service->findById($prdCod);
    }

    public function findList($prdDesNome)
    {
        $service = new PainelService();
        return $service->findList($prdDesNome);
    }

    public function listagem()
    {
        $service = new PainelService();
        return $service->listagem();
    }

    public function insert($produto)
    {
        $service = new PainelService();
        return $service->insert($produto);
    }

    public function update($produto)
    {
        $service = new PainelService();
        return $service->update($produto);
    }

    public function delete($prdCod)
    {
        $service = new PainelService();
        return $service->delete($prdCod);
    }
}
