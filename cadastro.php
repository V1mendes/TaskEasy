<?php

include("conexão.php");

$nome_completo = $_POST['nome_completo']; 
$email = $_POST['email']; 
$senha = $_POST['senha']; 

$sql = "INSERT INTO cadastro(nome_completo, email, senha )
values ('$nome_completo', '$email', '$senha' )";

?>
