<?php
 
session_start();
 
if(isset($_SESSION['logeado'])){
	 
	echo "Bienvenido ".$_SESSION['usuario'];
}
 
else{
 
	header("Location: index.php");
	
 
}
?>