<?php
$mensaje = "Bienvenido!";
setcookie("nombreCookie", "mostrado", time() + (86400 * 30), "/");

if(!isset($_COOKIE['nombreCookie'])){
    echo "Es la primera vez que te veo ".$mensaje;
    
}
else{
    echo "A ti ya te habia visto...".$mensaje;
}

?> 