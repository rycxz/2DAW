const header = document.querySelector("header");
const footer = document.querySelector("footer");


header.innerHTML=`

    <div>
                      <a href="/controlador/controladorIndex/redireccionesIndex.php">
                <img src="../../../../imagenes/imagenesWeb/icono_transparente.png" class="logoHeader" alt="Logo">
            </a>
        </div>

<form action="../../controlador/controladorIndex/redireccionesIndex.php"
 method="post" class="cajaBusquedad">

        <input
            type="text"
            name="consulta"
            placeholder="Buscar..."
            class="entradaBusquedad"
        >
        <input type="submit" class="BusquedadBoton">
        <img
            src="../../../../imagenes/imagenesWeb/lupa.png"
            alt="Buscar"
            class="iconoMenu"
        >



</form>

            <form action="../../controlador/controladorIndex/conroeladoresRedirecciones/redireccionesHeader.php" method="post">
    <input type="submit" value="Ver Usuario" name="boton" class="boton" >

    <input type="submit" value="Administracion" name="boton" class="boton">
    <input type="submit" value="Cerrar Sesion" name="boton" class="boton">
</form>

        </div>
`;
footer.innerHTML=`   <div class="socialMedia">
            <a href="#" class="linkSocial">Facebook</a>
            <a href="#" class="linkSocial">Twitter</a>
            <a href="#" class="linkSocial">Instagram</a>
        </div>
        <div class="notaFooter">
            <p>&copy; 2024 ForoPlatos | Colaboradores: Gracias por su apoyo en el desarrollo de esta comunidad.</p>
        </div>`;
