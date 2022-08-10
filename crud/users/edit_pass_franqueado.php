<?php
    include '../config/main_crud.php';
    session_start();
    var_dump($_POST);
    $id=$_POST['id_user'];
    $pass=$_POST['pass0'];
    if(editSenhaFranqueado($id,$pass)){
        $_SESSION['err']='Senha Atualizada';
        $_SESSION['cor']='green';
        header('location: ../../public/list_user.php');
    }else{
        $_SESSION['err']='Erro no banco';
        $_SESSION['cor']='blue';
        header('location: ../../public/list_user.php');
    }
?>