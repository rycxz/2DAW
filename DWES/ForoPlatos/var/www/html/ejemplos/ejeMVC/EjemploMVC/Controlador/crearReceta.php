<?php
	session_start();
	$_SESSION['loggedIn']=true;
	if(isset($_SESSION['loggedIn'])){
		include "../Vista/formularioEjemploImagen.html";
	}
	else{
		header("Location: login.html");
	}
	
?>