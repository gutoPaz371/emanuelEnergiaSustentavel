<?php
    include '../config/main_crud.php';
    session_start();
    var_dump($_POST);
    $id=$_POST['idDel'];
    if(delUserFranqueado($id)){
        $_SESSION['err']='Franqueado removido';
        $_SESSION['cor']='orange';
        header('location:../../public/list_user.php');
    }else{
        $_SESSION['err']='Erro no banco';
        $_SESSION['cor']='blue';
        header('location:../../public/list_user.php');
    }
?>