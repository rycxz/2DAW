<?php

  if (isset($_SESSION["loggeado"]) && isset($_SESSION["nombreUsuario"])) {
    $datosUsuario = $_SESSION['usuarioCompleto'];
   
if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == 1) {
//aqui lo que hago es si esta logeado y compruebo el nombre de usuario entonces le muestro el index de 
//un usuario registrado 
 include "../../vistas/index/indexAdmin.php";

}
 
else if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] ) {
    
//aqui mostraria el html de los admins 
include "../../vistas/index/indexLogged.php";
 
}
 
  }
  else{
    //si no cumple ningua de mis condiciones lo mando a n o logged  
    header('Location: ../../vistas/index/indexNoLogged.php');
    exit();
}
?>
 
 