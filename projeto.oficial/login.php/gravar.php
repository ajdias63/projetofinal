<?php 
//passo 1 - pegar os dados da tela
$nome =$_POST["nome"];
$email =$_POST["email"];
$telefone =$_POST["telefone"];
$foto =$_FILES["foto"];//padrão do banco

$ext = explode(".",$foto["name"]);
$ext = array_reverse($ext);
$ext = $ext[0];


if(($ext !="jpg") && ($ext != "png") && ($ext !="gif")){
    echo "Arquivo Inválido";
}elseif($foto ["size"] < 1024 *8){
    echo "Tamanho Excedido!";
}else{}

//passo 2 - montar a conexão com o banco de dados
include_once './conexao.php';
$foto= date("YmdHis").rand(0000,9999).".".$ext;

//passo 3 - montar o sql de gravar no banco
$sql="insert into pacientes values( null,'".$nome."','".$email."','".$telefone."','".$foto."')";

//passo 4- mandar esse comando para o mysql
if(mysqli_query($con,$sql)){
    $msg ="Gravado com sucesso!";

    move_uploaded_file($foto["tmp_name"],"./uploads/.".$foto);

}else{
    $msg="Erro ao gravar!";
}

 mysqli_close($con);
 
?>