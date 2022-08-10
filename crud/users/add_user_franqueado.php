<?php
    include '../config/main_crud.php';
    session_start();
    //DADOS USUARIO
    $tpF=$_POST['tipo_franqueado'];
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $tele=$_POST['telefone'];
    $pass1=md5($_POST['pass1']);
    //ENDEREÇO
    $est=$_POST['estado'];
    $cd=$_POST['cidade'];
    $bai=$_POST['bairro'];
    $rua=$_POST['rua'];
    $num=$_POST['numero'];
    $cep=$_POST['cep'];
    $com=$_POST['complemento'];
    var_dump($_POST);
    if(addUserFranqueado($tpF,$nome,$pass1,$email,$tele,0/*ENDEREÇO-->*/,$est,$cd,$bai,$rua,$num,$com,$cep)){
        $_SESSION['err']='Franqueado cadastrado!!!';
        $_SESSION['cor']='green';
        header('location:../../public/list_user.php');
    }else{
        $_SESSION['err']='Erro no Banco!!!';
        $_SESSION['cor']='blue';
        header('location:../../public/list_user.php');
    }
?>