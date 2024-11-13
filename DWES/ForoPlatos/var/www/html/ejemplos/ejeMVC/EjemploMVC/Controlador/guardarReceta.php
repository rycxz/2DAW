<?php
	session_start();
	$_SESSION['loggedIn']=true;
	if(isset($_SESSION['loggedIn'])){
		if(isset($_POST['enviarReceta'])){
			//var_dump($_FILES['imagen']);
			$nombreImagen=time()."_".$_FILES['imagen']['name']);
			move_uploaded_file($_FILES['imagen']['tmp_name'],"../imagenes/".$nombreImagen;
			include "../Modelo/receta.php";
			guardarReceta($_POST,$nombreImagen);		
		}
		else{
			header("Location: index.php");
		}
	}
	else{
		header("Location: login.html");
	}
?>