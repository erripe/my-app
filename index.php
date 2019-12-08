<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/html/com/controller/MainController.class.php';
?>
<!DOCTYPE html>
<!-- saved from url=(0052)https://getbootstrap.com/docs/4.3/examples/product/# -->
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
  <link href="view/css/carousel.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>

</head>

<body>
  <!-- NavBar -->
  <?php include_once("navbar.php"); ?>
  <main role="main">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class=""></li>
        <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item">
          <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
            <rect width="100%" height="100%" fill="#777"></rect>
          </svg>
          <div class="container">
            <div class="carousel-caption text-left">
              <h1>Deseja fazer seu orçamento?</h1>
              <p>Entre em contato conosco e faça seu orçamento. Jóias personalizadas, com exclusividade para você!</p>
              <p><a class="btn btn-lg btn-primary" href="" role="button">Orçamento</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item active">
          <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
            <rect width="100%" height="100%" fill="#777"></rect>
          </svg>
          <div class="container">
            <div class="carousel-caption">
              <h1>Oficina de Jóias e Relógios</h1>
              <p>60 anos de tradição, transformando os seus sonhos em arte.</p>
              <p><a class="btn btn-lg btn-primary" href="" role="button">Leia mais</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
            <rect width="100%" height="100%" fill="#777"></rect>
          </svg>
          <div class="container">
            <div class="carousel-caption text-right">
              <h1>Já viu nosso catalogo de produtos?</h1>
              <p>Os mais belos relógios e jóias especialmente para você. Visite nossa galeria.</p>
              <p><a class="btn btn-lg btn-primary" href="catalogo.php" role="button">Galeria</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!-- Marketing messaging and featurettes
        ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
      <!-- START THE FEATURETTES -->
      <?php
      $controller = new MainController();
      $list = $controller->listagem();

      $list[0]->prdCod;

      echo '<div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">' . $list[0]->prdDesNome . '
          </h2>
          <p class="lead">' . $list[0]->prdEspDesc . '</p>
        </div>
        <div class="col-md-5">
          <img class="zoom bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="view/img/produtos/' . $list[0]->prdImageName . '" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500">
            <title>' . $list[0]->prdDesNome . '</title>
            <rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em"></text>
          </svg>
        </div>
      </div>

      <hr class="featurette-divider">';

      echo '<div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading">' . $list[1]->prdDesNome . '
          </h2>
          <p class="lead">' . $list[1]->prdEspDesc . '</p>
        </div>
        <div class="col-md-5 order-md-1">
        <img class="zoom bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="view/img/produtos/' . $list[1]->prdImageName . '" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500">
            <title>' . $list[1]->prdDesNome . '</title>
            <rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em"></text>
          </svg>
        </div>
      </div>

      <hr class="featurette-divider">';

      echo '<div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">' . $list[2]->prdDesNome . '
          </h2>
          <p class="lead">' . $list[2]->prdEspDesc . '</p>
        </div>
        <div class="col-md-5">
        <img class="zoom bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="view/img/produtos/' . $list[2]->prdImageName . '" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500">
            <title>' . $list[2]->prdDesNome . '</title>
            <rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em"></text>
          </svg>
        </div>
      </div>

      <hr class="featurette-divider">';
      ?>

      <!-- /END THE FEATURETTES -->
    </div>
    <!-- footer -->
    <?php include_once("footer.php"); ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script src="https://kit.fontawesome.com/6eb9089d0e.js"></script>
</body>

</html>