<<<<<<< HEAD
<?php
session_start();
 
$usuarios = array(
    array("usuario" => "user1", "contraseña" => "password1"),
    array("usuario" => "user2", "contraseña" => "password2"),
    array("usuario" => "user3", "contraseña" => "password3"),
    array("usuario" => "user4", "contraseña" => "password4"),
);


 

include "conexion.php";
$_SESSION['nombre'] = $_POST['nombre'];
$_SESSION['nombre'] = $_POST['nombre'];
if(isset($_POST['incioSesion'])){
   
}



=======
<?php
session_start();
 
$usuarios = array(
    array("usuario" => "user1", "contraseña" => "password1"),
    array("usuario" => "user2", "contraseña" => "password2"),
    array("usuario" => "user3", "contraseña" => "password3"),
    array("usuario" => "user4", "contraseña" => "password4"),
);


 

include "conexion.php";
$_SESSION['nombre'] = $_POST['nombre'];
$_SESSION['nombre'] = $_POST['nombre'];
if(isset($_POST['incioSesion'])){
   
}



>>>>>>> origin/master
?>