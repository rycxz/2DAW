<?php
session_start();
$datosUsuario= selectUsuario(selectNombre($usuarioForm));
if (isset($_SESSION["loggeado"]) && $_SESSION["nickname"] == $datosUsuario['nickname'] && $_POST['verRecetas']) {
//    ver recetas de un usuario registrado 

}
else if (isset($_SESSION["loggeado"]) && $_SESSION["nickname"] == $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == true) {
    //lo que quiero aqui es que para los admin sala un apartado de recetas y un boton de borrar y modificar que sera muy parecido al de crear recetas

        }
    
    else{
        //si no cumple ningua de mis condiciones lo mando a iniciar sesion 
        header('Location: vistas/login.html');
        exit();
    }


?>