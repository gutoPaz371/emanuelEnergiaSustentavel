<?php
/* ----------STATUS DA VENDA----------
   - -1------Documentação Incompleta -
   - 0--------Validando documentação -
   - 1-------------------Em processo -
   - 2-----------------------Enviado -
   - 3----------------------Aprovado -
   - 4------------------Compra feita -
   - 5------------Chegada do sistema -
   - 6---------------Sistema enviado -
   - 7--------------------Finalizado -
   -----------------------------------
*/

    include '../config/main_crud.php';
    session_start();
    var_dump($_POST);
    //get
    $idC=$_POST['id_cliente'];
    $nF=$_POST['nome_franqueado'];
    $nC=$_POST['nome_cliente'];
    //dados
    $inf=$_POST['inf'];//Status Do decorrer da venda.
    $stP=$_POST['st_pagamento'];
    if(attStatusCompra($idC,$inf,$stP)){
        $_SESSION['err']='Status da venda atualizado';
        $_SESSION['cor']='green';
        header('location:../../public/inf_franqueado.php?id_cliente='.$idC.'&nome_franqueado='.$nF.'&nome_cliente='.$nC);
    }else{
        $_SESSION['err']='Erro no banco';
        $_SESSION['cor']='blue';
        header('location:../../public/inf_franqueado.php?id_cliente='.$idC.'&nome_franqueado='.$nF.'&nome_cliente='.$nC);
    }
?>