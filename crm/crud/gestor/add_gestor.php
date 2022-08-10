<?php
    include '../../../crud/config/main_crud.php';
    session_start();
    $nome=$_POST['nome'];
    $st=$_POST['status'];
    $pass=$_POST['pass'];
    if(true){
        $_SESSION['err']['cor']=0;
        $_SESSION['err']['txt']='Gerente Atualizado';
        $_SESSION['err']['st']=true;
        header('location:../../public/home.php');
    }

?>