<?php
    $host='127.0.0.1';
    $user='root';
    $pass='';
    $name='emanuel_microfranquias';
    $cn = new mysqli($host,$user,$pass,$name);
    if($cn->errno>0){
        die;
        echo 'erro de conexao';
    }
?>