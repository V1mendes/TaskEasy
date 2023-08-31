<?php
$servidor ="2020"; 
$usuario = "C:/TRABALHOS/servidorTaskEasy/Maturidade_de_soft";
$senha = ""; 
$dbname = "cadastro"; // nome do banco de dados 

$conexao = mysqli_connect($dbname);
if (!$conexao) {
    die("Houve um erro: " . mysqli_connect_error());
}
?>