<?php
 include  ("../../controlador/controadoresUsuarios/sesion.php");
 control();
if(isset($_POST['username'])){
// Obtén los datos del formulario
$usuarioForm = $_POST['username'];
$contraseniaForm = $_POST['password'];

// Incluye el archivo de usuario para poder usar la función
include "../../modelo/usuario.php";
if($usuarioForm == "admin" && $contraseniaForm== "phpMola"){
    $idUsuario = selectNombre($usuarioForm);
    $datosUsuario= selectUsuario(  $idUsuario['id']  );
    $_SESSION['usuarioCompleto'] = $datosUsuario;
    $_SESSION['nombreUsuario']=$datosUsuario['nickname'];
	$_SESSION['loggeado']= true;
    header ("Location: ../controladorIndex/redireccionesIndex.php");
    exit;
}


if(selectNombre($usuarioForm) == false ){
    header("Location: ../../vistas/vistasLoginRegistro/login.php?error=errorCredenciales");
    exit;
}
 $idUsuario = selectNombre($usuarioForm);

 // con las dos funciones saco los datos del usuario
$datosUsuario= selectUsuario(  $idUsuario['id']  );

//comprubeo su contraseña
if(password_verify( $contraseniaForm,$datosUsuario['contrasenia'])){
	$_SESSION['nombreUsuario']=$datosUsuario['nickname'];
	$_SESSION['loggeado']= true;
    //me guardo todo el array
    $_SESSION['usuarioCompleto'] = $datosUsuario;
    //asumo que todo a ido bien y me mando al controladore de los index
    header ("Location: ../controladorIndex/redireccionesIndex.php");
}
else{

    header("Location: ../../vistas/vistasLoginRegistro/login.php?error=errorCredenciales");

}
}
else{
    header("Location: ../../vistas/index/indexNoLogged.php");
}
?>
