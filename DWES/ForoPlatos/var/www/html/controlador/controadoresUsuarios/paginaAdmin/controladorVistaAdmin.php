<?php
// Inicia la sesión para manejar autenticación
session_start();

// Incluye los modelos necesarios
include("../../../modelo/usuario.php");
include("../../../modelo/receta.php");
include  ("../../../controlador/controadoresUsuarios/sesion.php");
control();
// Verifica si el usuario está logueado y si tiene permisos de administrador
if (isset($_SESSION["loggeado"]) && isset($_SESSION["nombreUsuario"])) {
    $datosUsuario = $_SESSION['usuarioCompleto'];

    // Verifica que el usuario esté logueado, que el nickname coincida y que sea administrador
    if ($_SESSION["loggeado"] === true && $_SESSION["nombreUsuario"] === $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == 1) {
        // Obtiene todos los usuarios y recetas para mostrarlos en la vista
        $todasRecetas = Recetas();


        $todosUsuarios = usuarios();

        // Carga la vista correspondiente
        include("../../../vistas/admins/vistaPaginaAdmin.php");
        exit();
    }
}

// Si no está logueado o no tiene permisos, redirige al índice
header("Location: ../../../controlador/controladorIndex/redireccionesIndex.php");
exit();
?>
