<?php

function control(){

    if (session_status() === PHP_SESSION_NONE) {

      session_start();
    } else {

    }


if (isset($_SESSION["tiempoInicio"]) && (time() - $_SESSION["tiempoInicio"]) > 120) {
    session_unset();
    session_destroy();
    header("Location:  ../../controlador/controladorIndex/redireccionesIndex.php");
    exit;
}

$_SESSION["tiempoInicio"] = time();
}




?>
