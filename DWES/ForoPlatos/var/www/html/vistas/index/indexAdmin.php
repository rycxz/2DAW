<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForoPlatos</title>
    <link rel="icon" href=" ../../../../imagenes/imagenesWeb/icono.ico" type="image/x-icon">

  
</head>
<body>

    <header class="header">
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
            <form action="controlador/controladorIndex/controladorRedireccionesIndex.php" method="post">
    <input type="submit" value="Ver Usuarios" name="boton" class="boton" >
    <input type="submit" value="Ver Recetas" name="boton"  class="boton">
    <input type="submit" value="Administracion" name="boton" class="boton">
    <input type="submit" value="Cerrar Sesion" name="boton" class="boton">
</form>

        </div>
    </header>

    <main class="contendorPrincipal">
        <div class="recetas">
        <?php
	$tamanioPagina=5;
	if(isset($_GET['numPagina'])){
		$numPagina=$_GET['numPagina'];
	}
	else{
		$numPagina=0;
	}
	$numRecetas=($pdo->query("SELECT COUNT(*) FROM receta")->fetch())[0];
	$maxPagina=floor($numRecetas/$tamanioPagina);

	$primeraReceta=$numPagina*$tamanioPagina;
	$recetas=$pdo->query("SELECT * FROM recetas LIMIT $primeraReceta,$tamanioPagina")->fetchAll(PDO::FETCH_ASSOC);
	foreach($recetas as $receta){
		$id=$receta['id'];
		echo "<a href='unaReceta.php?idReceta=$id'><img height=80px 
        src={$receta['rutaImagen']}></a><br>{$receta['titulo']}<br>";
	}
	if($numPagina!=0){
		echo "<br><a href='listadoRecetas.php?numPagina=".($numPagina-1)."'> Anterior </a>";
	}
	if($numPagina!=$maxPagina){
		echo"<br><a href='listadoRecetas.php?numPagina=".($numPagina+1)."'> Siguiente </a>";
	}
	?>
        </div>
    </main>

    <footer class="footer">
        <div class="socialMedia">
            <a href="#" class="linkSocial">Facebook</a>
            <a href="#" class="linkSocial">Twitter</a>
            <a href="#" class="linkSocial">Instagram</a>
        </div>
        <div class="notaFooter">
            <p>&copy; 2024 ForoPlatos | Colaboradores: Gracias por su apoyo en el desarrollo de esta comunidad.</p>
        </div>
    </footer>

</body>
<style>
     
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

/* Header */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    padding: 1em;
    color: #fff;
}

.header a {
    color: #fff;
    text-decoration: none;
}

.logoHeader {
    height: 50px;
}

.headerBotones {
    display: flex;
    align-items: center;
    gap: 1em;
}

.cajaBusquedad {
    display: flex;
    align-items: center;
    gap: 0.5em;
}

.entradaBusquedad {
    padding: 0.5em;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.BusquedadBoton {
    background-color: transparent;
    border: none;
    cursor: pointer;
}

.iconoMenu {
    height: 24px;
}

/* Main content */
.contendorPrincipal {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-grow: 1;
    padding: 2em;
    background-color: #f9f9f9;
}

.recetas {
    width: 80%;
    max-width: 800px;
    background-color: #fff;
    padding: 2em;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

/* Footer */
.footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 1em 0;
}

.socialMedia {
    margin-bottom: 0.5em;
}

.linkSocial {
    color: #fff;
    margin: 0 0.5em;
    text-decoration: none;
}

.notaFooter {
    font-size: 0.9em;
}
/* Transparent Buttons with Hover Effect */
form input[type="submit"] {
    background-color: transparent;
    border: none;
    color: #fff;
    padding: 0.5em 1em;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
}

form input[type="submit"]:hover {
    background-color: #fff;
    color: #000;
}

</style>
</html>
