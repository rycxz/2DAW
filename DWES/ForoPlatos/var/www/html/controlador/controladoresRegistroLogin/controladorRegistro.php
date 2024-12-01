<?php
 include  ("../../controlador/controadoresUsuarios/sesion.php");
 control();
if(isset($_POST['nickname'])){
    $usuarioNick = $_POST['nickname'];
// Incluye el archivo de usuario para poder usar la función
include "../../modelo/usuario.php";
//hasheo la contraseña

 $listaUsuario = obtenerTodosUsuarios();

//utulizo la funcion de comprobar los nombres
combrobarNombreUsuario($usuarioNick,$listaUsuario);
if(strlen($_POST['contrasenia'])<6){
    header("Location: ../../vistas/vistasLoginRegistro/registro.php?error=contraseñaCorta");
    exit;
}

if($_POST['contrasenia'] !== $_POST['contraseniaRepetida']){
    header("Location: ../../vistas/vistasLoginRegistro/registro.php?error=contraseñasNoCoincidentes");
    exit;
}

$contrasenaHaseada= password_hash($_POST['contrasenia'],PASSWORD_DEFAULT);
//establezco que no sea admin
$esAdmin= 0;

// Inicializa los nombres de las imágenes con valores predeterminados
$nombreImagen = "a.jpg";
$nombreImagenBanner = "a.png";

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



insertarUsuario($usuarioNick   ,$contrasenaHaseada ,$_POST['email']
 ,$_POST['usuario_redes']  ,$esAdmin
 ,$nombreImagen  ,$nombreImagenBanner  ,$_POST['experiencia'] );


 $_SESSION['loggeado'] = true;
 header("Location: ../../vistas/vistasLoginRegistro/login.php?error=ingresado");
}
else{
    header("Location: ../../vistas/index/indexNoLogged.php");
}
function combrobarNombreUsuario( $usuarioNick ,$listaUsuario){
    foreach ($listaUsuario as $usuario) {
        if (strcasecmp($usuario['nickname'], $usuarioNick) == 0) {

            header("Location: ../../vistas/vistasLoginRegistro/registro.php?error=usuarioYaCogido");
            exit();
        }
    }
}
?>
