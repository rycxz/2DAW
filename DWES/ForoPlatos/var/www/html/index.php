<?php
session_start();
include ("../controlador/controladoresRegistroLogin/controladorLogin.php");
if (isset($_SESSION["loggeado"]) && $_SESSION["nickname"] == $datosUsuario['nickname']) {
//aqui lo que hago es si esta logeado y compruebo el nombre de usuario entonces le muestro el index de 
//un usuario registrado 
echo"








";

}
elseif (!isset($_SESSION["loggeado"]) && !isset($_SESSION["nikcname"])) {
//aqui iria el index de los usuarios que no esten registados 
}
else if (isset($_SESSION["loggeado"]) && $_SESSION["nickname"] == $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == true) {

//aqui mostraria el html de los admins 

//no se si es mejor hacer varios index o hacerlo con tipo hidden
}
else{
    //si no cumple ningua de mis condiciones lo mando a iniciar sesion 
    header('Location: vistas/login.html');
    exit();
}
?>