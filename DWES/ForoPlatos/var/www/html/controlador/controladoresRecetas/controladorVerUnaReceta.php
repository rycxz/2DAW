<?php
session_start();
$datosUsuario= $_SESSION['usuarioCompleto'];
 
  if (isset($_SESSION["loggeado"]) && $_SESSION["nickname"] == $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == true ) {
   //l oque quiero aqui es ver si el usuario es un admin si lo es este va a tener uno botones mas para la receta de todos sino 
   //solor el usuario podra modificar sus recetas

   //aqui importante crear otra vista para que el admin pueda hacer cosas de admin 
   include("");
        }
        else if (isset($_SESSION["loggeado"]) && $_SESSION["nickname"] == $datosUsuario['nickname'] ) {
            include("");
           }
?>