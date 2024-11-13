<?php
	function selectNombre($nombre){
		include "conexionBD.php";
		$resultado=$pdo->query("SELECT id FROM usuario WHERE nickname= '$nombre' ");
    
		return $resultado;
	}
    function selectUsuario($id){
		include "conexionBD.php";
		$resultado=$pdo->query("SELECT * FROM usuario WHERE id= '$id' ");
		return $resultado->fetch(PDO::FETCH_ASSOC);
	}
    function insertarUsuario( $nickname   ,$contrasenia ,$email  ,$usuario_redes  ,$esAdmin  ,$fechaRegistro  ,$foto  ,$bannerFoto  ,$experiencia ){
		include "conexionBD.php";
        $resultado=$pdo->query("INSERT INTO usuario (nickname, contrasenia, email,usuario_redes,esAdmin,fechaRegistro,foto,bannerFoto, experiencia) 
        VALUES ('$nickname', '$contrasenia', '$email','$usuario_redes','$esAdmin',NOW(),'$foto' , '$bannerFoto','$experiencia')");
        
		 
	}
    function obtenerTodosUsuarios(){
    include "conexionBD.php";
        $consulta = $pdo->query("select * from usuario") ;
        	return $consulta->fetch(PDO::FETCH_ASSOC);
    }
    function obtenerUltimoUsuarioRegistrado(){
        include "conexionBD.php";
            $consulta = $pdo->query("select * from usuario where id = last_insert_id()") ;
                return $consulta->fetch(PDO::FETCH_ASSOC);
        }

?>
