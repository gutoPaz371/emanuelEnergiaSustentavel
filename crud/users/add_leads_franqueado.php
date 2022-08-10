<?php
    include '../config/main_crud.php';
    session_start();
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $num=$_POST['number'];
    $pass=$_POST['pass'];
    #var_dump($_POST);
    if(CrudLeadsFranqueado($nome,$email,$num,$pass)){
        $_SESSION['err']='Usuario cadastrado, logo entraremos em contato';
        $_SESSION['cor']='green';
        header('location:../../index.php');
    }else{
        $_SESSION['err']='Erro no banco de dados';
        $_SESSION['cor']='blue';
        header('location:../../index.php');
    }

?>