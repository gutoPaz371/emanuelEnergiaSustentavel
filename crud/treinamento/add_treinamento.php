<?php
    include '../config/main_crud.php';
    var_dump($_POST);
    session_start();
    $orde=$_POST['order_treinamento'];
    $nome=$_POST['nome_treinamento'];
    $url=substr($_POST['URL'],-11);
    if(addTreinamentoFranqueado($orde,$nome,$url)){
        $_SESSION['err']='Video treinamento atualizado!!!';
        $_SESSION['cor']='green';
        header('location:../../public/treinamento.php');
    }else{
        $_SESSION['err']='Erro no banco!!!';
        $_SESSION['cor']='blue';
        header('location:../../public/treinamento.php');
    }
?>