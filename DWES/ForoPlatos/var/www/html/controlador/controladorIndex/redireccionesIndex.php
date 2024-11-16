<?php
  
if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == 1) {
//aqui lo que hago es si esta logeado y compruebo el nombre de usuario entonces le muestro el index de 
//un usuario registrado 
 include "../../vistas/index/indexAdmin.php";

}
elseif (!isset($_SESSION["loggeado"]) && !isset($_SESSION["nombreUsuario"])) {
//aqui iria el index de los usuarios que no esten registados 
include "../../vistas/index/indexNoLogged.php";
}
else if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] ) {
    
//aqui mostraria el html de los admins 
include "../../vistas/index/indexLogged.php";
 
}
else{
    //si no cumple ningua de mis condiciones lo mando a iniciar sesion 
    header('Location: .../../vistas/index/indexNoLogged.php');
    exit();
}
?>
 