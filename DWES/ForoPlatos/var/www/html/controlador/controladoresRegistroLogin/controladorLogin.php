<?php
session_start();
if(isset($_POST['username'])){
// Obtén los datos del formulario
$usuarioForm = $_POST['username'];
$contraseniaForm = $_POST['password'];

// Incluye el archivo de usuario para poder usar la función
include "../../modelo/usuario.php";

// con las dos funciones saco los datos del usuario
$datosUsuario= selectUsuario(selectNombre($usuarioForm));
//comprubeo su contraseña 
if(password_verify( $contraseniaForm,$datosUsuario['contrasenia'])){
	$_SESSION['nombreUsuario']=$datosUsuario['nickname'];
	$_SESSION['loggeado']= true;
    header("Location: ../index.php");
}
else{
    $_SESSION['error'] = "Contraseña incorrecta. Intenta de nuevo.";
    header("Location: login.html");
    exit;
}
}
else{
    header("Location: login.html");
}
?>
