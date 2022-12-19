<?php
// espaço de memória no navegador
session_start();

// pegar os dados da tela
$login = $_POST["login"];
$senha = md5($_POST["senha"]);

// abrir a conexão com o banco
include_once'./conexao.php';

// montar a instrução de ir ao banco verificar se o usuario é valido.
$sql ="select * from pacientes where login = '".$login."'and senha = '".$senha."'";

$result = mysqli_query($con,$sql);
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $_SESSION["nome"] = $row["nome"];
    $_SESSION["perfil"] = $row["perfil"];
    $_SESSION["tempo"] = time(); // guardando o exato instante do login
    header("location:painel.php");
} else {
    $msg = "Login/Senha invalido";
    header("location:index.php?msg=".$msg);
}


?>