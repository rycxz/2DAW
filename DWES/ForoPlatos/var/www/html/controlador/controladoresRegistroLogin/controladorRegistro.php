<?php
session_start();
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




// Guardo el nombre de la imagen
$nombreImagen = time() . "_" . $_FILES['foto']['name'];
// Muevo la imagen de los archivos temporales a mi carpeta
//../../imagenes/
move_uploaded_file($_FILES['foto']['tmp_name'], "../../imagenes/imagenUsuarioPerfil/" . $nombreImagen);

// Hago lo mismo con el banner
$nombreImagenBanner = time() . "_" . $_FILES['bannerFoto']['name'];
move_uploaded_file($_FILES['bannerFoto']['tmp_name'], "../../imagenes/imagenUsuarioBanner/" . $nombreImagenBanner);





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
