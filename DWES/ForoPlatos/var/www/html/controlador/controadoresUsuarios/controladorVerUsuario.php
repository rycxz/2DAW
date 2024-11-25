<?php
session_start();
$datosUsuario= selectUsuario(selectNombre($usuarioForm));
if (isset($_SESSION["loggeado"]) && $_SESSION["nickname"] == $datosUsuario['nickname'] && $_POST['verPerfilUsuario']) {


}
else if (isset($_SESSION["loggeado"]) && $_SESSION["nickname"] == $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == true) {

    }

    else{

        header("Location: ../../../controlador/controladorIndex/redireccionesIndex.php");
        exit();
    }


?>
