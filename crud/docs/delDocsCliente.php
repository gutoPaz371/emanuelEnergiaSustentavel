<?php
    include '../config/main_crud.php';
    session_start();
    var_dump($_POST);
    $idDel=$_POST['idDel'];
    $idC=$_POST['id_cliente'];
    $nome=$_POST['nome_cliente'];
    if(delDocsCliente($idDel)){
        $_SESSION['err']='Documentação deletada';
        $_SESSION['cor']='green';
        header('location:../../public/franqueado/inf_venda_franqueado.php?id_cliente='.$idC.'&nome_cliente='.$nome);
    }else{
        $_SESSION['err']='Erro no processo';
        $_SESSION['cor']='red';
        header('location:../../public/franqueado/inf_venda_franqueado.php?id_cliente='.$idC.'&nome_cliente='.$nome);
    }
?>