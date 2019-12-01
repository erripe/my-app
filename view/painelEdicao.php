<?php
include $_SERVER['DOCUMENT_ROOT'] . '/my-app/com/controller/PainelController.class.php';
session_start();
$controller = new PainelController();
$produto = new Produto();
if (isset($_GET['prdCod'])) {
  $prdCod = $_GET['prdCod'];
  $produto = $controller->findById($prdCod);
}
?>
<!DOCTYPE html>
<!-- saved from url=(0052)https://getbootstrap.com/docs/4.3/examples/product/# -->
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
  <link rel="stylesheet" href="view/css/dashboard.css">
  <link rel="stylesheet" href="view/css/main.css">

</head>

<body>
  <!-- NavBar -->
  <?php include_once("navbar.php"); ?>
  <div class="container-fluid">
    <div class="row">
      <?php include_once("painelLateral.php"); ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Cadastro de Produtos</h1>
        </div>
        <div class="container_new">
          <div class="row">
            <div class="col-md-8 order-md-1">
              <form name="form" method="POST" action="" class="needs-validation" novalidate>
                <input type="hidden" id="prdCod" name="prdCod" value="<?php echo $produto->prdCod; ?>">
                <!-- form multi plataform para submeter imagem -->
                <div class="row">
                  <div class="col-md-12 mb-3">
                    <label for="prdDesNome">Nome</label>
                    <input type="text" class="form-control" id="prdDesNome" placeholder="" value="<?php echo $produto->prdDesNome; ?>" required>
                    <div class="invalid-feedback">
                      Nome do produto inválido.
                    </div>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="prdImageName">Imagem</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="prdImageName">Upload</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="prdImageName" aria-describedby="prdImageName">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="prdEspDesc">Descrição</label>
                  <input type="text" class="form-control" id="prdEspDesc" placeholder="" value="<?php echo $produto->prdEspDesc; ?>">
                  <div class="invalid-feedback">
                    Descrição do produto inválido.
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="prdMnyValor">Valor</label>
                    <input type="text" class="form-control" id="prdMnyValor" placeholder="" value="<?php echo $produto->prdMnyValor; ?>" required>
                    <div class="invalid-feedback">
                      Valor inválido.
                    </div>
                  </div>
                </div>

                <hr class="mb-4">
                <input class="btn btn-success btn-lg btn-block" id="submit" type="button" value="Salvar">
                <!-- <button class="btn btn-save btn-success btn-lg btn-block" type="button">Salvar</button> -->
                <button class="btn btn-clean btn-danger btn-lg btn-block" type="button">Excluir</button>
              </form>
            </div>
          </div>

      </main>
    </div>
  </div>

  <script src="/my-app/view/js/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
  <script src="https://kit.fontawesome.com/6eb9089d0e.js"></script>

  <script>
    $(document).ready(
      $("#submit").click(function(e) {
        var prdCod = document.getElementById("prdCod").value;
        var prdDesNome = document.getElementById("prdDesNome").value;
        var prdMnyValor = document.getElementById("prdMnyValor").value;
        var prdEspDesc = document.getElementById("prdEspDesc").value;
        //var prdImageName = document.getElementById("prdImageName").value;
        //var prdImage = document.getElementById("prdImage").value;
        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'prdCod=' + prdCod + '&prdDesNome=' + prdDesNome + '&prdMnyValor=' + prdMnyValor + '&prdEspDesc=' + prdEspDesc;

        // AJAX code to submit form.
        $.ajax({
          type: "POST",
          url: "/my-app/com/controller/PainelController.class.php",
          data: {
            action: 'update',
            prdCod: prdCod,
            prdDesNome: prdDesNome,
            prdMnyValor: prdMnyValor,
            prdEspDesc: prdEspDesc
          },
          cache: false,
          success: function(response) {
            if (response.return !== "") {
              alert("Operação realizada com sucesso.");
              if (prdCod !== "") {
                window.location.href = "/my-app/view/painelListagem.php";
              } else {
                location.reload();
              }
            } else {
              alert("Erro ao realizar a operação.");
            }
          }
        });
      }));
  </script>

</body>

</html>