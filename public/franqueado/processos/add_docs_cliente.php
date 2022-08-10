<?php
    include '../../../crud/config/main_crud.php';
    session_start();
    $id_vendas=$_POST['id_venda'];
    $pg=$_POST['pg'];
    #var_dump($_POST);
    #var_dump($_FILES['file']);
    echo $_POST['file'];
    if(attDocsCliente()){
        $_SESSION['err']='Documentação atualizada!!!';
        $_SESSION['cor']='green';
        #header('location:../inf_venda_franqueado.php?id_venda='.$id_venda.'&pg='.$pg);
    }else{
        echo 'err';
    }
?>