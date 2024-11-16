<?php
 session_start();
 var_dump($_SESSION["loggeado"]);var_dump($_SESSION["nombreUsuario"]) ;
 exit();
 session_destroy();
//aui pongo un temporizador para hacer la redireccion al index de no loggeados 

 
header( " Location : ../../vistas/index/indexNoLogged.php");
exit();
?>