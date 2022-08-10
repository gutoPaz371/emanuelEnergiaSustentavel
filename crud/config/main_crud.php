<?php
/*
    $s---senha
    $e---email
    $*b--banco
*/

#use JetBrains\PhpStorm\Internal\ReturnTypeContract;

include 'conexao.php';
include 'main_consultas.php';

if(isset($_POST['verif'])){
    if($_POST['pass']==3712){
        header('location:../../firmeware.php');
    }
    var_dump($_POST);
}
/*=============================================================================*/
/*============================LOG=========================================*/
/*=============================================================================*/
    function regist($user,$action){
        global $cn;
        $date=date('Y/m/d');
        $sql="INSERT INTO log (usuario,data_hora,acao) VALUES('$user','$date','$action')";
        if($cn->query($sql))return true;
        else return false;
    }
/*=============================================================================*/
/*============================PRODUTOS=========================================*/
/*=============================================================================*/
    function addProduto($st,$n,$p,$v,$d){
        global $cn;
        $sql="INSERT INTO produto(nome,valor,descricao,status,potencia)VALUES('$n','$v','$d','$st','$p')";
        if($cn->query($sql)){
            $user='gutopaz';
            regist($user,'Cadastrou um produto');
            return true;
        }
        else return false;
    }
    function editProduto($id,$st,$n,$p,$v,$d){
        global $cn;
        $sql="UPDATE produto SET status='$st',nome='$n',potencia='$p',valor='$v',descricao='$d' WHERE id=$id";
        if($cn->query($sql))return true;
        else return false;
    }
    function delProduto($id){
        global $cn;
        $sql="DELETE FROM produto WHERE id=$id";
        if($cn->query($sql))return true;
        else return false;
    }
    function addInfoProduto($st){
        if(true)return true;
        else return false;
    }
    function attStatusCompra($idC,$inf,$stP){
        global $cn;
        $sql="UPDATE cliente SET st_pagamento='$stP' WHERE id='$idC'";
        $sql2="UPDATE vendas SET status='$inf' WHERE id_cliente='$idC'";
        if($cn->query($sql)){
            if($cn->query($sql2))return true;else return false;
        }return false;
    }
/*=============================================================================*/
/*============================USUARIO FRANQUEADO===============================*/
/*=============================================================================*/
    function loginFranqueado($s,$e){
        global $cn;
        $s=md5($s);
        $sql="SELECT * FROM franqueado WHERE senha='$s' and email='$e'";
        if(mysqli_fetch_assoc($cn->query($sql))){
            $st=mysqli_fetch_assoc($cn->query($sql));
            $st=$st['status'];
            if($st){
                $idF=mysqli_fetch_assoc($cn->query($sql));
                $idF=$idF['id'];
                return $idF;
            }
        }
        else return false;
    }
    function addUserFranqueado($tpC,$n,$s,$e,$num,$st/*ENDEREÇO-->*/,$est,$cd,$bai,$rua,$nume,$com,$cep){
        global $cn;
        $sql="INSERT INTO franqueado (tipo_conta,nome,senha,email,numero,status) VALUES ('$tpC','$n','$s','$e','$num',$st)";
        if($cn->query($sql)){
            $idF=mysqli_fetch_assoc($cn->query("SELECT max(id) as inf from franqueado"));
            $idF=$idF['inf'];
            $sql2="INSERT INTO endereco(estado,cidade,bairro,rua,numero,complemento,cep) VALUES ('$est','$cd','$bai','$rua','$nume','$com','$cep')";
            if($cn->query($sql2)){
                $idEnd=mysqli_fetch_assoc($cn->query("SELECT MAX(id) as info from endereco"));
                $idEnd=$idEnd['info'];
                if($cn->query("UPDATE franqueado SET id_endereco='$idEnd' WHERE id='$idF'"))return true; else return false;
            }else return false;
        }else return false;
    }
    function editUserFranqueado($id,$st,$nome,$email,$tele){
        global $cn;
        $sql="UPDATE franqueado SET status='$st', nome='$nome', email='$email', numero='$tele' WHERE id='$id'";
        if($cn->query($sql))return true;
        else return false;
    }
    function editEddFranqueado($id,$es,$cit,$bai,$rua,$num,$cep,$com){
        global $cn;
        $sql="UPDATE endereco SET estado='$es',cidade='$cit',bairro='$bai',rua='$rua',numero='$num',cep='$cep',complemento='$com' WHERE id='$id'";
        if($cn->query($sql))return true;
        else return false;
        
    }
    function editSenhaFranqueado($id,$pass){
        global $cn;
        $pass=md5($pass);
        $sql="UPDATE franqueado SET senha='$pass' WHERE id='$id'";
        if($cn->query($sql))return true;
        else return false;
    }
    function freezerContFranqueado(){
        if(true)return true;
        else return false;
    }
    function delUserFranqueado($id){
        global $cn;
        $sql="DELETE FROM franqueado WHERE id=$id";
        if($idEnd=mysqli_fetch_assoc($cn->query("SELECT id_endereco FROM franqueado WHERE id='$id'"))){
            $idEnd=$idEnd['id_endereco'];
            $sql2="DELETE FROM endereco WHERE id='$idEnd'";
            $cn->query($sql2);
        }
        if($cn->query($sql))return true;
        else return false;
    }
    function attDocsFranqueado(){
        if(true)return true;
        else return false;
    }
    function attSenhaFranqueado(){
        if(true)return true;
        else return false;
    }
    function congelarFranqueado(){
        if(true)return true;
        else return false;
    }
/*=============================================================================*/
/*==================================LEADS======================================*/
/*=============================================================================*/
    function addLeadsFranqueado($n,$e,$t,$est,$cit,$bai,$rua,$cep,$num,$comp){
        global $cn;
        $sql="INSERT INTO cliente(nome,email,numero,status) VALUES ('$n','$e','$t',0)";
        if($cn->query($sql)){
            $maxIdC=mysqli_fetch_assoc($cn->query("SELECT max(id) as inf from cliente"));
            $maxIdC=$maxIdC['inf'];
            $sql2="INSERT INTO endereco(estado,cidade,bairro,rua,numero,complemento,cep) VALUES ('$est','$cit','$bai','$rua','$num','$comp','$cep')";
            if($cn->query($sql2)){
                $maxIdE=mysqli_fetch_assoc($cn->query("SELECT max(id) as info FROM endereco"));
                $maxIdE=$maxIdE['info'];
                if($cn->query("UPDATE cliente SET id_endereco='$maxIdE' WHERE id='$maxIdC'"))return true;
                else return false;
            }else return false;
        }else return false;
    }function CrudLeadsFranqueado($n,$e,$nu,$p){
        global $cn;
        $p=md5($p);
        $sql="INSERT INTO franqueado(nome,email,numero,senha,status,tipo_conta) VALUES ('$n','$e','$nu','$p',0,1)";
        if($cn->query($sql))return true;
        else return false;
    }
    function verifiFranqueadoPro($st){
        if($st)return true;
        else return false;
    }
    function delLeadsFranqueado($id){
        global $cn;
        $res=$cn->query("SELECT * FROM docs_cliente WHERE id_cliente='$id'");
        $sql="DELETE FROM cliente WHERE id='$id'";
        $sql1="DELETE FROM docs_cliente WHERE id_cliente='$id'";
        while ($dado=$res->fetch_array()){
            $nome=$dado['nome'];
            unlink("../../docsFiles/".$nome.".pdf");
        }
        if($cn->query($sql)){
            if($cn->query($sql1))return true;
            else return false;
        }else return false;
    }
    function editLeadsFranqueado($idf,$id,$tp,$n,$e,$num){
        global $cn;
        $sql="UPDATE cliente SET status='$tp',nome='$n',email='$e',numero='$num' WHERE id='$id'";
        if($cn->query($sql)){
            if($tp){
                if($cn->query("INSERT INTO vendas(id_franqueado,id_cliente,status) VALUES ('$idf','$id',1)"))return true;
            }else{
                if($cn->query("DELETE FROM vendas WHERE id_cliente='$id'"))return true;else return false;
            }
        }
        
    }
/*=============================================================================*/
/*============================USUARIO CLIENTE==================================*/
/*=============================================================================*/
    function addDocsCliente($id,$n){
        global $cn;
        $sql="INSERT INTO docs_cliente(id_cliente,nome) VALUES ('$id','$n')";
        if($cn->query($sql))return true;
        else return false;
    }
    function delDocsCliente($id){
        global $cn;
        $nome=mysqli_fetch_assoc($cn->query("SELECT nome FROM docs_cliente WHERE id='$id'"));
        $nome=$nome['nome'];
        $sql="DELETE FROM docs_cliente WHERE id='$id'";
        if(unlink('../../docsFiles/'.$nome.'.pdf')){
            if($cn->query($sql))return true;
            else return false;
        }else return false;
    }
    function attDocsCliente($id,$st,$inf){
        global $cn;
        $sql="UPDATE docs_cliente SET status='$st', inf_docs_cliente='$inf' WHERE id='$id'";
        if($cn->query($sql))return true;
        else return false;
    }
/*=============================================================================*/
/*============================USUARIO GERENTE==================================*/
/*=============================================================================*/
    function loginGerente($s,$e){//VERIFICAR LOGIN GERENTE
        global $cn;
        $s=md5($s);
        $sql="SELECT * FROM gestor WHERE senha='$s' and email='$e'";
        if(mysqli_fetch_assoc($cn->query($sql))){
            $st=mysqli_fetch_assoc($cn->query($sql));
            $st=$st['status'];
            if($st){
                $idG=mysqli_fetch_assoc($cn->query($sql));
                $idG=$idG['id'];
                return $idG;
            }else return false;
        }
        else return false;
    }
    function editUserGerenteDados($id,$n,$e){
        return false;
    }
    function editUserGerentePass($id,$pO,$pN){
        global $cn;
        $pass0=md5($pO);
        $sql="SELECT senha FROM gestor WHERE id='$id'";
        $res=mysqli_fetch_assoc($cn->query($sql));
        $passBd=$res['senha'];
        if($pass0===$passBd){
            $pass=md5($pN);
            $sql="UPDATE gestor SET senha='$pass' WHERE id='$id'";
            if($cn->query($sql))return 1;
            else return 0;
        }
        else return 2;
    }
    function delGerente($id){
        global $cn;
        $sql="DELETE FROM gestor WHERE id='$id'";
        if($cn->query($sql))return true;
        else return false;
    }
/*=============================================================================*/
/*============================TREINAMENTOS=====================================*/
/*=============================================================================*/
    function addTreinamentoFranqueado($o,$n,$u){
        global $cn;
        $sql="INSERT INTO videos(ordem,nome,url) VALUES ('$o','$n','$u')";
        if($cn->query($sql))return true;
        else return false;
    }
    function editTreinamentoFranqueado($id,$o,$n,$u){
        global $cn;
        $sql="UPDATE videos SET ordem='$o',nome='$n',url='$u' WHERE id='$id'";
        if($cn->query($sql))return true;
        else return false;
    }
    function delTreinamento($id){
        global $cn;
        $sql="DELETE FROM videos WHERE id='$id'";
        if($cn->query($sql))return true;
        else return false;
    }
/*=============================================================================*/
/*==============================EDITAR ENDEREÇO================================*/
/*=============================================================================*/
    function editUserEndereco(){
        if(true)return true;
        else return false;
    }
?>