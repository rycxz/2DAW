<?php
      session_start();
//aqui puede ser que no me haga falata un session start sino solo habra que quitarselo
  if (isset($_SESSION["loggeado"]) && isset($_SESSION["nombreUsuario"])) {
    //si esta inciado pues miro si es un admin o no
    $datosUsuario = $_SESSION['usuarioCompleto'];


if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == 1) {
//aqui hago un include de una vista de los admins de ver una sola receta
include("../../modelo/ingrediente.php");
    if(isset($_POST['ingrediente'])){
        $nombreIngrediente = $_POST['ingrediente'];
        $ingredientes = obtenerTodosLosIngredientes();

        $ingredienteDuplicado = false;

        // Verificar si el ingrediente ya existe
        foreach ($ingredientes as $ingrediente) {
            $nombreParaComparar = $ingrediente['nombre'];
            if (strcasecmp($nombreParaComparar, $nombreIngrediente) === 0) {
                $ingredienteDuplicado = true;
                break;
            }
        }

        if ($ingredienteDuplicado) {

            header("Location: ../../controlador/controladorIndex/redireccionesIndex.php");
            exit();
        } else {

            insertarIngrediente($nombreIngrediente);

        }

    }
    elseif(isset($_POST['agregarRecetas'])){
               $id= $_POST['id'];
            header( "Location: ../../vistas/recetas/aniadirReceta.php?idUsuario=$id");
            exit();
    }

}

else if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] ) {
//aqui mostraria una vista de los usuarios que si que estan registrados

include "../../vistas/recetas/verUnaReceta/verUnaSolaRecetaLogged.php";
exit();
}
}
  else{

  //aqui mostrar el apartado de una receta si no estas registrado
  include "../../vistas/recetas/verUnaReceta/verUnaSolaReceta.php";
  exit();
}

?>
