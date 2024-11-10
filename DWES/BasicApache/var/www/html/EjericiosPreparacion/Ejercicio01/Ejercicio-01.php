<?php //Ejercicio 2: Formulario de login básico con sesiones
session_start();
$_SESSION['nombre'] = $_POST['nombre'];
$_SESSION['pwd'] = $_POST['pwd'];


if(isset($_POST['login'])){
 
  header("Location : saludo.php");
 
 
 
 

}
elseif(isset($_POST['cerrar'])){
    session_unset();
    session_destroy();
    header("Location :Formulario.html");
   
   
   }

else{
    //devuelvo error
    http_response_code(403);
}



?>