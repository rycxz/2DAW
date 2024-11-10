<<<<<<< HEAD
<?php
//Arranco sesion para poder mirar las variables de sesion
session_start();
//Si la variable logeado tiene valor en la sesion, por fuerza, lo he tenido que hacer
// yo en otra parte del código. Por eso sé que se ha logeado y le dejo pasar.
if(isset($_SESSION['logeado'])){
	echo "Hola mundo desde Apache<br><br>";
	echo "Esto es solo para usuarios registrados";
}
//Si no tiene valor, a la calle
else{
	//Diferentes opciones:
	
	//Opcion también correcta
	//http_response_code(403);
	
	//Máxima usabilidad
	http_response_code(403);
	
	//La pagina que buscas no existe (maxima seguridad, minima usabilidad)
	//http_response_code(404);
}
?>
=======
<?php
//Arranco sesion para poder mirar las variables de sesion
session_start();
//Si la variable logeado tiene valor en la sesion, por fuerza, lo he tenido que hacer
// yo en otra parte del código. Por eso sé que se ha logeado y le dejo pasar.
if(isset($_SESSION['logeado'])){
	echo "Hola mundo desde Apache<br><br>";
	echo "Esto es solo para usuarios registrados";
}
//Si no tiene valor, a la calle
else{
	//Diferentes opciones:
	
	//Opcion también correcta
	//http_response_code(403);
	
	//Máxima usabilidad
	http_response_code(403);
	
	//La pagina que buscas no existe (maxima seguridad, minima usabilidad)
	//http_response_code(404);
}
?>
>>>>>>> origin/master
