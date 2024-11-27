<?php
session_start();
if(isset($_POST['nickname'])){
    $usuarioNick = $_POST['nickname'];
// Incluye el archivo de usuario para poder usar la función
include "../../modelo/usuario.php";

//saco todos los usuarios
 $listaUsuario = obtenerTodosUsuarios();


//utulizo la funcion de comprobar los nombres por si ya esta cojido
combrobarNombreUsuario($usuarioNick,$listaUsuario);

$usuarioModificar = selectUsuario($_POST['id']);
if(strcasecmp($usuarioNick , $usuarioModificar['nickname'])){
    combrobarNombreUsuario($usuarioNick,$listaUsuario);
}

$nombreImagen=$usuarioModificar['foto'];
$nombreImagenBanner=$usuarioModificar['bannerFoto'];

// Verifica si se subió la foto de perfil
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    // Genera un nombre único para la imagen
    $nombreImagen = time() . "_" . basename($_FILES['foto']['name']);
    // Mueve la imagen de los archivos temporales a tu carpeta
    move_uploaded_file($_FILES['foto']['tmp_name'], "../../imagenes/imagenUsuarioPerfil/" . $nombreImagen);
}

// Verifica si se subió la foto del banner
if (isset($_FILES['bannerFoto']) && $_FILES['bannerFoto']['error'] === UPLOAD_ERR_OK) {
    // Genera un nombre único para la imagen
    $nombreImagenBanner = time() . "_" . basename($_FILES['bannerFoto']['name']);
    // Mueve la imagen de los archivos temporales a tu carpeta
    move_uploaded_file($_FILES['bannerFoto']['tmp_name'], "../../imagenes/imagenUsuarioBanner/" . $nombreImagenBanner);
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
