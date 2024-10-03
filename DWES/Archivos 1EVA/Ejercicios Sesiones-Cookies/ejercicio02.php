<?php
 header("Location: saludo.php");
$_POST['usuario'];
setcookie("nombreUsuario",$_POST['usuario'],time()+60);
 
 

/*Ejercicio de Cookies: Recordar Nombre de Usuario
   - Desarrolla un formulario que pida el nombre de usuario. 
   Cuando el usuario envíe el formulario, almacena su nombre en una cookie y 
   redirige a otra página que muestre un saludo personalizado utilizando 
   el nombre guardado en la cookie.*/
?>
