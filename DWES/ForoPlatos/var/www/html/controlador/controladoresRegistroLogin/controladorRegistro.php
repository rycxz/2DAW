<?php
session_start();
if(isset($_POST['nickname'])){
    $usuarioNick = $_POST['nickname'];
// Incluye el archivo de usuario para poder usar la función
include "../../modelo/usuario.php";
//hasheo la contraseña 
$contrasenaHaseada= password_hash($_POST['contrasenia'],PASSWORD_DEFAULT);
//establezco que no sea admin
$esAdmin= 0;
//obtengo la lista de usuarios 
$listaUsuarios= obtenerTodosUsuarios();
//utulizo la funcion de comprobar los nombres 
combrobarNombreUsuario($usuarioNick,$listaUsuarios);


// Guardo el nombre de la imagen
$nombreImagen = time() . "_" . $_FILES['foto']['name'];
// Muevo la imagen de los archivos temporales a mi carpeta
//../../imagenes/
move_uploaded_file($_FILES['foto']['tmp_name'], "../../imagenes/imagenUsuarioPerfil" . $nombreImagen);

// Hago lo mismo con el banner
$nombreImagenBanner = time() . "_" . $_FILES['bannerFoto']['name'];
move_uploaded_file($_FILES['bannerFoto']['tmp_name'], "../../imagenes/imagenUsuarioBanner" . $nombreImagenBanner);
 




insertarUsuario($usuarioNick   ,$contrasenaHaseada ,$_POST['email'] 
 ,$_POST['usuario_redes']  ,$esAdmin    
 ,$nombreImagen  ,$nombreImagenBanner  ,$_POST['experiencia'] );


 $_SESSION['loggeado'] = true;
            header("Location: ../../vistas/vistasLoginRegistro/login.html");
}
else{
    header("Location: ../../vistas/vistasLoginRegistro/login.html");
}


function combrobarNombreUsuario( $usuarioNick ,$usuarios){
    foreach($usuarios  as $nicks => $nombre){
        if(strcasecmp($nombre,$usuarioNick) == 0 ){
            echo "Ha habido un error con el nombre vuelve a intentarlo!";
            header("Location: ../../vistas/vistasLoginRegistro/registro.html");
            exit();
        }
    }
}


?>
