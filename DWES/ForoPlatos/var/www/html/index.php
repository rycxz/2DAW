<?php
session_start();
include ("../controlador/controladoresRegistroLogin/controladorLogin.php");
if (isset($_SESSION["loggeado"]) && $_SESSION["nickname"] == $datosUsuario['nickname']) {
//aqui lo que hago es si esta logeado y compruebo el nombre de usuario entonces le muestro el index de 
//un usuario registrado 
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForoPlatos</title>
</head>
<body>
    <header class="header">
        <div>
            <a href="../index.html">
                <img src="img/logo.png" class="logoHeader" alt="Logo">
            </a>
        </div>
        
        <div class="headerBotones">
         
            <div class="cajaBusquedad">
                <input type="text" placeholder="Buscar..." class="entradaBusquedad">
                <button class="BusquedadBoton">
                    <img src="img/iconosNav/search_24dp_000000_FILL0_wght400_GRAD0_opsz24.png" alt="Buscar" class="iconoMenu">
                </button>
            </div>
             <form action="controlador\controladorIndex\controladorRedireccionesIndex.php" method="post">
                <input type="button" value="Ver Usuarios" name="verUsuarios">
                <input type="button" value="Ver Recetas" name="verRecetas">
                <input type="hidden" value="Administracion " name="admin">
                <input type="button" value="Cerrar Sesion" name="cerrarSesion">
                 <input type="hidden" value="Inciar Sesion" name="inciarSesion">


             </form>
        </div>
           

</header>
    
</body>
</html>';

}
elseif (!isset($_SESSION["loggeado"]) && !isset($_SESSION["nikcname"])) {
//aqui iria el index de los usuarios que no esten registados 
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForoPlatos</title>
</head>
<body>
    <header class="header">
        <div>
            <a href="../index.html">
                <img src="img/logo.png" class="logoHeader" alt="Logo">
            </a>
        </div>
        
        <div class="headerBotones">
         
            <div class="cajaBusquedad">
                <input type="text" placeholder="Buscar..." class="entradaBusquedad">
                <button class="BusquedadBoton">
                    <img src="img/iconosNav/search_24dp_000000_FILL0_wght400_GRAD0_opsz24.png" alt="Buscar" class="iconoMenu">
                </button>
            </div>
             <form action="controlador\controladorIndex\controladorRedireccionesIndex.php" method="post">
                <input type="hidden" value="Ver Usuarios" name="verUsuarios">
                <input type="button" value="Ver Recetas" name="verRecetas">
                <input type="hidden" value="Administracion " name="admin">
                <input type="hidden" value="Cerrar Sesion" name="cerrarSesion">
                  <input type="button" value="Inciar Sesion" name="inciarSesion">


             </form>
        </div>
           

</header>
    
</body>
</html>';
}
else if (isset($_SESSION["loggeado"]) && $_SESSION["nickname"] == $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == true) {

//aqui mostraria el html de los admins 
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForoPlatos</title>
</head>
<body>
    <header class="header">
        <div>
            <a href="../index.html">
                <img src="img/logo.png" class="logoHeader" alt="Logo">
            </a>
        </div>
        
        <div class="headerBotones">
         
            <div class="cajaBusquedad">
                <input type="text" placeholder="Buscar..." class="entradaBusquedad">
                <button class="BusquedadBoton">
                    <img src="img/iconosNav/search_24dp_000000_FILL0_wght400_GRAD0_opsz24.png" alt="Buscar" class="iconoMenu">
                </button>
            </div>

            <!-- Aqui tengo una duda, si yo me creo el formulario  del nav esto estaria bien un form con todo el mismo nombre y luego saco el 
            valor y depues hago las redirecciones -->
            <form action="controlador\controladorIndex\controladorRedireccionesIndex.php" method="post">
                <input type="button" value="Ver Usuarios" name="boton">
                <input type="button" value="Ver Recetas" name="boton">
                <input type="button" value="Administracion " name="boton">
                <input type="button" value="Cerrar Sesion" name="boton">
                  <input type="button" value="Inciar Sesion" name="boton">


             </form>
        </div>
           

</header>
    
</body>
</html>';
//no se si es mejor hacer varios index o hacerlo con tipo hidden
}
else{
    //si no cumple ningua de mis condiciones lo mando a iniciar sesion 
    header('Location: vistas/login.html');
    exit();
}
?>