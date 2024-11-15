<?php
session_start();
$datosUsuario= selectUsuario(selectNombre($usuarioForm));
if (isset($_SESSION["loggeado"]) && $_SESSION["nickname"] == $datosUsuario['nickname'] && $_POST['verPerfilUsuario']) {
//      aqui me hara falta el html con uno botones igual queel index 

}
else if (isset($_SESSION["loggeado"]) && $_SESSION["nickname"] == $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == true) {

    //aqui mostraria el ver perfil de los admins que seria lo mismo pero quitnadole el boton a un hidden  de los admins 
    
    //para borrar usuario poejemplo podria hacera en una funcion y llamra com si fuese javascript? 
    //o tendria que hacer un contrador nuevo ? 
    }
    
    else{
        //si no cumple ningua de mis condiciones lo mando a iniciar sesion 
        header('Location: ../../vistas/vistasLoginRegistro/login.php');
        exit();
    }


?>