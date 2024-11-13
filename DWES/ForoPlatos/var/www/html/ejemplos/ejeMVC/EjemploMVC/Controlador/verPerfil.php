<?php
//Comprobamos que esta logeado
session_start();
$_SESSION['loggedIn']=true;
if(isset($_SESSION['loggedIn'])){
	if(!isset($_GET['idUsuario'])){
		header("Location: index.php");
	}
	else{
		include "../Modelo/usuario.php";
		$usuario=selectUsuario($_GET['idUsuario']);
		include "../Vista/perfilUsuario.php";
	}
}
else{
	header("Location: login.html");
}
?>