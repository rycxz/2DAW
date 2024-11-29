<?php
session_start();

//aqui puede ser que no me haga falata un session start sino solo habra que quitarselo
  if (isset($_SESSION["loggeado"]) && isset($_SESSION["nombreUsuario"])) {
    //si esta inciado pues miro si es un admin o no
    $datosUsuario = $_SESSION['usuarioCompleto'];


if ( (($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == 1)) {
//aqui hago un include de una vista de los admins de ver una sola receta
include '../../../modelo/receta.php';


if (isset($_FILES['rutaImagen']) && $_FILES['rutaImagen']['error'] == 0) {
  // Generamos un nombre único para la imagen usando el tiempo actual
  $nombreImagen = time() . "_" . $_FILES['rutaImagen']['name'];

  // Mover la imagen al directorio correspondiente
  $rutaDestino = "../../../imagenes/imagenesReceta/" . $nombreImagen;
  move_uploaded_file($_FILES['rutaImagen']['tmp_name'], $rutaDestino);
} else {
  // Si no hay imagen, asignamos la imagen por defecto
  $nombreImagen = "a.png";
}

actualizarReceta ($_POST['id_receta'] ,$_POST['nombre'],$_POST['elaboracion'],$_POST['dificultad'],$_POST['tipoReceta'],$nombreImagen);
$_SESSION['receta']="";
$_SESSION['ingReceta']="";
header("Location: ../../../controlador/controladorIndex/redireccionesIndex.php?modificarReceta=modificadaConExito");
}
else if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] ) {
//aqui mostraria una vista de los usuarios que si que estan registrados

header("Location: ../../../controlador/controladorIndex/redireccionesIndex.php");
exit();
}
}
  else{

  //aqui mostrar el apartado de una receta si no estas registrado
  header("Location: ../../../controlador/controladorIndex/redireccionesIndex.php");
  exit();
}

?>
