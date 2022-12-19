<?php
// pegar o id
$id = $_GET["id"];

// abrir a conexão com o banco 
include_once'./conexao.php';

// montar a instrução sql
$sql = "delete from pacientes where idusuario =".$id;

// igual a do gravar
if(mysqli_query($con,$sql)){
    $msg ="Excluido com sucesso!";
}else{
    $msg="Erro ao excluir!";
}
 mysqli_close($con);
 echo "<script> alert('".$msg."');
 location.href='consultar.php';</script>";
?> 