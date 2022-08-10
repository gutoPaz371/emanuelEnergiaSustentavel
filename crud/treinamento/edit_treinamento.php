<?php
    include '../config/main_crud.php';
    session_start();
    var_dump($_POST);
    $id=$_POST['id_video'];
    $ordem=$_POST['order_treinamento'];
    $nome=$_POST['nome_treinamento'];
    $url=substr($_POST['URL'],-11);
    if(editTreinamentoFranqueado($id,$ordem,$nome,$url)){
        $_SESSION['err']='Video treinamento atualizado!!!';
        $_SESSION['cor']='green';
        header('location:../../public/treinamento.php');
    }else{
        $_SESSION['err']='Erro no banco';
        $_SESSION['cor']='blue';
        header('location:../../public/treinamento.php');
    }
?>