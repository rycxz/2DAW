const header = document.querySelector("header");
 

header.innerHTML=`  
        <div>
            <a href="#">
                <img src="../../../../imagenes/imagenesWeb/icono_transparente.png" class="logoHeader" alt="Logo">
            </a>
        </div>
        
        <div class="headerBotones">
            <div class="cajaBusquedad">
                <input type="text" placeholder="Buscar..." class="entradaBusquedad">
                <button class="BusquedadBoton">
                    <img src="../../../../imagenes/imagenesWeb/lupa.png" alt="Buscar" class="iconoMenu">
                </button>
            </div>
            <form action="../../controlador/controladorIndex/conroeladoresRedirecciones/redireccionesHeader.php" method="post">
    <input type="submit" value="Ver Usuarios" name="boton" class="boton" >
    <input type="submit" value="Ver Recetas" name="boton"  class="boton">
    <input type="submit" value="Cerrar Sesion" name="boton" class="boton">
</form>

        </div>
 

`
            ;
 