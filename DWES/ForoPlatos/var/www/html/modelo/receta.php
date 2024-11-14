<?php 
//aqui como puedo recibir el post? entero , me redirigo del 
//controador y le paso por parametro el post directamente, es la opcion 
//que mas sentido tiene para mi 
function aniadirReceta(){
    include "conexionBD.php";
	$sql="INSERT INTO recetas (nombre, elaboracion, id_usuario, fechaPublicacion, dificultad,tipoReceta,valoracionMedia) 
						VALUES (?, ?, ?, ?, ?, ?, ?)";
	$statement=$pdo->prepare($sql);
	//como deberia de hacer para poner el id??
	$statement->execute(
	array($_POST['titulo'],$_POST['procedimiento'],$_POST['dificultad'],$_POST['tiempo'],1)
	);
    //redirigo a una vista que ponga que el registro se a competado con exito y de esa vuelvo  a redirigir 
	header("Location: ejemploBD.php");
}

?>