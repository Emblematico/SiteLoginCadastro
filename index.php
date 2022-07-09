<?php
include __DIR__."/global.php";

session_start();
if(isset($_SESSION["usuario"])) {
    header("Location: usuario.php");
    die;
}
if(isset($_POST)) {
    if(isset($_POST["nome"])&&isset($_POST["pass"])) {
        $usuario = new Usuario();
        $usuario->setUsuario($_POST["nome"]);
        $usuario->setSenha($_POST["pass"]);
        if($usuario->login()) {
            $_SESSION["usuario"] = $usuario;
            echo "<script type='text/javascript'>window.location.reload();</script>";
        } else {
            unset($_SESSION["usuario"]);
            echo "<script type='text/javascript'>window.addEventListener('load', function() { alertDialog('Usuario ou senha não cadastrado', 'Ocorreu um erro');})</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon">

    <!--DIALOGOS-->
    <link rel="stylesheet" id="dialog-lights" type="text/css" href="HiperDialog-master/src/css/color/default.css">
    <link rel="stylesheet" type="text/css" href="HiperDialog-master/src/css/style.css">
    <script type="application/javascript" src="HiperDialog-master/src/js/core.js"></script>
    <script type="application/javascript" src="HiperDialog-master/src/js/extra.js"></script>
    <!--/DIALOGOS-->
    <title>Login</title>
</head>
<body style="background-image: url('./img/floresta.jpg'); background-size: cover; background-repeat: no-repeat;">
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
          <form action="index.php" method="post">
          <img src="img/folha.png"
                    style="width: 185px;" alt="logo">
            <h3 class="mb-5">Entrar</h3>

            <div class="form-outline mb-4">
              <input type="text" id="typeEmailX-2" class="form-control form-control-lg" name="nome" placeholder="Username" value="<?php echo @$_POST["nome"]; ?>">
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="pass" placeholder="Password">
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

            <hr class="my-4">

            <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
              type="submit"><i class="fab fa-google me-2"></i>Entrar com google</button>
            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
              type="submit"><i class="fab fa-facebook-f me-2"></i>Entrar com facebook</button>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    </body>
</html>