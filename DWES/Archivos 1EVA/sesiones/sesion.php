<?php
session_start();
if(isset($_SESSION['esAdmin'])){
	echo "Bienvendio " .$_SESSION['nombreUsuario'];
	if($_SESSION['esAdmin']){
		echo "<br> eres admin ";
		
	}
	
}
else{
	
	echo "no has inciado sesion";
}


?>