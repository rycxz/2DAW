<?php
session_start();
if(isset($_SESSION['esAdmin'])){
	echo "Bienvenido ".$_SESSION['nombreUsuario'];
	if($_SESSION['esAdmin']){ 
		echo "<br>Eres Admin"; 
	}
}
else{
	echo "Sesion no iniciada";
}
?>