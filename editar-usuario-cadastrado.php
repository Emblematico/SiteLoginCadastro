<?php
    require_once 'global.php';
try{
    $usuario = new Usuario();
    $usuario->setIdUser($_POST['idUser']);
    $usuario->setUsuario($_POST['usuario']);
    $usuario->setEmail($_POST['email']);
    $usuario->setSenha($_POST['pass']);
    $usuario->setidNivel($_POST['number']);
    echo $usuario->editar();
    header("Location: usuario.php");
}
catch(Exception $e){
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
?>