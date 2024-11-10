<<<<<<< HEAD
<?php
session_start();

	$nombreUsuario=$_POST['username'];
	if(isset($_POST['login'])){
        header("Location: comprueboInicioSesion.php");
        //Guardo las variables de  post en una sesion
        $_SESSION['ISusername'] = $_POST['username'];
        $_SESSION['ISpwd'] = $_POST['pwd'];
		 
	}
	else if(isset($_POST['registro'])){
        header("Location: comprueboRegistro.php");
        $_SESSION['Rusername'] = $_POST['username'];
        $_SESSION['Rpwd'] = $_POST['pwd'];
        $_SESSION['Rmail'] = $_POST['mail'];
	 
	}
	else if(isset($_POST['cambioPWD'])){
        header("Location: comprueboPWD.php");
	}
	else{
		//devuelvo error
		http_response_code(403);
	}
=======
<?php
session_start();

	$nombreUsuario=$_POST['username'];
	if(isset($_POST['login'])){
        header("Location: comprueboInicioSesion.php");
        //Guardo las variables de  post en una sesion
        $_SESSION['ISusername'] = $_POST['username'];
        $_SESSION['ISpwd'] = $_POST['pwd'];
		 
	}
	else if(isset($_POST['registro'])){
        header("Location: comprueboRegistro.php");
        $_SESSION['Rusername'] = $_POST['username'];
        $_SESSION['Rpwd'] = $_POST['pwd'];
        $_SESSION['Rmail'] = $_POST['mail'];
	 
	}
	else if(isset($_POST['cambioPWD'])){
        header("Location: comprueboPWD.php");
	}
	else{
		//devuelvo error
		http_response_code(403);
	}
>>>>>>> origin/master
?>