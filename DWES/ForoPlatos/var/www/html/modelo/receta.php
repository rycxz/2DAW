<?php
	include_once( "conexionBD.php" );

  function Recetas() {
    $pdo = conexionBD();
    $resultado = $pdo->query("SELECT * FROM receta");
    if ($resultado) {
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
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
function obtenerRecetaNombre($nombre){
	$pdo = conexionBD();
	$resultado = $pdo->query("select * from receta where nombre like '$nombre' ") ;
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
}function recetasPorUsuario($idUsuario) {
  $pdo = conexionBD();
  $resultado = $pdo->query("SELECT * FROM receta where id_usuario = $idUsuario");
  if ($resultado) {
      return $resultado->fetchAll(PDO::FETCH_ASSOC);
  } else {
      return false;
  }
}

function cantidadRecetas() {

  $pdo= conexionBD ();
  $nombreBase=$pdo->query("SELECT  COUNT(*)  FROM receta");

  $nombre = $nombreBase->fetch(PDO::FETCH_COLUMN);

  if($nombre){
      return $nombre;
  }else{
      return false;
}}


function recetasPorTipo($tipoRecetas) {
  $pdo = conexionBD();
  $resultado = $pdo->query("SELECT * FROM receta where tipoReceta = $tipoRecetas");
  if ($resultado) {
      return $resultado->fetchAll(PDO::FETCH_ASSOC);
  } else {
      return false;
  }
}
function recetasPorDificultad($dificultad) {
  $pdo = conexionBD();
  $resultado = $pdo->query("SELECT * FROM receta where dificultad = $dificultad");
  if ($resultado) {
      return $resultado->fetchAll(PDO::FETCH_ASSOC);
  } else {
      return false;
  }
}
function recetasPorPalabra($palabraClave) {
  $pdo = conexionBD();

  $resultado = $pdo->query("SELECT * FROM receta WHERE nombre LIKE '%$palabraClave%'");

  if ($resultado) {

      return $resultado->fetchAll(PDO::FETCH_ASSOC);
  } else {
      return false;
  }
}

function sacarRecetasIndex($primeraReceta,$tamanioPagina){
	$pdo = conexionBD();

	$resultado = $pdo->query("SELECT * FROM receta LIMIT $primeraReceta,$tamanioPagina");

	if($resultado){
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
      }
      else{
        return false;
      }
}
function sacarRecetasIndexPorPalabra($primeraReceta,$tamanioPagina,$palabraClave){
	$pdo = conexionBD();

	$resultado = $pdo->query("SELECT * FROM receta  WHERE nombre LIKE '%$palabraClave%' LIMIT $primeraReceta,$tamanioPagina ");

	if($resultado){
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
      }
      else{
        return false;
      }
} function sacarRecetasIndexPorDificultad($primeraReceta,$tamanioPagina,$dificultad){
	$pdo = conexionBD();

	$resultado = $pdo->query("SELECT * FROM receta LIMIT $primeraReceta,$tamanioPagina WHERE dificultad = '$dificultad'");

	if($resultado){
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
      }
      else{
        return false;
      }
} function sacarRecetasIndexPorTipo($primeraReceta,$tamanioPagina,$tipoRecetas){
	$pdo = conexionBD();

	$resultado = $pdo->query("SELECT * FROM receta LIMIT $primeraReceta,$tamanioPagina WHERE tipoReceta = '$tipoRecetas'");

	if($resultado){
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
      }
      else{
        return false;
      }
}
function sacarRecetasIndexPorUsuario($primeraReceta,$tamanioPagina,$idUsuario){
	$pdo = conexionBD();

	$resultado = $pdo->query("SELECT * FROM receta LIMIT $primeraReceta,$tamanioPagina WHERE id_usuario = '$idUsuario'");

	if($resultado){
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
      }
      else{
        return false;
      }
}


?>
