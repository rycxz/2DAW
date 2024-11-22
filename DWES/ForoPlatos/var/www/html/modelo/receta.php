<?php 
	include_once( "conexionBD.php" );

function obtenerIngredientesReceta($idReceta){
	$pdo = conexionBD();
	//sacto todos los datos de la tabla ingredienteReceta de mi receta 
	$rectasIng = $pdo->query("select * from receta_ingrediente where id_receta like '$idReceta' ") ;
	$recetasCompletas = $rectasIng->fetchAll(PDO::FETCH_ASSOC);
	

		if($recetasCompletas){
			return $recetasCompletas;
		  }
		  else{
			return false;
		  }
}
function sacarNombreIngrediente($idIngrediente) {
    $pdo = conexionBD();
    
    
    $nombreIngrediente = $pdo->query("SELECT nombre FROM ingrediente WHERE id = '$idIngrediente'");
    
     
    $nombre = $nombreIngrediente->fetchColumn();

    
    if ($nombre) {
        return $nombre;
    } else {
        return false; 
    }
}

function obtenerReceta($id){
	$pdo = conexionBD();
	$resultado = $pdo->query("select * from receta where id like '$id' ") ;
	if($resultado){
        return $resultado->fetch(PDO::FETCH_ASSOC); 
      }
      else{
        return false;
      }
}
function  borrarReceta($id){
	$pdo = conexionBD();
	$resultado = $pdo->query(" delete from recetas where id = '$id' ") ;
//duda en el borrado de un registro 
}


?>