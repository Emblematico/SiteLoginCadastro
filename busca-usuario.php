<?php
    require_once 'global.php';
try{
    $usuario = new Usuario();
    if(!empty($_GET['pesquisa'])){
        $campoPesquisa = $_GET['pesquisa']."%";
        // echo($_POST['campoPesquisa']);
        $lista = $usuario->listarPesquisa($campoPesquisa);
    } else {
        $lista = $usuario->listar();
    }
    foreach ($lista as $linha){
    echo "<tr id=\"linha-usuario".$linha['idUser']."\">
            <td> ". $linha['idUser'] ."</td>
            <td> ". $linha['Usuario'] ."</td>
            <td> ". $linha['Email'] ."</td>
            <td> ". $linha['idNivel'] ."</td>
            <td> <a href='usuario.php?action=editar&id=". $linha['idUser'] ."'>Editar</a></td>
            <td> <a href='javascript:void(0)' onclick='(async() => { if(await ajax(\"excluir-usuario.php?id=". $linha['idUser'] . "\")) {deleteId(\"linha-usuario".$linha['idUser']."\");alertDialog(\"Usuário excluído com sucesso.\", \"Usuário Excluído\");} else {alertDialog(\"Ocorreu um erro ao excluir o usuário.\", \"Ocorreu um erro ao excluir o usuário\");}})()'>Excluir</a></td>
        </tr>";
    }
}
catch(Exception $e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
 ?>