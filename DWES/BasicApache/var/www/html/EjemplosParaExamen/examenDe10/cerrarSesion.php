<?php
// Inicia la sesión para acceder a las variables de sesión
session_start();

// Destruye todas las variables de sesión
session_unset();
session_destroy();

// Redirige al usuario al formulario de inicio de sesión
header('Location: login.html');
exit();
?>
