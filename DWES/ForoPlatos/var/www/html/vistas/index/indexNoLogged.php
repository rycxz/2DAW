
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForoPlatos</title>
    <link rel="stylesheet" href="../../../vistas/Headers/estilosHeaderFooter/estilosHeaderFooter.css">
    <link rel="icon" href=" ../../../../imagenes/imagenesWeb/icono.ico" type="image/x-icon">
</head>
<body>
<header class="header">


    </header>

    <main class="contendorPrincipal">
        <div class="recetas">
        <?php
        include_once("../../modelo/conexionBD.php");


    if(isset($recetas)){
        foreach($recetas as $receta){
            //reccorrdo las recetas
            $id=$receta['id'];
            //me gusardo su id
            //y hago la redirecion

            echo "<a class='rectasContendor' href='../../controlador/controladoresRecetas/controladorVerUnaReceta.php?idReceta=$id'>";?>

              <img src="../../../imagenes/imagenesReceta/<?php echo $receta['rutaImagen'];?>" alt="Imagen de la receta" class="imagenReceta">
            <?php
            echo "<br>
            <a class='nombreReeta'>{$receta['nombre']}</a>
            <br>";


        }
        if($numPagina!=0){
            //hago los bootnes de siguiente y anterior
            echo "<br><a class= 'botonAnterior'class= 'botonAnterior'  href='../../controlador/controladorIndex/redireccionesIndex.php?numPagina=".($numPagina-1)."'> Anterior </a>";
        }
        if($numPagina!=$maxPagina){

            //el boton de siguiente
            echo "<br><a class = 'botonSiguiente'  href='../../controlador/controladorIndex/redireccionesIndex.php?numPagina=".($numPagina+1)."'> Siguiente </a>";
        }
    }
    else{
        echo "<div class='rectasContendor' > Vaya no tengo ninguna Receta! </div>";
 }
        ?>




        </div>
    </main>
<footer class="footer">

    </footer>
</body>
<script src="../../vistas/Headers/HeaderNoLogged.js"></script>
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
