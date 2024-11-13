<?php
	function selectUsuario($id){
		include "../Modelo/conexionBD.php";
		$resultado=$pdo->query("SELECT * FROM usuarios WHERE username= '$id' ");
		return $resultado->fetch(PDO::FETCH_ASSOC);
	}
?>