const header = document.querySelector("header");
const footer = document.querySelector("footer");

header.innerHTML=`      <div  >
            <a href="../index.html">
        <img src="img/logo.png" class="logoHeader">
    </a>
        </div>
       
        <button class="BotonMenu" onclick="toggleMenu()">☰</button>
  

   
    <nav class="menuHamburguesa" id="menu">
        <button class="cerrarBoton" onclick="toggleMenu()">✖</button>
<a href="#"><img src="img/iconosNav/search_24dp_000000_FILL0_wght400_GRAD0_opsz24.png" alt="Búsqueda" class="iconoMenu"> Búsqueda</a>
<a href="#"><img src="img/iconosNav/person_24dp_000000_FILL0_wght400_GRAD0_opsz24.png" alt="Inicia Sesión" class="iconoMenu"> Inicia Sesión</a>
<a href="#"><img src="img/iconosNav/call_24dp_000000_FILL0_wght400_GRAD0_opsz24.png" alt="Contáctanos" class="iconoMenu"> Contáctanos</a>
<a href="#"><img src="img/iconosNav/favorite_24dp_000000_FILL0_wght400_GRAD0_opsz24.png" alt="Favoritos" class="iconoMenu"> Favoritos</a>
<a href="#"><img src="img/iconosNav/settings_24dp_000000_FILL0_wght400_GRAD0_opsz24.png" alt="Configuración" class="iconoMenu"> Configuración</a>
<a href="#"><img src="img/iconosNav/idioma.png" alt="Cambiar Idioma" class="iconoMenu"> Cambiar Idioma</a>

    </nav>
   
 

`
            ;
footer.innerHTML=`   <div class="zonaColaboradores">
        <div class="tituloColaboradores">Colaboradores</div>
        <div class="TextoColaboradores">En HusMotors, trabajamos con las marcas líderes del mercado: Suzuki, Kawasaki y Honda,
             ofreciendo a nuestros clientes una amplia gama de motocicletas de alta calidad. Suzuki nos proporciona modelos versátiles 
             y confiables, Kawasaki destaca por sus motos de alto rendimiento, y Honda ofrece opciones seguras y eficientes para todo tipo
              de conductor. Gracias a nuestra colaboración con estas marcas, garantizamos productos de excelencia, respaldados por la fiabilidad 
              y la innovación que nos caracterizan.</div>
    </div>
    <div class="redes">
        <a href="img/iconosRedes/instagram.png" target="_blank">
            <img src="img/iconosRedes/instagram.png" alt="Instagram" class="icono">
        </a>
        <a href="img/iconosRedes/twitter.png" target="_blank">
            <img src="img/iconosRedes/twitter.png" alt="X" class="icono">
        </a>
        <a href="img/iconosRedes/whatsapp.png" target="_blank">
            <img src="img/iconosRedes/whatsapp.png" alt="WhatssApp" class="icono">
        </a>
    </div>
    <div class="zonaAviso">
        <div class="tituloAviso">Aviso Legal</div>
        <div class="TextoAviso">
            La página web de HusMotors y todos sus contenidos, incluyendo textos, imágenes, logotipos, gráficos y otros elementos,
             están protegidos por derechos de propiedad intelectual e industrial y pertenecen a HusMotors o a terceros que han autorizado 
             su uso. Queda prohibida su reproducción, distribución o cualquier otro uso sin autorización expresa. HusMotors no se hace responsable
              del uso indebido de la información en esta web y se reserva el derecho de modificar sus contenidos sin previo aviso. Para consultas
               sobre este Aviso Legal, puedes contactarnos en support@husmotors.com © HusMotors, 2024. Todos los derechos reservados.
        </div>
    </div>
    <div class="logoFooter">
        <img src="img/logo.png" alt="HM Logo" class="imagenFooter">
    </div>`;