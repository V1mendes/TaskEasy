<?php

    $host = "localhost";
    $user= "root";
    $db_password="";
    $db_name = "cadastro";
    

    try{
     $conn =  new PDO("mysql:host=$host; dbname=" . $db_name, $user, $db_password );
    } catch (PDOException $err) {
        echo "Erro conexão" . $err->getMessage();
    }


?>