<?php

include "Security/inc/config.php";
session_start();
$con = new PDO(SERVIDOR,USUARIO,SENHA);

if(isset($_POST['entrar']))
{
$email = $_POST['email'];
$senha= $_POST['senha'];
$sql = $con->prepare("SELECT * FROM usuario WHERE email=? AND senha=? ");
$sql->execute( [$email, md5($senha)]);

$row = $sql->fetchObject(); // devolve um único registro

// Se o usuário foi localizado
if ($row){
$_SESSION['usuario'] = $row;
header("Location: Security/index.php");
}else{
    $_SESSION['msg'] = "<p class='login-box-msg' style='color:red'>Usuario não cadastrado ou dados inseridos errado</p>";
    header("Location: index.php");
}

}
elseif(isset($_POST['cadastrar']))
{
    if (isset($_POST)){
        $sql = $con->prepare("INSERT INTO usuario  (id,email,senha,foto, nome) values (null, ?, ?,?,?)");
        $sql->execute(array( $_POST['email'],md5($_POST['senha']),$_POST['foto'],$_POST['nome'] ));
      }
        $rows = $sql->fetchall(PDO::FETCH_CLASS);
          $_SESSION["msg"] = "<p class='login-box-msg' style='color:#00ff40'>Usuario cadastrado com sucesso</p>";
           header("Location: index.php");
      
}	
else 
{
        $_SESSION["msg"] = "<p class='login-box-msg' style='color:#0022ff'>Você esta tentando acessar a Galeria sem Autenticar</p>";
            header("Location: index.php");
}

?>