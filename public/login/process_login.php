<?php
    include '../../crud/config/main_crud.php';
    session_start();
    $p=$_POST['pass'];
    $e=$_POST['email'];
    $tp=$_POST['tipo_conta'];
    var_dump($_SESSION);
    if($tp){//LOGAR GERENTE
        if(loginGerente($p,$e)){
            $_SESSION['id_user_gerente']=loginGerente($p,$e);
            header('location:../index.php');
        }else{
            $_SESSION['err']='Senha ou Usuario Incorretos.';
            $_SESSION['cor']='';
            header('location:../index.php');
        }
    }else{//LOGAR FRANQUEADO
        if(loginFranqueado($p,$e)){
            $_SESSION['id_user_franqueado']=loginFranqueado($p,$e);
            header('location:../franqueado/');
        }else{
            $_SESSION['err']='Senha ou Email Incorreto(s)';
            $_SESSION['cor']='orange';
            header('location:../../');
            echo 'err';
        }
        #$_SESSION['id_user_franquado']=1;
        #$_SESSION['err']='ok';
        #var_dump($_POST);
        #header('location:../franqueado/');
    }

    /*if(loginUserFranqueado($p,$e)){
        $_SESSION['id']=1;
        #header('location:../index.php');
    }else{
        $_SESSION['err']='Senha ou Usuario Incorretos.';
        $_SESSION['cor']='';
        #
    }*/
?>