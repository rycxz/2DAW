<<<<<<< HEAD
<?php
session_start();
include ("../conexionBBDD.php");
//Hacemos la consulta de SQL, comillas en la variable del where incluidas
		//SELECT pwd FROM usuarios WHERE username="pepito";, no SELECT ... WHERE username=pepito;
		$nombreUsuario= $_SESSION['ISusername'];
		$resultado=$pdo->query("SELECT pwd FROM usuarios WHERE username='$nombreUsuario'");
		//Hacemos fetch del resultado, si me devuelve false es que no hay
		$hashAlmacenado=($resultado->fetch());
		if($hashAlmacenado){
			$hashAlmacenado=$hashAlmacenado['pwd'];
			echo "El usuario existe, dame un momentico que verifico la contraseña<br>";
			if($hashAlmacenado == "CAMBIAME"){
				 header("Location : ../Formularios/FormularioCambioPWD.php");
			}
			else{
				//Recuperamos del formulario los datos de login
				$pwdAValidar= $_SESSION['ISpwd'];
				if(password_verify($pwdAValidar, $hashAlmacenado)){
					session_start();
					$_SESSION['logeado']=true;
					header("Location: ../index.php");
				}
				else{
					
				}header("Location: errorPWD.html");
			}
		}
		else{
			echo "Ese usuario no existe champion";
		}


=======
<?php
session_start();
include ("../conexionBBDD.php");
//Hacemos la consulta de SQL, comillas en la variable del where incluidas
		//SELECT pwd FROM usuarios WHERE username="pepito";, no SELECT ... WHERE username=pepito;
		$nombreUsuario= $_SESSION['ISusername'];
		$resultado=$pdo->query("SELECT pwd FROM usuarios WHERE username='$nombreUsuario'");
		//Hacemos fetch del resultado, si me devuelve false es que no hay
		$hashAlmacenado=($resultado->fetch());
		if($hashAlmacenado){
			$hashAlmacenado=$hashAlmacenado['pwd'];
			echo "El usuario existe, dame un momentico que verifico la contraseña<br>";
			if($hashAlmacenado == "CAMBIAME"){
				 header("Location : ../Formularios/FormularioCambioPWD.php");
			}
			else{
				//Recuperamos del formulario los datos de login
				$pwdAValidar= $_SESSION['ISpwd'];
				if(password_verify($pwdAValidar, $hashAlmacenado)){
					session_start();
					$_SESSION['logeado']=true;
					header("Location: ../index.php");
				}
				else{
					
				}header("Location: errorPWD.html");
			}
		}
		else{
			echo "Ese usuario no existe champion";
		}


>>>>>>> origin/master
?>