<?php
    include '../../../crud/config/main_crud.php';
    session_start();
    //DADOS
    $name=$_POST['name'];
    $email=$_POST['email'];
    $tele=$_POST['telefone'];
    //ENDEREÇO
    $est=$_POST['estado'];
    $cit=$_POST['cidade'];
    $bai=$_POST['bairro'];
    $rua=$_POST['rua'];
    $cep=$_POST['cep'];
    $num=$_POST['num'];
    $comp=$_POST['complemento'];
    var_dump($_POST);
    if(addLeadsFranqueado($name,$email,$tele/*ENDEREÇO->*/,$est,$cit,$bai,$rua,$cep,$num,$comp)){
        $_SESSION['err']="Leads cadastrado.";
        $_SESSION['cor']="green";
        header('location:../list_leads_franqueado.php');
    }else{
        $_SESSION['err']="Erro no banco";
        $_SESSION['cor']="blue";
        header('location:../list_leads_franqueado.php');
    }
?>