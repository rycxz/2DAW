<?php
//aqui puede ser que no me haga falata un session start sino solo habra que quitarselo 
  if (isset($_SESSION["loggeado"]) && isset($_SESSION["nombreUsuario"])) {
    //si esta inciado pues miro si es un admin o no 
    $datosUsuario = $_SESSION['usuarioCompleto'];
   
if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == 1) {
//aqui hago un include de una vista de los admins de ver una sola receta 
 $id = $_GET['idReceta'] ;
 borrarReceta($id);

 
}
 
else if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] ) {
//aqui mostraria una vista de los usuarios que si que estan registrados  
 
include "../../vistas/index/indexLogged.php";
 
}
}
 
 
  else{
 
  //aqui mostrar el apartado de una receta si no estas registrado 
include "../../vistas/index/indexNoLogged.php";
}
   
?>