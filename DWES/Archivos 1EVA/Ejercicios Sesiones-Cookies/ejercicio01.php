<?PHP
session_start();
 if(!isset($_SESSION["contador"])){
	 $_SESSION["contador"]=0;
 }else{
	  $_SESSION["contador"]=$_SESSION["contador"]+1;
	 
 }
  echo  $_SESSION["contador"];
  
 /*Ejercicio de Sesiones: Contador de Visitas
   - Crea una página PHP que utilice sesiones para contar cuántas veces ha visitado un usuario la página.
   Cada vez que recargue la página, debe mostrarse un mensaje indicando cuántas veces ha sido visitada.*/
 ?>
   