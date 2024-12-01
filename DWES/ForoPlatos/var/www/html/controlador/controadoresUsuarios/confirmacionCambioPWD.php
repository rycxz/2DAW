<?php
include  ("../../controlador/controadoresUsuarios/sesion.php");
control();
if(isset($_POST['actual'])){
// Obtén los datos del formulario
$id  = $_POST['id'];
$contraseniaNueva = $_POST['nueva'];
$contraseniaRepe = $_POST['repetida'];

// Incluye el archivo de usuario para poder usar la función
include "../../modelo/usuario.php";
$user =selectUsuario($id);

if($contraseniaNueva!== $contraseniaRepe){
    header("Location: " . $_SERVER['HTTP_REFERER'] . "?contraseniaRepe=true");
    exit;
}

$contraActuaHash = $_POST['actual'];
if(!password_verify($contraActuaHash,$user['contrasenia'])){
    header("Location: " . $_SERVER['HTTP_REFERER'] . "?contraseniaMal=true");
    exit;
}
$contraseniaHashead = password_hash($contraseniaNueva, PASSWORD_DEFAULT);
if(password_verify($contraseniaHashead,$user['contrasenia'])){
    header("Location: " . $_SERVER['HTTP_REFERER'] . "?mismaPWD=true");
    exit;
}


//comprubeo su contraseña
PWDolvido($user['id'] , $contraseniaHashead);

header("Location:../../../controlador/controladorIndex/redireccionesIndex.php");
    exit();


}
else{
    header("Location:../../../controlador/controladorIndex/redireccionesIndex.php");
    exit();
}
?>
