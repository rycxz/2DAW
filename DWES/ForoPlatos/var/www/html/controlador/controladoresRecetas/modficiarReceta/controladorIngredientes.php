 <?php
session_start();
//aqui puede ser que no me haga falata un session start sino solo habra que quitarselo
  if (isset($_SESSION["loggeado"]) && isset($_SESSION["nombreUsuario"])) {
    //si esta inciado pues miro si es un admin o no
    $datosUsuario = $_SESSION['usuarioCompleto'];
if   (($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == 1) {
  //para poner ingredientes a la receta
  if (isset( $_POST['AniadirIng'])){
if( isset($_POST['ingredienteEntrada']) && !is_numeric( $_POST['ingredienteEntrada'])){
  // compruebo que mi ingrediente exita y no tenga un numero en su nombre
  insertarIngrediente($_POST['ingredienteEntrada']);
  // me gaurdo su nombre
  $nombreIngrediente =  $_POST['ingredienteEntrada'];
  //recupero la receta de la sesion
$receta = $_SESSION["receta"];
// saco los ingredientes de m ireceta y los comparo
$ingredientesReceta=obtenerIngredientesReceta($receta['id']);
foreach($ingredientesReceta as $ingrediente){
  // una vez recorriod cada ingrediente si no cioncide con ninguno lo añado al campo de recetas
  $nombreParaComparar = sacarNombreIngrediente($ingrediente['id_ingrediente']);
  if(strcasecmp($nombreParaComparar,$nombreIngrediente)){
    header("Location: ../../../controlador/controladoresRecetas/modificarRecetas.php?exiteIngrediente = true");
    exit();
  }
  else{
    insertarIngredienteReceta($receta['id'] ,sacarIdPorNombre($nombreIngrediente) ,$_POST['cantidad'],$_POST['unidadMedida'] );
  }
}
}
else{
  header("Location: ../../../controlador/controladoresRecetas/modificarRecetas.php?contieneNumeros = true");
  exit();

}

}
elseif (isset($_POST['guardarCambios'])){
  $receta = $_SESSION["receta"];
if( isset($_POST['eliminarIngrediente']) ){
  borrarIngrediente( $_POST['eliminarIngrediente'],$receta['id'] );
}
elseif (isset($_POST['cantidad']) ){
  actaulizarCantidadIngrediente($receta['id'],$_POST['cantidad'],$_POST['unidadMedida'],$_POST['id_ingrediente']);
}
else{
  $_SESSION['receta']="";
$_SESSION['ingReceta']="";
header("Location: ../../../controlador/controladorIndex/redireccionesIndex.php?modificarReceta=modificadaConExito");
  exit();
}

}
}}
else{

      //aqui mostrar el apartado de una receta si no estas registrado
      header("Location: ../../../controlador/controladorIndex/redireccionesIndex.php");
      exit();
}

?>
