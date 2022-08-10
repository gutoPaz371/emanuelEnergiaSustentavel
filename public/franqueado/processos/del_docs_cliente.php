<?php
    include '../../../crud/config/main_crud.php';
    session_start();
    $id_venda=$_GET['id_venda'];
    $pg=$_GET['pg'];
    var_dump($_POST['file']);
    if(delDocsCliente()){
        #header('location:../inf_venda_franqueado.php?id_venda='.$id_venda.'&pg='.$pg);
    }else{
        echo 'ok';
    }
?>