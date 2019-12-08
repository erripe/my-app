<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once $_SERVER['DOCUMENT_ROOT'] . '/com/controller/PainelController.class.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Emmanoel Loss">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Relojoaria Loss</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="view/css/main.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>

</head>

<body>
    <!-- NavBar -->
    <?php include_once("navbar.php"); ?>

    <!-- Marketing messaging and featurettes
        ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
        <!-- START THE FEATURETTES -->

        <div class="flex-wrap pt-3 pb-2 mb-200 mt-2 border-bottom">
            <h1 class="h2">Produtos</h1>
        </div>

        <div class="album py-5">
            <div class="container">
                <div class="row">

                    <?php
                    $controller = new PainelController();
                    if (isset($_GET['prdDesNome'])) {
                        $list = $controller->findList($_GET['prdDesNome']);
                    } else {
                        $list = $controller->listagem();
                    }

                    if (count($list) > 0) {
                        foreach ($list as $value) {
                            echo '
                                <div id="boxProduto" class="col-md-4">
                                    <!--Card-->
                                    <div class="card mb-4 shadow-sm">
                                        <!--Card image-->
                                        <div class="view overlay">
                                            <a href="" data-toggle="modal" data-target="#modalQuickView' . $value->prdCod . '" class="dark-grey-text">
                                            <img width="100%" height="325" src="view/img/produtos/' . $value->prdImageName . '" class="card-img-top" alt="">
                                            <a>
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>
                                        <!--Card content-->
                                        <div class="card-body text-center" style="height: 150px;">
                                            <!--Title-->
                                            <h5>
                                                <strong>
                                                    <a href="" data-toggle="modal" data-target="#modalQuickView' . $value->prdCod . '" class="dark-grey-text">' . $value->prdDesNome;
                            if ($value->prdDtaCadastro > date('Y-m-d', strtotime('-1 month'))) {
                                echo '<span class="badge badge-pill danger-color">NEW</span>';
                            }
                            echo '</a>
                                                </strong>
                                            </h5>
                
                                            <h4 class="font-weight-bold blue-text">
                                                <strong>R$ ' . $value->prdMnyValor . '</strong>
                                            </h4>
                                        </div>
                                        <!--Card content-->
                                    </div>
                                    <!--/Card-->
                                </div>';
                            echo '    
                            <!-- Modal: modalQuickView -->
                            <div class="modal fade" id="modalQuickView' . $value->prdCod . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <!--Image Wrapper-->
                                                    <div class="view overlay">
                                                        <img width="100%" height="325" src="view/img/produtos/' . $value->prdImageName . '" class="card-img-top" alt="">
                                                        <a>
                                                            <div class="mask rgba-white-slight"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <h2 class="h2-responsive product-name">
                                                        <strong>' . $value->prdDesNome . '</strong>
                                                    </h2>
                                                    <h4 class="h4-responsive">
                                                        <span class="green-text">
                                                            <strong>R$ ' . $value->prdMnyValor . '</strong>
                                                        </span>
                                                    </h4>
                        
                                                    <!--Accordion wrapper-->
                                                    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                        
                                                        <!-- Accordion card -->
                                                        <div class="card">
                        
                                                            <!-- Card header -->
                                                            <div class="card-header" role="tab" id="headingOne1">
                                                                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                                                                    <h5 class="mb-0">
                                                                        Detalhes do Produto <i class="fas fa-angle-down rotate-icon"></i>
                                                                    </h5>
                                                                </a>
                                                            </div>
                        
                                                            <!-- Card body -->
                                                            <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                                                                <div class="card-body">
                                                                ' . $value->prdEspDesc . '
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Accordion card -->
                                                    </div>
                                                    <!-- Accordion wrapper -->
                        
                                                    <!-- Add to Cart -->
                                                    <div class="card-body mt-2">
                                                        <div class="text-center">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.Add to Cart -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->
    <!-- footer -->
    <?php include_once("footer.php"); ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script src="https://kit.fontawesome.com/6eb9089d0e.js"></script>


</body>

</html>