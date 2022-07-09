<?php 

require_once 'global.php';

try{
    //header("Location: usuario.php");
    $usuario = new Usuario();
    $usuario->setIdUser($_GET['id']);
    echo $usuario->excluir();
}
catch(Exception $e){
    /*echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();*/
}
 ?>