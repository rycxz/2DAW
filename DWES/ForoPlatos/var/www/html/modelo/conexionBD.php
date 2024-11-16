<?php
 function conexionBD(){

    if(isset($pdo)){
        return $pdo;
    }else{
        $pdo =  new PDO("mysql:host=mysql-db;dbname=foroplatos","root","admin");
        return $pdo;
         
    }
 }
?>
