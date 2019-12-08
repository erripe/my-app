<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once $_SERVER['DOCUMENT_ROOT'] . '/com/controller/LoginController.class.php';
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
}

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
  <link rel="stylesheet" href="view/css/dashboard.css">
  <link rel="stylesheet" href="view/css/main.css">

</head>

<body>
  <!-- NavBar -->
  <?php include_once("navbar.php"); ?>
  <div class="container-fluid">
    <div class="row">
      <?php include_once "painelLateral.php"; ?>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Cadastro de Usuários</h1>
        </div>

        <div class="container_table">
          <div class="row">
            <div class="col-12">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 15%" scope="col">Código</th>
                    <th style="width: 35%" scope="col">Login</th>
                    <th style="width: 35%" scope="col">Senha</th>
                    <th style="width: 15%" scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $controller = new LoginController();
                  $list = $controller->list();
                  if (count($list) > 0) {
                    foreach ($list as $value) {
                      echo '<tr>';
                      echo '<th scope="row">' . $value->usnCod . '</th>';
                      echo '<td>' . $value->usnDesNome . '</td>';
                      echo '<td>' . $value->usnDesPass . '</td>';
                      echo '<td class="middle">
                      <a href="PainelUsuarioEdicao.php?usnCod=' . $value->usnCod . '" id="btnEdit"  class="btn btn-edit btn-success"><i class="fas fa-edit"></i></a>
                      <button id="btnDelete" value="' . $value->usnCod . '" type="button" class="btn btn-delete btn-danger"><i class="far fa-trash-alt"></i></button>
                      </td>
                      </tr>';
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="view/js/jquery-3.4.1.min.js"></script>
  <script src="view/js/notify.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
  <script src="https://kit.fontawesome.com/6eb9089d0e.js"></script>

  <script>
    $(document).ready(
      $(".btn-delete").click(function() {
        var id = $(this).val();
        var result = confirm("Deseja deletar o registro?");
        if (result) {
          $.ajax({
            url: "com/controller/LoginController.class.php",
            type: "POST",
            dataType: "json",
            data: {
              action: 'delete',
              usnCod: id
            },
            success: function(response) {
              if (response.return === 1) {
                location.reload();
              } else {
                alert("Erro ao realizar a operação.");
              }
            },
            error: function(response) {
              alert('ERRO!');
            }
          });
        }
      })
    );
  </script>



</body>

</html>