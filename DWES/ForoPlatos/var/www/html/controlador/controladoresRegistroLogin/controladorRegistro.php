<?php
session_start();
if(isset($_POST['username'])){
    $usuarioNick = $_POST['username'];
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
//GUARDO EL NOMBRE DE LA imagen 
$nombreImagen=(time()."_".$_FILES['foto']['name']);
//muevo la imagen de los archivos temporales a mi carperta 
move_uploaded_file($_FILES['foto']['tmp_name'],"../imagenes/".$nombreImagen);
//hago lo mismo con el banner 
$nombreImagenBanner=(time()."_".$_FILES['bannerFoto']['name']);
			move_uploaded_file($_FILES['bannerFoto']['tmp_name'],"../imagenes/".$nombreImagen);
//inserto usuario si va 
insertarUsuario($usuarioNick   ,$contrasenaHaseada ,$_POST['email'] 
 ,$_POST['usuario_redes']  ,$esAdmin ,$fechaRegistro  
 ,$nombreImagen  ,$nombreImagenBanner  ,$_POST['experiencia'] );
//comrpobacion de la inserccion 
$ultimoUsuarioRegistrado = obtenerUltimoUsuarioRegistrado();
//volvemos a obtener la lista de usuarios y la borramos 
$listaUsuarios="";
//aqui la obtenemos de vuelta 
$listaUsuarios= obtenerTodosUsuarios();
//hacemos la comprobacion si esta funciona nos llevara al index y nos pondra el valor de loggeado en true 
comprobarUltimoUsuario($usuarioNick,$listaUsuarios);


}
else{
    header("Location: login.html");
}


function combrobarNombreUsuario( $usuarioNick ,$usuarios){
    foreach($usuarios  as $nicks => $nombre){
        if(strcasecmp($nombre,$usuarioNick) !== 1 ){
            echo "Ha habido un error con el nombre vuelve a intentarlo!";
            header("Location: ../../vistas/registro.html");
            exit();
        }
    }
}
function comprobarUltimoUsuario( $usuarioNick ,$ultimoUsuarioRegistrado){
   
        if(strcasecmp($usuarioNick,$ultimoUsuarioRegistrado) !== 1 ){

            //mejor creacionde una vista de error en la creacio o asi , para su reuso 
            echo "Ha habido un error con la creacion de usuario  vuelve a intentarlo!";
            header("Location: ../../vistas/registro.html");
            exit();
        }
        else{
            $_SESSION['loggeado'] = true;
            header("../index.php");
        }

    
}

?>
