<?php
session_start();
include_once("../../modelo/usuario.php");
include  ("../../controlador/controadoresUsuarios/sesion.php");
control();
if(isset($_POST['botonAccion'])){
    if (isset($_SESSION["loggeado"]) && isset($_SESSION["nombreUsuario"])) {

        $datosUsuario = $_SESSION['usuarioCompleto'];

    if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == 1) {
    //aqui hago un include de una vista de los admins de ver una sola receta
    $accionRealizar = $_POST['botonAccion'];
        switch($accionRealizar){
            case 'Hacer Adminstrador';
            hacerAdmin($_GET['idUsuario']) ;
            header ( "Location: ../../../controlador/controladorIndex/redireccionesIndex.php?operacionRealizada=true");
            exit();
            break;
            case 'Editar perfil';
                $usuario = selectUsuario($_GET['idUsuario']);
            include "../../vistas/usuarios/acciones/modificarUsuario.php";
            exit();
            break;
            case 'Eliminar cuenta';
            borrarUsuario($_GET['idUsuario']);
            header ( "Location: ../../../controlador/controladorIndex/redireccionesIndex.php?operacionRealizada=true");
            exit();
            break;
            case 'Cambiar contraseña';
            $usuario = selectUsuario($_GET['idUsuario']);
           include "../../vistas/usuarios/acciones/modificarContraseña.php";
           exit();
           break;
        }

    }

    else if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] ) {
    //aqui mostraria una vista de los usuarios que si que estan registrados
    $accionRealizar = $_POST['botonAccion'];
    switch($accionRealizar){
        case 'Cambiar contraseña';
              $usuario = selectUsuario($_GET['idUsuario']);
             include "../../vistas/usuarios/acciones/modificarContraseña.php";
             exit();
             break;
            case 'Editar perfil';

            $usuario = selectUsuario($_GET['idUsuario']);
        include "../../vistas/usuarios/acciones/modificarUsuario.php";
        exit();
        break;
        case 'Eliminar cuenta';
        borrarUsuario($_GET['idUsuario']);
        header ( "Location: ../../../controlador/controladorIndex/redireccionesIndex.php?operacionRealizada=true");
        exit();
        break;
    }
    }
    else{

        //aqui mostrar el apartado de una receta si no estas registrado
        header("Location: ../../../controlador/controladorIndex/redireccionesIndex.php");
        exit();
      }
}
}
  else{

  //aqui mostrar el apartado de una receta si no estas registrado
  header("Location: ../../../controlador/controladorIndex/redireccionesIndex.php");
  exit();
}

?>
