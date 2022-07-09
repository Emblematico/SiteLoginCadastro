<?php
    require_once 'global.php';
try{
    $nivel = new Nivel();
    $nivel->setNivel($_POST['number']);
    echo $nivel->cadastrar();
    header("Location: usuario.php");
}
catch(Exception $e){
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
?>