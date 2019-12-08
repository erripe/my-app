<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/html/com/controller/PainelController.class.php';
?>

<header>
    <nav class="navbar navbar-expand-md navbar-blue fixed-top bg-light">
        <a class="navbar-brand" href="/index.php">Loss</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="catalogo.php">Produtos</a>
                    </div>
                </li>
            </ul>
            <form action="catalogo.php" class="form-inline mt-2 mt-md-0">
                <input name="prdDesNome" id="procurar" class="procurar form-control mr-sm-2" type="text" placeholder="Procurar" aria-label="Procurar">
            </form>
            <a href="painelListagem.php">
                <svg class="icons" xmlns="http://www.w3.org/2000/svg" width="24" ; height="24" viewBox="0 0 14 16">
                    <path fill-rule="evenodd" d="M14 8.77v-1.6l-1.94-.64-.45-1.09.88-1.84-1.13-1.13-1.81.91-1.09-.45-.69-1.92h-1.6l-.63 1.94-1.11.45-1.84-.88-1.13 1.13.91 1.81-.45 1.09L0 7.23v1.59l1.94.64.45 1.09-.88 1.84 1.13 1.13 1.81-.91 1.09.45.69 1.92h1.59l.63-1.94 1.11-.45 1.84.88 1.13-1.13-.92-1.81.47-1.09L14 8.75v.02zM7 11c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3z" />
                </svg>
            </a>

            <?php
            if (isset($_SESSION["login"])) {
                echo '
                <a href="logout.php">
                    <svg class="icons" xmlns="http://www.w3.org/2000/svg" width="24" ; height="24" viewBox="0 0 14 16">
                        <path fill-rule="evenodd" d="M12 9V7H8V5h4V3l4 3-4 3zm-2 3H6V3L2 1h8v3h1V1c0-.55-.45-1-1-1H1C.45 0 0 .45 0 1v11.38c0 .39.22.73.55.91L6 16.01V13h4c.55 0 1-.45 1-1V8h-1v4z" />
                    </svg>
                </a>';
            }
            ?>

        </div>
    </nav>
</header>

<script src="view/js/jquery-3.4.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.procurar').keydown(function(event) {
            if (event.keyCode == 13) {
                this.form.submit();
                return false;
            }
        });

    });
</script>