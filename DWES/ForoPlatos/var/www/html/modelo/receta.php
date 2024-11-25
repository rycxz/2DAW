<?php
	include_once( "conexionBD.php" );


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
function borrarReceta($id) {

    $pdo = conexionBD();


    $resultado = $pdo->exec("DELETE FROM receta WHERE id = $id");

    return $resultado !== false;
}
function  actualizarReceta( $idReceta, $nombre   ,$elaboracion  ,$dificultad  ,$tipoReceta  ,$rutaImagen ){
  $pdo = conexionBD();
    $resultado=$pdo->query("update receta set
    nombre = '$nombre',
     elaboracion = '$elaboracion',
      dificultad = '$dificultad',
      tipoReceta = '$tipoReceta',
      rutaImagen = '$rutaImagen' where id = '$idReceta'");
if($resultado){
  return true;
}else{
  return false;
}
}





?>
