<?php
 session_start();
 
 session_destroy();
//aui pongo un temporizador para hacer la redireccion al index de no loggeados 
 /*aqui quise poner un sleep(3);
 
header( "Location: ../../vistas/index/indexNoLogged.php");
exit(); 
pero me di ceunta que no iba  */
?>