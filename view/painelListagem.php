<?php
include $_SERVER['DOCUMENT_ROOT'] . '/my-app/com/controller/PainelController.class.php';
session_start();
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
  <?php include_once "navbar.php"; ?>
  <div class="container-fluid">
    <div class="row">
      <?php include_once "painelLateral.php"; ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Cadastro de Produtos</h1>
        </div>

        <div class="container_table">
          <div class="row">
            <div class="col-12">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10%" scope="col">Código</th>
                    <th style="width: 20%" scope="col">Título</th>
                    <th style="width: 10%" scope="col">Valor</th>
                    <th style="width: 45%" scope="col">Descrição</th>
                    <th style="width: 15%" scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $controller = new PainelController();
                  $list = $controller->listagem();
                  if (count($list) > 0) {
                    foreach ($list as $value) {
                      echo '<tr>';
                      echo '<th scope="row">' . $value->prdCod . '</th>';
                      echo '<td>' . $value->prdDesNome . '</td>';
                      echo '<td>' . $value->prdMnyValor . '</td>';
                      echo '<td>' . $value->prdEspDesc . '</td>';
                      echo '<td class="middle">
                      <button id="btnImg" value="' . $value->prdCod . '" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-img btn-primary"><i class="far fa-eye"></i></button> 
                      <!--<button id="btnEdit" value="' . $value->prdCod . '"type="button" class="btn btn-edit btn-success"><i class="fas fa-edit"></i></button>-->
                      <a href="/my-app/view/PainelEdicao.php?prdCod=' . $value->prdCod . '" id="btnEdit"  class="btn btn-edit btn-success"><i class="fas fa-edit"></i></a>
                      <button id="btnDelete" value="' . $value->prdCod . '" type="button" class="btn btn-delete btn-danger"><i class="far fa-trash-alt"></i></button>
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

  <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <?php
          //$imagem = $_POST['imgStr'];
          //echo $imagem;
          //echo '<img np-src="data:image/jpeg;base64,' . $imagem . '"/>';
          ?>
        </div>
      </div>
    </div>
  </div>

  <script src="/my-app/view/js/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
  <script src="https://kit.fontawesome.com/6eb9089d0e.js"></script>

  <script>
    $(document).ready(
      $(".btn-delete").click(function() {
        var id = $(this).val();
        $.ajax({
          url: "/my-app/com/controller/PainelController.class.php",
          type: "POST",
          dataType: "json",
          data: {
            action: 'delete',
            prdCod: id
          },
          success: function(response) {
            if (response.return === 1) {
              alert("Operação realizada com sucesso.");
              location.reload();
            } else {
              alert("Erro ao realizar a operação.");
            }
          },
          error: function(response) {
            alert('ERRO!');
          }
        });
      }),
      $(".btn-img").click(function() {
        var id = $(this).val();
        $.ajax({
          url: "/my-app/com/controller/PainelController.class.php",
          type: "POST",
          dataType: "json",
          data: {
            action: 'image',
            prdCod: id
          },
          success: function(response) {
            $.post('/my-app/view/painelListagem.php', {
              imgStr: response.imgStr
            });
          },
          error: function(response) {
            $.post('/my-app/view/painelListagem.php', {
              imgStr: response.imgStr
            });
          }
        });
      })
    );
  </script>

</body>

</html>