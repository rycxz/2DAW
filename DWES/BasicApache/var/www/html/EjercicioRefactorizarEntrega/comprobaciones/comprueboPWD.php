<?php
session_start();
include ("../conexionBBDD.php");
$contrasenaHasheada=password_hash( $_SESSION['ISpwd'],PASSWORD_DEFAULT);
//SQL para modificar el usuario cuyo nombre de usuario es el que viene en formulario
// para poner su pwd a $contrasenaHasheada
$sql = "UPDATE usuarios SET pwd='$contrasenaHasheada' WHERE username='$nombreUsuario'";
//$pdo->query($sql)->fetch();
$pdo->prepare($sql)->execute();
$_SESSION['logeado']=true;
header("Location: ../index.php");


?>