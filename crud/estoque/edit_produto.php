<?php
    include '../config/main_crud.php';
    session_start();
    if(isset($_POST['statusProduto']))$st=1; else $st=0;
    $n=$_POST['nome'];
    $p=$_POST['potencia'];
    $v=$_POST['valor'];
    $d=$_POST['descricao'];
    $id=$_POST['idProduto'];
    var_dump($_POST);
    if(editProduto($id,$st,$n,$p,$v,$d)){
        $_SESSION['err']='Estoque atualizado';
        $_SESSION['cor']='green';
        header('location: ../../public/list_produtos.php');
    }
?>