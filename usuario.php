<?php
session_start();
require_once "global.php";
if(!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    die;
}
if(isset($_GET["logout"])) {
    unset($_SESSION["usuario"]);
    echo "<script type='text/javascript'>window.location.reload();</script>";
}
$action = "none";
if(isset($_GET["action"])) {
    $action = $_GET["action"];
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon">
    <title>Usuário</title>
    <script type="application/javascript" src="js/ajax.js"></script>
    <!--DIALOGOS-->
    <link rel="stylesheet" id="dialog-lights" type="text/css" href="HiperDialog-master/src/css/color/default.css">
    <link rel="stylesheet" type="text/css" href="HiperDialog-master/src/css/style.css">
    <script type="application/javascript" src="HiperDialog-master/src/js/core.js"></script>
    <script type="application/javascript" src="HiperDialog-master/src/js/extra.js"></script>
    <!--/DIALOGOS-->
</head>
<body style="background-image: url('./img/floresta.jpg'); background-size: cover; background-repeat: no-repeat;">
<nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="usuario.php">
            <img src="img/icon.png" width="30" height="30" alt="">
            Renovation Company
        </a>
        </nav>
<section class="sample-text-area">
        <div class="container">
        <div class="row">
    <div class="col-md-12">
        <div class="single-defination">
        <div class="card">
  <h5 class="card-header">Pesquise um Usuário</h5>
  <div class="card-body">
  <form class="form-group my-2 my-lg-8" action="buscar-usuario.php">
            <h3>Pesquisa...</h3>
            <input class="form-control mr-sm-2" type="search" name="campoPesquisaUsuario" id="campoPesquisaUsuario" placeholder="Pesquisar" aria-label="Pesquisar">
            </form>
  </div>
</div>
<div class="card">
  <div class="card-body">
  <h1>Tabela de Usuário</h1>
                <div class="table-responsive">
            <table class="table table-borderless table-dark">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Usuário</th>
            <th scope="col">Email</th>
            <th scope="col">IdNível</th>
            <th scope="col" class="acao">Editar</th>
            <th scope="col" class="acao">Excluir</th>
            </tr>
        </thead>
        <tbody id='resultadoUsuario'>

        </tbody>
        </table>
        </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
  <h1>Tabela de Nível</h1>
                <div class="table-responsive">
                <table class="table table-borderless table-dark">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nível</th>
            <th scope="col" class="acao">Editar</th>
            <th scope="col" class="acao">Excluir</th>
            </tr>
        </thead>
        <tbody id='resultadoNivel'>

        </tbody>
        </table>
        </div>
  </div>
</div>
    <?php
        if($action=="none") {
    ?>
    <div class="card">
  <h5 class="card-header">Cadastro de Nível</h5>
  <div class="card-body">
  <form action="cadastro-nivel.php" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputnivel">Nível</label>
            <input type="text" id="inputnivel" name="number" placeholder="Nivel" class="form-control">
            </div>
            </div>
        <button type="submit" class="btn btn-primary">Cadastra</button>
        </form>
  </div>
</div>
    <?php
        } else if($action=="editar-nivel") {
            
        try {
            $nivel = Nivel::get($_GET['id']);
        } catch(Exception $e) {
            echo '<pre>';
                print_r($e);
            echo '</pre>';
            echo $e->getMessage();
        }
    ?>
<div class="card">
  <h5 class="card-header">Editar Nível</h5>
  <div class="card-body">
  <form action="editar-nivel-cadastrado.php" method="post">
            <div class="form-row">
            <div class="form-group col-md-6">
            <input type="hidden" name="idNivel" value="<?php echo $nivel["idNivel"]; ?>">
            <label for="inputnivel2">Nível</label>
            <input type="text" id="inputnivel2" class="form-control" name="nivel" placeholder="Nivel" value="<?php echo $nivel["Nivel"]; ?>">
            </div>
            </div>
        <button type="submit" class="btn btn-primary">Cadastra</button>
            </form>
  </div>
</div>
    <?php
        }
        ?>
        <?php
            try {
                $usuario = new Usuario();
                $lista = $usuario->listar();
            } catch(Exception $e) {
                echo '<pre>';
                    print_r($e);
                echo '</pre>';
                echo $e->getMessage();
            }
        ?>
    <?php
    if($action=="none") {
    ?>
    <div class="card">
  <h5 class="card-header">Cadastro de Usuário</h5>
  <div class="card-body">
  <form action="cadastro-usuario.php" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEmai">Email</label>
            <input type="email" class="form-control" id="inputEmai" name="email" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
            <label for="inputPassword">Senha</label>
            <input type="password" class="form-control" id="inputPassword" name="pass" placeholder="Senha">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputnome">Username</label>
            <input type="text" id="inputnome" class="form-control" name="usuario" placeholder="Username">
            </div>
            <div class="form-group col-md-6">
            <label for="inputnivel3">Nível</label>
            <select name="number" id="inputnivel3" class="form-control">
        <?php
        $listaNivel = (new Nivel())->listar();
        foreach($listaNivel as $nivel) {
    ?>
            <option value="<?php echo $nivel["idNivel"]; ?>"><?php echo $nivel["Nivel"];?></option>
                <?php
        }
    ?>
            </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastra</button>
        </form>
  </div>
</div>
    <?php
    } else if($action=="editar") {

        try {
            $usuario = Usuario::get($_GET['id']);
        } catch(Exception $e) {
            echo '<pre>';
                print_r($e);
            echo '</pre>';
            echo $e->getMessage();
        }?>
<div class="card">
  <h5 class="card-header">Editar Usuário</h5>
  <div class="card-body">
  <form action="editar-usuario-cadastrado.php" method="post">
        <div class="form-row">
        <input type="hidden" name="idUser" value="<?php echo $usuario["idUser"]; ?>">
            <div class="form-group col-md-6">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="<?php echo $usuario["Email"]; ?>">
            </div>
            <div class="form-group col-md-6">
            <label for="inputPassword">Senha</label>
            <input type="password" class="form-control" id="inputPassword" name="pass" placeholder="Senha" value="<?php echo $usuario["Senha"]; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputnome">Username</label>
            <input type="text" class="form-control" id="inputnome" name="usuario" placeholder="Username" value="<?php echo $usuario["Usuario"]; ?>">
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputnivel3">Nível</label>
            <input type="text" class="form-control" id="inputnivel3" name="number" placeholder="Nivel" value="<?php echo $usuario["idNivel"]; ?>">
            </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
  </div>
</div>
    <?php
    }
    ?>
 	<div class="center">
    <a href="usuario.php?logout" class="btn btn-danger btn-lg btn-block" role="button" aria-pressed="true">Desloga</a>   
    </div>
        </div>
        </div>
        </div>
    </div>
    <footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="navbar-light bg-light p-3">
  &copy; 2022 Todos os direitos reservados.
  </div>
  <!-- Copyright -->
</footer>
</div>
    </section>
    <script src="js/pesquisa-nivel.js" ></script>
    <script src="js/pesquisa-usuario.js" ></script>
</body>
</html>