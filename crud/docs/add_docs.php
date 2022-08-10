<?php
    include '../config/main_crud.php';
    var_dump($_POST);
    var_dump($_FILES);
    $name=$_POST['nome'];
    $idCli=$_POST['id_cliente'];
    $nomeC=$_POST['nome_cliente'];
    if(isset($_FILES['file'])){
        $tmp_name = $_FILES["file"]["tmp_name"];
        $name=$idCli."_".$name;
        if(move_uploaded_file($tmp_name, "../../docsFiles/$name".'.pdf')){
            if(addDocsCliente($idCli,$name)){
                $_SESSION['err']='Documentação atualzada';
                $_SESSION['cor']='green';
                header('location:../../public/franqueado/inf_venda_franqueado.php?id_cliente='.$idCli.'&nome_cliente='.$nomeC);
            }else{
                $_SESSION['err']='Erro no banco';
                $_SESSION['cor']='blue';
                header('location:../../public/franqueado/inf_venda_franqueado.php?id_cliente='.$idCli.'&nome_cliente='.$nomeC);
            }
        }else{
            $_SESSION['err']='Erro Upload Docs';
            $_SESSION['cor']='blue';
            header('location:../../public/franqueado/inf_venda_franqueado.php?id_cliente='.$idCli.'&nome_cliente='.$nomeC);
        }
    }else{
        $_SESSION['err']='Documento não encontrado';
        $_SESSION['cor']='yellow';
        header('location:../../public/franqueado/inf_venda_franqueado.php?id_cliente='.$idCli);
    }
?>