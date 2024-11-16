<?php 
session_start();
 include ("../../../modelo/usuario.php");
 $pdo = conexionBD();
  $datosUsuario = $_SESSION['usuarioCompleto'] ;
 
 
if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == 1) {
//dudads como me puedo pasar el valor del usuario que yo quiero tener. como lo tengo en la sesion hago un consulta con usuario y obtengo todos los datos? 
//o como es eso hago un include del controlador a la vista ? 
//sino hago un tipo hidden y me paso los vlaores al final es lo mismo pero no se que  seria o mas correcto
$eleccion = $_POST['boton'];
//hacer  los varios ifs  y un else con una redireccion al index 
switch ($eleccion) {
    case 'Administracion':
 
        include ('../../../vistas/admins/vistaPaginaAdmin.php');
                 break;
             case 'Cerrar Sesion':
                include ('../../../vistas/cerrarSesion/cerrarSesion.php');
                break;
     case 'Ver Usuarios':
        include ('../../../vistas/admins/usuarios/paginaUsuario.php');
            break;
    case 'Ver Recetas':
        include ('../../../vistas/admins/recetas/paginaRecetas.php');
             break;
       

}

//aqui muestro la redireccion si le da a administracion 
}
elseif (!isset($_SESSION["loggeado"]) && !isset($_SESSION["nombreUsuario"])) {
    //aqui iria el index de los usuarios que no esten registados 
  
    $eleccion = $_POST['boton'];
    //hacer  los varios ifs  y un else con una redireccion al index 
    switch ($eleccion) {
            case 'Ver Usuarios':
                include ('');
            break;
            case 'Ver Recetas':
                include ('');
                break;
            case 'Iniciar Sesion':
                   include ('');
                    break;



    }
    }
    else if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] ) {
    $eleccion = $_POST['boton'];
    //hacer  los varios ifs  y un else con una redireccion al index 
    switch ($eleccion) {
        case 'Cerrar Sesion':
            
            header (' Location : ../../../vistas/cerrarSesion/cerrarSesion.php');
            break;
            case 'Ver Usuarios':
                include ('');
            break;
            case 'Ver Recetas':
                include ('');
                break;
       
}
    }
         
            
else{
    //si no cumple ningua de mis condiciones lo mando a iniciar sesion 
    header('Location: ../../vistas/index/indexNoLogged.php');
    exit();
}
 
?>