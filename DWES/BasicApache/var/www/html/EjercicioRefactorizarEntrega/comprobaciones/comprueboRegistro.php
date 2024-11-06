<?php
session_start();
include ("../conexionBBDD.php");
//intento registro
        $nombreUsuario=$_SESSION['Rusername'];
		$resultado=$pdo->query("SELECT pwd FROM Credenciales WHERE username='$nombreUsuario'");
		//Hacemos fetch del resultado, si me devuelve false es que no hay
		$hashAlmacenado=($resultado->fetch());
		//si el usuario existe -> error
		if($hashAlmacenado){
			header("Location : errores\errorUsuarioExiste.html ");
		}
		//si no existe -> insertar
		else{
			$contrasenaHasheada=password_hash($_SESSION['Rpwd'],PASSWORD_DEFAULT);
			$mail=$_SESSION['Rmail'];
			$sql = "INSERT INTO usuarios (username,pwd,mail) values ('$nombreUsuario','$contrasenaHasheada','$mail')";
			$pdo->prepare($sql)->execute();
			echo "Registro correcto";
		}
        ?>