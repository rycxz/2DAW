<?php
	include_once( "conexionBD.php" );
    function sacarComentariosReceta($idReceta){
        $pdo = conexionBD();
        //sacto todos los datos de la tabla ingredienteReceta de mi receta
        $rectasIng = $pdo->query("select * from comentario where id_receta like '$idReceta' ") ;
        $recetasCompletas = $rectasIng->fetchAll(PDO::FETCH_ASSOC);


            if($recetasCompletas){
                return $recetasCompletas;
              }
              else{
                return false;
              }
    }
