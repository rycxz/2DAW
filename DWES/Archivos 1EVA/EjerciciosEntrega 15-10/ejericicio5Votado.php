<?php
session_start();
if(isset($_POST['votado'])){
setcookie("fruta",$_POST['fruta'],time()+600);  
header("Location:ejericicio5.php");
}

$_SESSION($_POST['fruta'])= $_SESSION($_POST['fruta'])+1;

print_r($_SESSION);
header("Location : ")
?>
 