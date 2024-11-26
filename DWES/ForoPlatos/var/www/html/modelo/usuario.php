<?php
	include_once( "conexionBD.php" );

	function selectNombre($nombre){
        $pdo = conexionBD();

		$resultado=$pdo->query("SELECT id FROM usuario WHERE nickname= '$nombre' ");

      if($resultado){
        return $resultado->fetch(PDO::FETCH_ASSOC);
      }
      else{
        return false;
      }
	}

	function selectPorNombre($nombre){
        $pdo = conexionBD();
		$resultado=$pdo->query("SELECT * FROM usuario WHERE nickname= '$nombre' ");
      if($resultado){
        return $resultado->fetch(PDO::FETCH_ASSOC);
      }
      else{
        return false;
      }
	}
    function selectUsuario($id){
        $pdo = conexionBD();
		$resultado=$pdo->query("SELECT * FROM usuario WHERE id= '$id' ");


        if($resultado){
            return $resultado->fetch(PDO::FETCH_ASSOC);
          }
          else{
            return false;
          }
	}
    function insertarUsuario( $nickname   ,$contrasenia ,$email  ,$usuario_redes  ,$esAdmin    ,$foto  ,$bannerFoto  ,$experiencia ){
	    $pdo = conexionBD();
        $resultado=$pdo->query("INSERT INTO usuario (nickname, contrasenia, email,usuario_redes,esAdmin,fechaRegistro,foto,bannerFoto, experiencia)
        VALUES ('$nickname', '$contrasenia', '$email','$usuario_redes','$esAdmin',NOW(),'$foto' , '$bannerFoto','$experiencia')");


	}
    function obtenerTodosUsuarios(){
        $pdo = conexionBD();
        $resultado = $pdo->query("select nickname from usuario") ;

            if($resultado){
                return $resultado->fetchAll(PDO::FETCH_ASSOC);
              }
              else{
                return false;
              }
    }
    function obtenerUltimoUsuarioRegistrado(){
        $pdo = conexionBD();
            $resultado = $pdo->query("select * from usuario where id = last_insert_id()") ;
                 $resultado->fetch(PDO::FETCH_ASSOC);
                if($resultado){
                    return $resultado->fetch(PDO::FETCH_ASSOC);
                  }
                  else{
                    return false;
                  }
        }
        function PWDolvido($id,$nuevaPWD){
          $pdo = conexionBD();
          $resultado = $pdo->query("update usuario set contrasenia = '$nuevaPWD' where id = '$id'") ;
          if($resultado){
            return true;
          }
          else{
            return false;
          }
        }
        function hacerAdmin($id){
          $pdo = conexionBD();
          $resultado = $pdo->query("update usuario set esAdmin = 1 where id = '$id'") ;
          if($resultado){
            return true;
          }
          else{
            return false;
          }
        }
        function borrarUsuario($id){
          $pdo = conexionBD();
          $resultado = $pdo->query("delete from usuario  where id = '$id'") ;
          if($resultado){
            return true;
          }
          else{
            return false;
          }
        }

?>
