<?php

if(isset($_POST['username'])){
// Obtén los datos del formulario
$usuarioForm = $_POST['username'];
$contraseniaNueva = $_POST['password'];

// Incluye el archivo de usuario para poder usar la función
include "../../modelo/usuario.php";

if(selectNombre($usuarioForm) == false ){
    header("Location: ../../vistas/vistasLoginRegistro/login.php?error=errorCredenciales");
    exit();
}
 $idUsuario = selectNombre($usuarioForm);

 // con las dos funciones saco los datos del usuario
$datosUsuario= selectUsuario(  $idUsuario['id']  );

$contraseniaHashead = password_hash($contraseniaNueva, PASSWORD_DEFAULT);

//comprubeo su contraseña
PWDolvido($idUsuario['id'] , $contraseniaHashead);
	$_SESSION['nombreUsuario']=$datosUsuario['nickname'];
	$_SESSION['loggeado']= true;
    //me guardo todo el array
    $_SESSION['usuarioCompleto'] = $datosUsuario;
    //asumo que todo a ido bien y me mando al controladore de los index
    header("Location: ../../../../vistas/vistasLoginRegistro/login.php?PWDCambiada = exito");
    exit();


}
else{
    header("Location: ../../vistas/index/indexNoLogged.php");
    exit();
}
?>
