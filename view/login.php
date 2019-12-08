<?php
include('com/controller/LoginController.class.php');
session_start();

if (isset($_POST['login'])) {
  $_SESSION['login'] = $_POST['login'];
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
  <link rel="stylesheet" href="/view/css/signin.css">
  <link rel="stylesheet" href="/view/css/main.css">

</head>

<body>
  <!-- NavBar -->
  <?php include_once("navbar.php"); ?>
  <!--Form Login-->
  <div class="container login-container">
    <div class="row">
      <form class="form-signin">
        <!-- <img class="mb-4" src="{{ site.baseurl }}/docs/{{ site.docs_version }}/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="usnDesNome" class="sr-only">Login</label>
        <input type="text" id="usnDesNome" class="form-control" placeholder="Login" required autofocus>
        <label for="usnDesPass" class="sr-only">Password</label>
        <input type="password" id="usnDesPass" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button id="btnLogin" class="btn btnLogin btn-primary btn-block" type="button">Sign in</button>
      </form>
    </div>
  </div>
  <!-- footer -->
  <?php include_once("footer.php"); ?>

  <script src="/view/js/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
  <script src="https://kit.fontawesome.com/6eb9089d0e.js"></script>

  <script>
    $(document).ready(
      $(".btnLogin").click(function(e) {
        var usnDesNome = document.getElementById("usnDesNome").value;
        var usnDesPass = document.getElementById("usnDesPass").value;
        var form_data = new FormData();
        form_data.append('action', 'login');
        form_data.append('usnDesNome', usnDesNome);
        form_data.append('usnDesPass', usnDesPass);

        $.ajax({
          type: "POST",
          url: "/com/controller/LoginController.class.php",
          dataType: 'json',
          data: form_data,
          cache: false,
          contentType: false,
          processData: false,
          success: function(response) {
            if (response.return === null) {
              alert("Senha ou login não encontrados.");
            } else {
              alert("Login realizado com sucesso.");
              $.ajax({
                data: {
                  "login": response.return['usnDesNome']
                },
                url: '/view/login.php',
                type: 'post'
              });
              window.location.href = "/view/painelListagem.php";
            }
          }
        });
      })
    );
  </script>
</body>

</html>