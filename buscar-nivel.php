<?php
    require_once 'global.php';
try{
    $nivel = new Nivel();
    if(!empty($_GET['pesquisa'])){
        $campoPesquisa = $_GET['pesquisa']."%";
        // echo($_POST['campoPesquisa']);
        $lista = $nivel->listarPesquisa($campoPesquisa);
    } else {
        $lista = $nivel->listar();
    }
    foreach ($lista as $linha){
    echo "<tr id=\"linha-nivel".$linha["idNivel"]."\">
            <td> ". $linha['idNivel'] ."</td>
            <td> ". $linha['Nivel'] ."</td>
            <td> <a href='usuario.php?action=editar-nivel&id=". $linha['idNivel'] . "'>Editar</a></td>
            <td> <a href='javascript:void(0)' onclick='(async() => {if(await ajax(\"excluir-nivel.php?id=". $linha['idNivel'] . "\")) {deleteId(\"linha-nivel".$linha['idNivel']."\");alertDialog(\"Nível excluído com sucesso.\", \"Nível Excluído\"); } else { alertDialog(\"Ocorreu um erro ao excluir o Nível.\", \"Ocorreu um erro ao excluir o Nível\"); } })()'>Excluir</a></td>
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