<?php
session_start();
if(isset($_POST['username'])){
// Obtén los datos del formulario
$usuarioForm = $_POST['username'];
$contraseniaForm = $_POST['password'];

// Incluye el archivo de usuario para poder usar la función
include "../../modelo/usuario.php";
 
 $idUsuario = selectNombre($usuarioForm);
 
// con las dos funciones saco los datos del usuario
$datosUsuario= selectUsuario(  $idUsuario['id']  );

//comprubeo su contraseña 
if(password_verify( $contraseniaForm,$datosUsuario['contrasenia'])){
	$_SESSION['nombreUsuario']=$datosUsuario['nickname'];
	$_SESSION['loggeado']= true;
    
    include ("../controladorIndex/redireccionesIndex.php");
}
else{
    $_SESSION['error'] = "Contraseña incorrecta. Intenta de nuevo.";
    header("Location: ../../vistas/vistasLoginRegistro/login.php");
    exit;
}
}
else{
    header("Location: ../../vistas/vistasLoginRegistro/login.php");
}
?>
