<?php
 session_start();

if (isset($_SESSION["loggeado"]) && isset($_SESSION["nombreUsuario"])) {

    include ("../../../modelo/usuario.php");
    $pdo = conexionBD();
     $datosUsuario = $_SESSION['usuarioCompleto'] ;

   if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == 1) {
   //dudads como me puedo pasar el valor del usuario que yo quiero tener. como lo tengo en la sesion hago un consulta con usuario y obtengo todos los datos?
   //o como es eso hago un include del controlador a la vista ?
   //sino hago un tipo hidden y me paso los vlaores al final es lo mismo pero no se que  seria o mas correcto

   //hacer  los varios ifs  y un else con una redireccion al index

   switch ($_POST['boton']) {

       case 'Administracion':

             header ('Location:../../../vistas/admins/vistaPaginaAdmin.php');
                    break;

                case 'Cerrar Sesion':
                    header ("Location: ../../../vistas/cerrarSesion/cerrarSesion.php");
                   break;
        case 'Ver Usuarios':
            header ('Location:../../../controlador/controadoresUsuarios/controladorVerUsuario.php');
               break;



   }
}
   else if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] ) {


    //hacer  los varios ifs  y un else con una redireccion al index
 switch ($_POST['boton']) {
        case "Cerrar Sesion":
            header ("Location: ../../../vistas/cerrarSesion/cerrarSesion.php");
            break;
            case 'Ver Usuarios':
                header ('Location:../../../controlador/controadoresUsuarios/controladorVerUsuario.php');
                   break;


}
    }

}


//aqui muestro la redireccion si le da a administracion

else  {

    //aqui iria el index de los usuarios que no esten registados


    //hacer  los varios ifs  y un else con una redireccion al index
    switch ($_POST['boton']) {


            case 'Iniciar Sesion':

                   header ("Location: ../../../vistas/vistasLoginRegistro/login.php");
                    break;



    }
    }



?>
