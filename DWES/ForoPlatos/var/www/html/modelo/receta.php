<?php
	include_once( "conexionBD.php" );

  function Recetas(){
    $pdo = conexionBD();
    $resultado = $pdo->query("select * from receta   ") ;
    if($resultado){
          return $resultado->fetch(PDO::FETCH_ASSOC);
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
}}
function insertarReceta($nombre, $elaboracion, $id_usuario,  $dificultad, $tipoReceta,  $rutaImagen) {
  $pdo = conexionBD();


  $resultado = $pdo->query("INSERT INTO receta (nombre, elaboracion, id_usuario, fechaPublicacion, dificultad, tipoReceta, valoracionMedia, rutaImagen)
                            VALUES ('$nombre', '$elaboracion', '$id_usuario', NOW(), '$dificultad', '$tipoReceta', '0', '$rutaImagen')");

  if ($resultado) {
      return true;
  } else {
      return false;
  }
}





?>
