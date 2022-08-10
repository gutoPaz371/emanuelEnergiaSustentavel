<?php
/*
    TIPOS DE EDIÇÃO
    0 = EDITAR DADOS DO FRANQUEADO
    1 = REDEFINIR SENHA DO FRANQUEADO
*/
    include '../config/main_crud.php';
    session_start();
    var_dump($_POST);
    $tp=$_POST['tipo'];//TIPO DE EDIÇÃO
    $pg=$_POST['pg_get'];//PAGINA DO FORM
    //DADOS
    $id=$_POST['id_user'];
    $st=$_POST['status'];
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $tele=$_POST['tele'];
    $pass0=$_POST['pass0'];
    //END.:
    $idEnd=$_POST['id_endereco'];
    $est=$_POST['estado'];
    $cit=$_POST['cidade'];
    $bai=$_POST['bairro'];
    $rua=$_POST['rua'];
    $nume=$_POST['numero'];
    $cep=$_POST['cep'];
    $com=$_POST['complemento'];
    
    if(!$tp){//DADOS
        if(editUserFranqueado($id,$st,$nome,$email,$tele)){//DADOS
            if(editEddFranqueado($idEnd,$est,$cit,$bai,$rua,$nume,$cep,$com)){//ENDEREÇO
                $_SESSION['err']='Dados atualizado';
                $_SESSION['cor']='green';
                header('location:../../public/list_user.php');
                echo 'Dados Atualizados';
            }else{
                $_SESSION['err']='Erro no banco ENDEREÇO!!!';
                $_SESSION['cor']='blue';
                header('location:../../public/list_user.php');
            }
        }else{
            $_SESSION['err']='Erro no banco DADOS!!!';
            $_SESSION['cor']='blue';
            header('location:../../public/list_users.php');
        }
        
    }else{//SENHA
        if(editSenhaFranqueado()){//SENHA
            $_SESSION['err']='Senha atualizado';
            $_SESSION['cor']='green';
            #header('location:../../public/edit_users.php?pg='.$pg);
            echo 'Senha atualizada';
        }
    }
?>