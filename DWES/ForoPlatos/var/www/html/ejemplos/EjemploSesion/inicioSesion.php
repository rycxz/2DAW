<?php
$contrasenaCorrecta = password_hash("estoLoAprueboFijo",PASSWORD_DEFAULT);
if(password_verify($_POST['pwd'],$contrasenaCorrecta)){
	session_start();
	$_SESSION['nombreUsuario']=$_POST['usuario'];
	$_SESSION['esAdmin']= false;
}
?>
<a href="ejemploSesion.php"> Comprueba tu sesion </a>