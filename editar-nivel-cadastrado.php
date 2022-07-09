<?php
    require_once 'global.php';
try{
    $nivel = new Nivel();
    $nivel->setIdNivel($_POST['idNivel']);
    $nivel->setNivel($_POST['nivel']);
    echo $nivel->editar();
    header("Location: usuario.php");
}
catch(Exception $e){
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
?>