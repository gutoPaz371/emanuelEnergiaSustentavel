<?php
    include '../config/main_crud.php';
    session_start();
    var_dump($_POST);
    $id=$_POST['delId'];
    if(delLeadsFranqueado($id)){
        $_SESSION['err']='Leads deletado';
        $_SESSION['cor']='orange';
        header('location:../../public/franqueado/list_leads_franqueado.php');
    }
    else{
        $_SESSION['err']='Erro no banco de dados';
        $_SESSION['cor']='blue';
        echo 'off';
        header('location:../../public/franqueado/list_leads_franqueado.php');
    }
?>