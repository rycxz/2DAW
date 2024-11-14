 
<?php
	session_start();
	if(isset($_POST['votado'])){
		setcookie("fruta",$_POST['fruta'],time()+10);
	}
	//setcookie("fruta","",0);
	//Se guarda en sesion una componente de nombre la fruta votada y valor lo que hubiera +1
	$_SESSION[$_POST['fruta']]=$_SESSION[$_POST['fruta']]+1;
	/* Opcion más explicita, paso a paso
	switch $_POST['fruta']{
		case "manzana":
			if(isset($_SESSION['manzana']){
				$actual=$_SESSION['manzana'];
				$_SESSION['manzana']=$actual+1;
			}
			else{
				$actual=0;
			}
			$_SESSION['manzana']=$actual+1;
	}*/
	print_r($_SESSION);
	echo('<a href="formulario.php"> Volver a la votacion');
 
?>