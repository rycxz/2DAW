<?php
session_start();
//asi esto le hago un include y ya me lo da hecho 
//al hacer un header abro la session y miro que hay dentro 
  if (isset($_SESSION["loggeado"]) && isset($_SESSION["nombreUsuario"])) {
    //si esta inciado pues miro si es un admin o no 
    $datosUsuario = $_SESSION['usuarioCompleto'];
   
if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == 1) {
//muestro le header de los admins 
echo '
<script src="../../vistas/Headers/HeaderAdmin.js"></script>
';
}
 
else if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] ) {
    
//aqui mostraria el header  de los registrados  
echo '
<script src="../../vistas/Headers/HeaderLogged.js"></script>
';
 
}
 
  }
  else{
    echo '
    <script src="../../vistas/Headers/HeaderNoLogged.js"></script>
    ';
     
}
?>