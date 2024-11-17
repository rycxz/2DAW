<?php
 include_once ("../../controlador/controladorIndex/redireccionesIndexDirecto.php");
  include_once("../../modelo/conexionBD.php");
 
?>
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
 
    </header>

    <main class="contendorPrincipal">
        <div class="recetas">
        <?php
        
        $pdo = conexionBD();
	$tamanioPagina=5;
    //establezco el limite de rectas por pagina 
	if(isset($_GET['numPagina'])){
        //si la pagina tiene numero lo guardo en la varibale 
		$numPagina=$_GET['numPagina'];
	}
	else{
        //si no tienie lo establezco a 0 
		$numPagina=0;
	}
    //saco todas las recetas 
	$numRecetas=($pdo->query("SELECT COUNT(*) FROM receta")->fetch())[0];
    //estabzezco el maximo de recetas por pagina 
	$maxPagina=floor($numRecetas/$tamanioPagina);
    
	$primeraReceta=$numPagina*$tamanioPagina;
    //saco todas las recetas con sus atibutos 
	$recetas=$pdo->query("SELECT * FROM receta LIMIT $primeraReceta,$tamanioPagina")->fetchAll(PDO::FETCH_ASSOC);
	foreach($recetas as $receta){
        //reccorrdo las recetas 
		$id=$receta['id'];
        //me gusardo su id 
        //y hago la redirecion 
        
		echo "<a class='rectasContendor' href='../../vistas/recetas/verUnaSolaReceta.php?idReceta=$id'><img class='imagenReceta'
        src={$receta['rutaImagen']}></a><br><a class='nombreReeta'>{$receta['nombre']}</a><br>";
        // muestro la receta 
	}

	if($numPagina!=0){
        //hago los bootnes de siguiente y anterior 
		echo "<br><a class= 'botonAnterior' href='../../vistas/index/indexAdmin.php?numPagina=".($numPagina-1)."'> Anterior </a>";
	}
	if($numPagina!=$maxPagina){
         
        //el boton de siguiente
		echo "<br><a class = 'botonSiguiente' href='../../vistas/index/indexAdmin.php?numPagina=".($numPagina+1)."'> Siguiente </a>";
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
<script src="../../vistas/Headers/HeaderAdmin.js"></script>
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
/* Estilos generales para las recetas */
.rectasContendor {
    display: inline-block;
    margin: 15px;
    text-align: center;
    text-decoration: none;
    color: #333;
    width: 600px;
    transition: transform 0.3s, box-shadow 0.3s;
}

.rectasContendor:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.imagenReceta {
    width: 100%;
    height: 300px;
    border-radius: 8px;
    object-fit: cover;
    box-shadow: 0 2px 8px rgb(128, 0, 0);
    transition: transform 0.3s ease;
}

.imagenReceta:hover {
    transform: scale(1.05);
}

.nombreReeta {
    display: block;
    text-align: left;
    margin-left: 60px;
    margin-top: 10px;
    font-size: 22px;
    font-weight: bold;
    font-style: italic;
    color: #999;
    text-transform: capitalize;
}

/* Estilos para botones de paginación */
.botonAnterior,
.botonSiguiente {
    display: inline-block;
    margin: 20px 10px;
    padding: 10px 20px;
    text-decoration: none;
    color: white;
    background-color: rgb(128, 0, 0);
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.botonAnterior:hover,
.botonSiguiente:hover {
    background-color: #ff3333;
    color: #fff;
    transform: scale(1.1);
}

/* Para centrar los botones de paginación */
.paginacion {
    text-align: center;
    margin-top: 20px;
}
</style>
</html>
