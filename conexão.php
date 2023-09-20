<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$db_name = "cadastro";
$conexao=mysqli_connect($servidor, $usuario, $senha, $db_name);

if(!$conexao){
 die("Houve um erro: ".mysqli_connect_error());
}

var_dump($_POST);

?>