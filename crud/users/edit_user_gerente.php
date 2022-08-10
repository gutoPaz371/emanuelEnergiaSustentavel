<?php
    include '../config/main_crud.php';
    session_start();
    var_dump($_POST);
    $id=$_POST['id_gerente'];
    $tp=$_POST['tipo'];//0=DADOS;1=SENHA
    $pg=$_POST['pg'];
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $passO=$_POST['passO'];
    $passN=$_POST['passN'];
    if($tp){//TROCAR SENHA
        if($op=editUserGerentePass($id,$passO,$passN)){
            if($op==0){//erro no banco
                $_SESSION['err']='Erro no banco!!';
                $_SESSION['cor']='blue';
                header('location:../../public/edit_user_gerente.php?pg='.$pg);
            }elseif($op==1){//Senhas coicidem
                $_SESSION['err']='Senha Atualizada!!!';
                $_SESSION['cor']='green';
                header('location:../../public/edit_user_gerente.php?pg='.$pg);
            }elseif($op==2){//Senha nao coicidem
                $_SESSION['err']='Senha incorreta';
                $_SESSION['cor']='red';
                header('location:../../public/edit_user_gerente.php?pg='.$pg);
            }
        }else{
            $_SESSION['err']='Erro no banco';
            $_SESSION['cor']='blue';
            header('location:../../public/edit_user_gerente.php?pg='.$pg);
        }
    }else{//TROCAR DADOS
        if(editUserGerenteDados($id,$nome,$email)){
            $_SESSION['err']='Usuario Atualizado';
            $_SESSION['cor']='green';
            header('location:../../public/edit_user_gerente.php?pg='.$pg);
        }else{
            $_SESSION['err']='Ajeita o banco crl';
            $_SESSION['cor']='blue';
            header('location:../../public/edit_user_gerente.php?pg='.$pg);
        }
    }
?>