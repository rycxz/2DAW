<?php
session_start();
include  ("../../controlador/controadoresUsuarios/sesion.php");
control();
if(isset($_POST['nickname'])){
    $usuarioNick = $_POST['nickname'];
// Incluye el archivo de usuario para poder usar la función
include "../../modelo/usuario.php";

//saco todos los usuarios
 $listaUsuario = obtenerTodosUsuarios();


//utulizo la funcion de comprobar los nombres por si ya esta cojido


$usuarioModificar = selectUsuario($_POST['id']);
if(strcasecmp($usuarioNick , $usuarioModificar['nickname'])=== 0){

}else{

    combrobarNombreUsuario($usuarioNick,$listaUsuario);
}



// Verifica si se subió la foto de perfil

if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {

    // Generamos un nombre único para la imagen usando el tiempo actual
    $nombreImagen = time() . "_" . $_FILES['foto']['name'];

    // Mover la imagen al directorio correspondiente
    $rutaDestino = "../../imagenes/imagenUsuarioPerfil/" . $nombreImagen;
    move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestino);
  } else {
    // Si no hay imagen, asignamos la imagen por defecto
    $nombreImagen=$usuarioModificar['foto'];
  }



// Verifica si se subió la foto del banner
if (isset($_FILES['bannerFoto']) && $_FILES['bannerFoto']['error'] == 0) {
    // Generamos un nombre único para la imagen usando el tiempo actual
    $nombreImagenBanner = time() . "_" . $_FILES['bannerFoto']['name'];

    // Mover la imagen al directorio correspondiente
    $rutaDestino = "../../imagenes/imagenUsuarioBanner/" . $nombreImagenBanner;
    move_uploaded_file($_FILES['bannerFoto']['tmp_name'], $rutaDestino);
  } else {
    // Si no hay imagen, asignamos la imagen por defecto
    $nombreImagenBanner=$usuarioModificar['bannerFoto'];
  }

actualizarUsuario($usuarioModificar['id'],$usuarioNick  ,$_POST['email'],$_POST['usuario_redes']   ,$nombreImagen  ,$nombreImagenBanner  ,$_POST['experiencia'] );



 header("Location:../../../controlador/controladorIndex/redireccionesIndex.php");
 exit();
}
else{
    header("Location: ../../vistas/index/indexNoLogged.php");
}
function combrobarNombreUsuario( $usuarioNick ,$listaUsuario){
    foreach ($listaUsuario as $usuario) {
        if (strcasecmp($usuario['nickname'], $usuarioNick) == 0) {


            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}

?>
