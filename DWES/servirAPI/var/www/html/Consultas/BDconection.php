<?php
 function connection(){

    if(isset($pdo)){
        return $pdo;
    }else{
        $pdo =  new PDO("mysql:host=mysql-db;dbname=stellar","root","admin");
        return $pdo;

    }
 }
?>
