<?php
    include '../config/main_crud.php';
    session_start();
    var_dump($_POST);
    $idD=$_POST['id_del'];
    if(delTreinamento($idD)){
        $_SESSION['err']='Video deletado';
        $_SESSION['cor']='orange';
        header('location:../../public/treinamento.php');
    }else{
        $_SESSION['err']='Erro no banco';
        $_SESSION['cor']='blue';
        header('location:../../public/treinamento.php');
    }
?>