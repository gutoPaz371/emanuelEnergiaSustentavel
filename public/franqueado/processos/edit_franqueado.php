<?php
/*  0 = EDITAR ENDEREÇO DO FRANQUEADO
    1 = EDITAR DADOS DO FRANQUEADO
    2 = EDITAR SENHA DO FRANQUEADO
    3 = CONGELAR CONTA
*/
    include '../../../crud/config/main_crud.php';
    session_start();
    $tp=$_POST['tipo'];
    $pg=$_POST['pg_get'];
    $pg2=$_POST['pg2'];
    if(!$tp){
        if(editUserFranqueado()){//ENDEREÇO
            $_SESSION['err']='Endereço Atualizado.';
            $_SESSION['cor']='green';
            header('location:../../franqueado/config_franqueado.php?pg='.$pg.'&pg2='.$pg2);
            echo 'Endereço';
        }
    }elseif($tp==1){
        if(editEddFranqueado()){//DADOS
            $_SESSION['err']='Dados Atualizado.';
            $_SESSION['cor']='green';
            header('location:../../franqueado/config_franqueado.php?pg='.$pg.'&pg2='.$pg2);

            echo 'Franqueado';
        }
    }elseif($tp==2){
        if(editSenhaFranqueado()){//SENHA
            $_SESSION['err']='Senha Atualizado.';
            $_SESSION['cor']='green';
            header('location:../../franqueado/config_franqueado.php?pg='.$pg.'&pg2='.$pg2);

            echo 'senha';
        }
    }elseif($tp==3){
        if(freezerContFranqueado()){//FREEZER CONTA
            $_SESSION['err']='Conta congelada';
            $_SESSION['cor']='orange';
            header('location:../../franqueado/config_franqueado.php?pg='.$pg.'&pg2='.$pg2);

            echo 'Congelar';
        }
    }
?>