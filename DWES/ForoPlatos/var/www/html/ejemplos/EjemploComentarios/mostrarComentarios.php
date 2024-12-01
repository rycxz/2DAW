<?php
	function mostrarComentario($comentarios, $miComentario, $margen){
		echo "Autor: {$miComentario['id_usuario']}<br>";
		echo "Contenido: {$miComentario['texto']}<br>";
	
		$respuestas=array();
		foreach($comentarios as $comentario){
			if($comentario['id_comentario_respuesta']==$miComentario['id']){
				$respuestas[]=$comentario;
			}
		}
		echo "<div style='margin-left:{$margen}px;'>";
		foreach($respuestas as $respuesta){
			mostrarComentario($comentarios, $respuesta, $margen+150);
		}
		echo "</div>";
	}
	foreach($comentarios as $comentario){
		if($comentario['id_comentario_respuesta']==null){
			mostrarComentario($comentarios,$comentario,150);
		}
	}
?>