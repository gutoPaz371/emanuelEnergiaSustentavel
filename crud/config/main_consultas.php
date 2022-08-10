<?php
    include 'conexao.php';
    function contF(){//TOTAL FRANQUEADOS
        global $cn;
        $sql="SELECT count(*) as inf FROM franqueado";
        if($res=mysqli_fetch_assoc($cn->query($sql)))return $res['inf'];
        else return false;
    }
    function contFA(){//FRANQUEADOS ATIVOS
        global $cn;
        $sql="SELECT count(*) as inf FROM franqueado WHERE status=1";
        if($res=mysqli_fetch_assoc($cn->query($sql)))return $res['inf'];
        else return false;
    }
    function contFD(){//FRANQUEADOS DESTIVADOS
        global $cn;
        $sql="SELECT count(*) as inf FROM produto WHERE status=0";
        if($res=mysqli_fetch_assoc($cn->query($sql)))return $res['inf'];
        else return false;
    }
    function contP(){//TOTAL PRODUTOS
        global $cn;
        $sql="SELECT count(*) as inf FROM produto";
        if($res=mysqli_fetch_assoc($cn->query($sql)))return $res['inf'];
        else return false;
    }
    function contPA(){//TOTAL PRODUTOS ATIVOS
        global $cn;
        $sql="SELECT count(*) as inf FROM produto WHERE status=1";
        if($res=mysqli_fetch_assoc($cn->query($sql)))return $res['inf'];
        else return false;
    }
    function contPD(){//PRODUTOS DESATIVADOS
        global $cn;
        $sql="SELECT count(*) as inf FROM produto  WHERE status=0";
        if($res=mysqli_fetch_assoc($cn->query($sql)))return $res['inf'];
        else return false;
    }
?>