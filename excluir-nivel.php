<?php 

require_once 'global.php';

try{
    //header("Location: usuario.php");
    $nivel = new Nivel();
    $nivel->setIdNivel($_GET['id']);
    echo $nivel->excluir();
}
catch(Exception $e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
 ?>