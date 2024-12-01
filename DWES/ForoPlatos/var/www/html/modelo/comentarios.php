<?php
	include_once( "conexionBD.php" );
  function sacarComentariosReceta($idReceta) {
    $pdo = conexionBD(); // Conexión a la base de datos

    // Consulta directa
    $resultado = $pdo->query("SELECT * FROM comentario WHERE id_receta = $idReceta");

    // Devuelve los resultados o false si no hay comentarios
    return $resultado->fetchAll(PDO::FETCH_ASSOC) ?: false;
}

    ?>
