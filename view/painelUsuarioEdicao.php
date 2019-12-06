<?php
include $_SERVER['DOCUMENT_ROOT'] . '/my-app/com/controller/LoginController.class.php';
session_start();
$controller = new LoginController();
$usuario = new Usuario();
if (isset($_GET['usnCod'])) {
  $usnCod = $_GET['usnCod'];
  $usuario = $controller->findById($usnCod);
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
          <h1 class="h2">Cadastro de Usuários</h1>
        </div>
        <div class="container_new">
          <div class="row">
            <div class="col-md-8 order-md-1">
              <form name="form" method="POST" action="" class="needs-validation" enctype="multipart/form-data" novalidate>
                <input type="hidden" id="usnCod" name="usnCod" value="<?php echo $usuario->usnCod; ?>">
                <!-- form multi plataform para submeter imagem -->
                <div class="row">
                  <div class="col-md-12 mb-3">
                    <label for="usnDesNome">Login</label>
                    <input type="text" class="form-control" id="usnDesNome" placeholder="" value="<?php echo $usuario->usnDesNome; ?>" required>
                    <div class="invalid-feedback">
                      Nome do usuario inválido.
                    </div>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="usnDesPass">Senha</label>
                  <input type="password" class="form-control" id="usnDesPass" placeholder="" value="<?php echo $usuario->usnDesPass; ?>" required>
                  <div class="invalid-feedback">
                    Descrição do usuario inválido.
                  </div>
                </div>

                <hr class="mb-4">
                <input class="btn btn-success btn-lg btn-block" id="submit" type="button" value="Salvar">
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
        var usnCod = document.getElementById("usnCod").value;
        var usnDesNome = document.getElementById("usnDesNome").value;
        var usnDesPass = document.getElementById("usnDesPass").value;
        var form_data = new FormData();
        form_data.append('action', 'update');
        form_data.append('usnCod', usnCod);
        form_data.append('usnDesNome', usnDesNome);
        form_data.append('usnDesPass', usnDesPass);

        $.ajax({
          type: "POST",
          url: "/my-app/com/controller/LoginController.class.php",
          dataType: 'text',
          data: form_data,
          cache: false,
          contentType: false,
          processData: false,
          success: function(response) {
            if (response.return !== "") {
              alert("Operação realizada com sucesso.");
              if (usnCod !== "") {
                window.location.href = "/my-app/view/painelUsuarios.php";
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