<?php
    $servername = "localhost";
    $username = "olirenwm_news";
    $password = "123456a@";
    try{
        $conn = new PDO("mysql:host=$servername;dbname=olirenwm_news", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "connect failed: " .$e->getMessage();
    }
?>