const header = document.querySelector("header");
const footer = document.querySelector("footer");
 

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

        </div>`;
 footer.innerHTML=`   <div class="socialMedia">
            <a href="#" class="linkSocial">Facebook</a>
            <a href="#" class="linkSocial">Twitter</a>
            <a href="#" class="linkSocial">Instagram</a>
        </div>
        <div class="notaFooter">
            <p>&copy; 2024 ForoPlatos | Colaboradores: Gracias por su apoyo en el desarrollo de esta comunidad.</p>
        </div>`;
 