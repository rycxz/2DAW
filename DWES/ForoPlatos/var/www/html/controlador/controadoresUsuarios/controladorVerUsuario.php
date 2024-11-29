<?php
session_start();


if (isset($_SESSION["loggeado"]) && isset($_SESSION["nombreUsuario"])) {
    // si está iniciado, pues miro si es un admin o no
    $datosUsuario = $_SESSION['usuarioCompleto'];
    include_once("../../modelo/usuario.php");
    include_once("../../modelo/receta.php");
    if (isset($_GET['idUsuario'])) {

        $idUsuario = $_GET['idUsuario'];
        $todasRecetas = recetasPorUsuario($idUsuario);



        // si eres admin y es tu perfil
        if (($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] &&
            $datosUsuario['esAdmin'] == 1 && $idUsuario == $datosUsuario['id']) {
            // incluyo la vista de ver usuario

            include "../../vistas/usuarios/paginaUsuarioAdminPropio.php";
            exit();
        }
        // si no eres admin y el perfil no es tuyo, te dejo verlo
        else if (($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] &&
                 $datosUsuario['id'] == $idUsuario) {

            include "../../vistas/usuarios/paginaUsuarioAjeno.php";
            exit();
        }
           // si no se pasa un idUsuario en el GET
           else  if (($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] &&
            $datosUsuario['esAdmin'] == 1) {
            $datosUsuario = selectUsuario($idUsuario); // Usa el ID del usuario en sesión

            include "../../vistas/usuarios/paginaUsuarioAdminAjeno.php";
            exit();
        } elseif (($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname']) {
          $datosUsuario = selectUsuario($idUsuario); // Usa el ID del usuario en sesión

            include "../../vistas/usuarios/paginaUsuario.php";
            exit();
        }
            }


            else  {

              // si el GET no está set
              if (($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] &&
                  $datosUsuario['esAdmin'] == 1) {
                  $datosUsuarioSeleccionado = selectUsuario($datosUsuario['id']); // Usa el ID del usuario en sesión

                  include "../../vistas/usuarios/paginaUsuarioAdminPropio.php";
                  exit();
              } elseif (($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname']) {

                  include "../../vistas/usuarios/paginaUsuario.php";
                  exit();
              }



}} else {
    // aquí mostrar el apartado de una receta si no estás registrado
    header("Location: ../../../controlador/controladorIndex/redireccionesIndex.php");
    exit();
}

?>
