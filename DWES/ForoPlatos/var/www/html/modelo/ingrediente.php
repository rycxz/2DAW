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
    function obtenerTodosLosIngredientes(){
        $pdo = conexionBD();
        //sacto todos los datos de la tabla ingredienteReceta de mi receta
        $ingredientes = $pdo->query("select * from ingrediente") ;
        $ingredientesTotales = $ingredientes->fetchAll(PDO::FETCH_ASSOC);


            if($ingredientesTotales){
                return $ingredientesTotales;
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
    function insertarIngrediente(  $nombre  ){
      $pdo = conexionBD();
        $resultado=$pdo->query("INSERT INTO ingrediente (nombre )
        VALUES ('$nombre')");
        if($resultado) {
            return   true;
        } else {
            return false;
        }


    }
    function sacarIdPorNombre ($nombre){
        $pdo = conexionBD();
        $resultado=$pdo->query("select id from ingrediente where nombre like '$nombre' ") ;
        $id = $resultado->fetchColumn();
        if ($resultado) {
            return $id;
        } else {
            return false;
        }

    }
    function insertarIngredienteReceta( $idReceta,$idIngrediente  ,$cantidad  ,$medida_unidad ){
        $pdo = conexionBD();

        $resultado=$pdo->query("INSERT INTO receta_ingrediente (id_receta,id_ingrediente,cantidad,medida_unidad) VALUES ('$idReceta','$idIngrediente','$cantidad','$medida_unidad')");

    }
    //hay que hacer una funcion que elimine un ingrediente de receta_ingrediente por su id
    function borrarIngrediente($id_ingrediente,$id_receta) {
        $pdo = conexionBD();

        $resultado = $pdo->exec("DELETE FROM receta_ingrediente WHERE id_ingrediente = $id_ingrediente and id_receta = $id_receta");

        return $resultado !== false;
    }
    //hya que hacer una consulta que modifique la cantidad de un ingrediente de receta_ingrediente

    function  actaulizarCantidadIngrediente( $id_receta ,$cantidad  ,$medida_unidad,$id_ingrediente ){
        $pdo = conexionBD();
          $resultado=$pdo->query("update receta_ingrediente set
          cantidad = '$cantidad',
           medida_unidad = '$medida_unidad'
           where id_ingrediente = $id_ingrediente and id_receta = $id_receta");
      if($resultado){
        return true;
      }else{
        return false;
      }
      }
      function sacarIngredienteIndexPorPalabra($primeraReceta,$tamanioPagina,$palabraClave){

        $pdo = conexionBD();
        $palabra_limpia = trim($palabraClave);
        $resultado = $pdo->query("SELECT  receta.id,receta.nombre,receta.elaboracion,receta.id_usuario,receta.fechaPublicacion,receta.dificultad,receta.tipoReceta,receta.valoracionMedia,receta.rutaImagen
FROM receta
JOIN receta_ingrediente ON receta_ingrediente.id_receta = receta.id
JOIN ingrediente ON ingrediente.id = receta_ingrediente.id_ingrediente
WHERE ingrediente.nombre COLLATE utf8mb4_general_ci LIKE  '%$palabra_limpia%' LIMIT $primeraReceta,$tamanioPagina  ");

        if($resultado){
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
          }
          else{
            return false;
          }
    }
?>
