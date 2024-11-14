 
<?php
	$pdo = new PDO("mysql:host=localhost;dbname=daw","root","");
	//Si existe la componente 'login' en el formulario...
	$nombreUsuario=$_POST['username'];
	if(isset($_POST['login'])){
		//Hacemos la consulta de SQL, comillas en la variable del where incluidas
		//SELECT pwd FROM usuarios WHERE username="pepito";, no SELECT ... WHERE username=pepito;,
		$resultado=$pdo->query("SELECT pwd FROM usuarios WHERE username='$nombreUsuario'");
		//Hacemos fetch del resultado, si me devuelve false es que no hay
		$hashAlmacenado=($resultado->fetch());
		if($hashAlmacenado){
			$hashAlmacenado=$hashAlmacenado['pwd'];
			echo "El usuario existe, dame un momentico que verifico la contraseña<br>";
			if($hashAlmacenado == "CAMBIAME"){
				echo "Tienes la contraseña de inicio, introduce una nueva contraseña<br>";
				?>
				<form action="checklogin.php" method="post">
					<input type="hidden" id="username" name="username" value="<?php echo $nombreUsuario;?>">
					<input type="text" id="pwd" name="pwd" placeholder="Contrasena">
					<input type="submit" name="cambioPWD" value="Enviar">
				</form>
				<?php
			}
			else{
				//Recuperamos del formulario los datos de login
				$pwdAValidar=$_POST['pwd'];
				if(password_verify($pwdAValidar, $hashAlmacenado)){
					session_start();
					$_SESSION['logeado']=true;
					header("Location: index.php");
				}
				else{
					echo "La contraseña es incorrecta";
				}
			}
		}
		else{
			echo "Ese usuario no existe champion";
		}
	}
	else if(isset($_POST['registro'])){
		//intento registro
		$resultado=$pdo->query("SELECT pwd FROM usuarios WHERE username='$nombreUsuario'");
		//Hacemos fetch del resultado, si me devuelve false es que no hay
		$hashAlmacenado=($resultado->fetch());
		//si el usuario existe -> error
		if($hashAlmacenado){
			echo "Ese usuario ya existe";
		}
		//si no existe -> insertar
		else{
			$contrasenaHasheada=password_hash($_POST['pwd'],PASSWORD_DEFAULT);
			$mail=$_POST['mail'];
			$sql = "INSERT INTO usuarios (username,pwd,mail) values ('$nombreUsuario','$contrasenaHasheada','$mail')";
			$pdo->prepare($sql)->execute();
			echo "Registro correcto";
		}
		
	}
	else if(isset($_POST['cambioPWD'])){
		$contrasenaHasheada=password_hash($_POST['pwd'],PASSWORD_DEFAULT);
		//SQL para modificar el usuario cuyo nombre de usuario es el que viene en formulario
		// para poner su pwd a $contrasenaHasheada
		$sql = "UPDATE usuarios SET pwd='$contrasenaHasheada' WHERE username='$nombreUsuario'";
		//$pdo->query($sql)->fetch();
		$pdo->prepare($sql)->execute();
		$_SESSION['logeado']=true;
		header("Location: index.php");
	}
	else{
		//devuelvo error
		http_response_code(403);
	}
 
?>