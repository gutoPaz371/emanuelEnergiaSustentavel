<?php
    include '../config/main_crud.php';
    session_start();
    var_dump($_POST);
    if(isset($_POST['ativar_produto']) and $_POST['ativar_produto'])$st=1;else $st=0;
    $n=$_POST['nome'];
    $p=$_POST['potencia'];
    $v=$_POST['valor'];
    $d=$_POST['descricao'];
    //$img=$_POST['img'];
    if(addProduto($st,$n,$p,$v,$d)){
        $_SESSION['err']='Produto cadastrado!!!';
        $_SESSION['cor']='green';
        header('location:../../public/list_produtos.php');
    }
?>