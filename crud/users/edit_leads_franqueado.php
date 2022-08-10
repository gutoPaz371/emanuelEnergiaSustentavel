<?php
    include '../config/main_crud.php';
    session_start();
    $pg=$_POST['pg'];
    $idL=$_POST['id_leads'];
    $tpC=$_POST['tipo_cliente'];
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $num=$_POST['numero'];
    $idF=$_SESSION['id_user_franqueado'];
    var_dump($_POST);
    if(editLeadsFranqueado($idF,$idL,$tpC,$nome,$email,$num)){
        $_SESSION['err']='Leads Atualizado';
        $_SESSION['cor']='green';
        header('location:../../public/franqueado/list_leads_franqueado.php');
    }
    else{
        $_SESSION['err']='Erro no Banco';
        $_SESSION['cor']='blue';
        header('location:../../public/franqueado/list_leads_franqueado.php');
    }
?>