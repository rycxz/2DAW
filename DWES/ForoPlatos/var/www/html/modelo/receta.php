<?php 
	include_once( "conexionBD.php" );

function obtenerIngredientesReceta($idReceta){
	$pdo = conexionBD();
	//sacto todos los datos de la tabla ingredienteReceta de mi receta 
	$rectasIng = $pdo->query("select * from receta_ingediente where id_receta like '$idReceta' ") ;
	$recetasCompletas = $rectasIng->fetchAll(PDO::FETCH_ASSOC);
	//lo meto a un array 
	$idIngredientes = $recetasCompletas['id_ingrediente'];
	//me guardo los ides de los ingredientes 
	$nombreIngredientes = $pdo->query("select nombre from ingrediente where id like '$idIngredientes' ") ;
	 //saco los nombres de mis ingredientes 
	 
/*
Una variante mas: preguntar a  guile 
	 foreach($recetasCompletas as $campo => $valor){
			if($campo == "id_ingrediente"){
				$nombreIngredientes = $pdo->query("select nombre from ingrediente where id like '$valor' ") ;
				$nombreGuardar = $nombreIngredientes->fetch(PDO::FETCH_ASSOC);
				$valor = "";
				$valor = $nombreGuardar["nombre"];

	 }

*/


	$recetasCompletas['id_recetas']="";
	//vacio donde estaban los ids de mis ingredientes
	$recetasCompletas['id_recetas']= $nombreIngredientes->fetchAll(PDO::FETCH_ASSOC);
	//me gusardo en vez de los ids de mis ingredientes me guardo los nombres 

		if($recetasCompletas){
			return $recetasCompletas;
		  }
		  else{
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