<?php


 
$paswwHashed = password_hash("estoLoAprueboFijo",PASSWORD_DEFAULT);
if($_POST["usuario"]=="Ricardo Sorin Almajan"){
	if(password_verify( $_POST["password"],$paswwHashed )){
	 session_start();
	 $_SESSION['nombreUsuario'] = $_POST['usuario'];
	 $_SESSION['esAdmin']=true;
	}
}
 
	?>