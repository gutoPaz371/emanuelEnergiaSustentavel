<?php
    include '../config/main_crud.php';
    session_start();
    var_dump($_POST);
    $stD=$_POST['st_docs_cliente'];
    $infDocs=$_POST['msg'];
    $idD=$_POST['id_docs_cliente'];
    //GET
    $nomeF=$_POST['nome_franqueado'];
    $nomeC=$_POST['nome_cliente'];
    $idC=$_POST['id_cliente'];
    

    if(attDocsCliente($idD,$stD,$infDocs)){
        $_SESSION['err']='Informação do documento atualizada';
        $_SESSION['cor']='green';
        header('location:../../public/inf_franqueado.php?id_cliente='.$idC.'&nome_franqueado='.$nomeF.'&nome_cliente='.$nomeC);
    }else{
        $_SESSION['err']='Erro no banco';
        $_SESSION['cor']='blue';
        header('location:../../public/inf_franqueado.php?id_cliente='.$idC.'&nome_franqueado='.$nomeF.'&nome_cliente='.$nomeC);
    }
?>