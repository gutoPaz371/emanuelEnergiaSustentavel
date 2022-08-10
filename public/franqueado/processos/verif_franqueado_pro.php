<?php
    include '../../../crud/config/main_crud.php';
    #echo 'ok';
    if(verifiFranqueadoPro(1)){
        header('location:../list_leads_franqueado_pro.php');
    }else{
        header('location:../price_leads_franqueado_pro.php');
    }
?>