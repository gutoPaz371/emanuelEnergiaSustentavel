<?php
    session_start();
    if(!isset($_SESSION['id_crm'])){
        header('location:../../../../');//definir tela de login 
    }
    $idF=$_GET['id'];
    var_dump($_GET);
?>