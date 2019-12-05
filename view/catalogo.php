<?php
include $_SERVER['DOCUMENT_ROOT'] . '/my-app/com/controller/PainelController.class.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://localhost/my-app/" />
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
                    $list = $controller->listagem();
                    if (count($list) > 0) {
                        foreach ($list as $value) {
                            echo '
                                <div id="boxProduto" class="col-md-4">
                                    <!--Card-->
                                    <div class="card mb-4 shadow-sm">
                                        <!--Card image-->
                                        <div class="view overlay">
                                            <img width="100%" height="225" src="/my-app/view/img/produtos/' . $value->prdImageName . '" class="card-img-top" alt="">
                                            <a>
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>
                                        <!--Card content-->
                                        <div class="card-body text-center">
                                            <!--Title-->
                                            <h5>
                                                <strong>
                                                    <a href="" data-toggle="modal" data-target="#modalQuickView" class="dark-grey-text">' . $value->prdDesNome;
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

    <!-- Modal: modalQuickView -->
    <div class="modal fade" id="modalQuickView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <!--Carousel Wrapper-->
                            <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                                <!--Slides-->

                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="https://d2d7stu5fcdz3l.cloudfront.net/Custom/Content/Products/11/18/1118746_relogio-technos-elegance-crystal-2035mle4a-joias-vip_m1_637069353775570172" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="https://d2d7stu5fcdz3l.cloudfront.net/Custom/Content/Products/11/18/1118746_relogio-technos-elegance-crystal-2035mle4a-joias-vip_z2_637069359036983387.jpg" alt="Second slide">
                                    </div>
                                </div>
                                <!--/.Slides-->

                                <!--Controls-->
                                <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                <!--/.Controls-->

                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-thumb" data-slide-to="0" class="active">
                                        <img src="https://d2d7stu5fcdz3l.cloudfront.net/Custom/Content/Products/11/18/1118746_relogio-technos-elegance-crystal-2035mle4a-joias-vip_m1_637069353775570172" width="60">
                                    </li>
                                    <li data-target="#carousel-thumb" data-slide-to="1">
                                        <img src="https://d2d7stu5fcdz3l.cloudfront.net/Custom/Content/Products/11/18/1118746_relogio-technos-elegance-crystal-2035mle4a-joias-vip_z2_637069359036983387.jpg" width="60">
                                    </li>
                                </ol>


                            </div>
                            <!--/.Carousel Wrapper-->
                        </div>
                        <div class="col-lg-7">
                            <h2 class="h2-responsive product-name">
                                <strong>Relógio Feminino Technos Elegance Crystal 2035MLE/4A Rose</strong>
                            </h2>
                            <h4 class="h4-responsive">
                                <span class="green-text">
                                    <strong>R$ 674,10</strong>
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
                                            Relógio Feminino Technos Elegance Crystal 2035MLE/4A Rose<br>
                                            Caixa: Aço Rose<br>
                                            Pulseira: Aço Rose estilo esteira<br>
                                            Mostrador: Azul com strass<br>
                                            Resistência: 5 ATM<br>
                                            Visor em Cristal Mineral<br>
                                            Movimento Quartz<br>
                                            Fecho gancho<br>
                                            <br>
                                            Tamanho da Caixa: 38 mm<br>
                                            Espessura da Caixa: 9 mm<br>
                                            Tamanho da Pulseira: 22 cm<br>
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
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script src="https://kit.fontawesome.com/6eb9089d0e.js"></script>


</body>

</html>