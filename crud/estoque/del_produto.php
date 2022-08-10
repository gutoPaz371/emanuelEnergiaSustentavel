<?php
    include '../config/main_crud.php';
    session_start();
    var_dump($_POST);
    $id=$_POST['IdDelProduto'];
    if(delProduto($id)){
        $_SESSION['err']='Produto deletado!!!';
        $_SESSION['cor']='orange';
        header('location:../../public/list_produtos.php');
    }else{
        $_SESSION['err']='Erro no Banco';
        $_SESSION['cor']='orange';
        header('location:../../public/list_produtos.php');
    }
?>