<?php
	include_once( "conexionBD.php" );
  function sacarComentariosReceta($idReceta) {
    $pdo = conexionBD(); // Conexión a la base de datos

    $resultado = $pdo->query("SELECT * FROM comentario WHERE id_receta = $idReceta");


    return $resultado->fetchAll(PDO::FETCH_ASSOC) ?: false;
}
/*  id_receta int UNSIGNED DEFAULT NULL,
  id_usuario int UNSIGNED DEFAULT NULL,
  id_comentario_respuesta int UNSIGNED DEFAULT NULL,
  texto varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  fecha_creacion date NOT NULL,
  valoracion int DEFAULT  */
function insetarComentariosConPapa($id_receta, $id_usuario, $id_comentario_respuesta, $texto, ) {
  $pdo = conexionBD();


  $resultado = $pdo->query("INSERT INTO comentario (id_receta, id_usuario,id_comentario_respuesta, texto, fecha_creacion, valoracion)
                            VALUES ('$id_receta', '$id_usuario','$id_comentario_respuesta', '$texto', now(), null)");

  if ($resultado) {
      return true;
  } else {
      return false;
  }
}
function insetarComentariosConValo($id_receta, $id_usuario, $texto, $valoracion) {
  $pdo = conexionBD();


  $resultado = $pdo->query("INSERT INTO comentario (id_receta, id_usuario,id_comentario_respuesta, texto, fecha_creacion, valoracion)
   VALUES ('$id_receta', '$id_usuario', null , '$texto', now(), '$valoracion')");

  if ($resultado) {
      return true;
  } else {
      return false;
  }
}
function borrarComentario($id) {

  $pdo = conexionBD();


  $resultado = $pdo->exec("DELETE FROM comentario WHERE id = $id");

  return $resultado !== false;
}

    ?>
