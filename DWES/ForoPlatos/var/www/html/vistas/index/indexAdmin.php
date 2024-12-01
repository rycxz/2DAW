<?php
 include_once("../../modelo/conexionBD.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForoPlatos</title>
    <link rel="icon" href=" ../../../../imagenes/imagenesWeb/icono.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../../vistas/Headers/estilosHeaderFooter/estilosHeaderFooter.css">

</head>
<body>
    <?php
if(isset($_GET['modificarReceta']) && $_GET['modificarReceta'] == "modificadaConExito"){
                    echo '
                    <script>
    alert("Receta Modificada Con exito!");
</script>
                     ';

                }

                if(isset($_GET['operacionRealizada']) && $_GET['operacionRealizada'] == "true"){
                    echo '
                    <script>
    alert("Operacion Realizada con exito!");
</script>
                     ';

                }

                ?>
    <header class="header">

    </header>
     <!-- Sección con los botones y formularios -->
     <div class="acciones">


        <!-- Botón para añadir ingrediente -->
        <form action="../../controlador/controladorIndex/controladoresAccionesIndex.php" class="campoIngrediente" method="post">

            <label for="ingrediente">Añadir Ingrediente:</label>
            <input type="text" id="ingrediente" name="ingrediente" placeholder="Escribe un ingrediente">
            <input type="submit" name="ing" value="Añadir Ingrediente" class="botonIngrediente">
         </form>

        <!-- Botón para añadir una receta -->
       <form action="../../controlador/controladorIndex/controladoresAccionesIndex.php"  class="campoReceta" method="post">
                <input type="hidden" name="id" value="<?php echo $datosUsuario['id'] ?>">
                <input type="submit" name="agregarRecetas"value="Añadir Receta" class="botonReceta">

       </form>


    </div>

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
            echo "<br><a class= 'botonAnterior'class= 'botonAnterior' href='../../vistas/index/indexNoLogged.php?numPagina=".($numPagina-1)."'> Anterior </a>";
        }
        if($numPagina!=$maxPagina){

            //el boton de siguiente
            echo "<br><a class = 'botonSiguiente' href='../../vistas/index/indexNoLogged.php?numPagina=".($numPagina+1)."'> Siguiente </a>";
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
<script src="../../vistas/Headers/HeaderAdmin.js"></script>
<style>
    /* Contenedor de las acciones */
.acciones {
    text-align: center;
    padding: 20px;
    background-color: #f9f9f9;
    margin-top: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Estilos generales para los campos de formulario */
.campoIngrediente,
.campoReceta {
    margin-bottom: 20px;
}

/* Estilos para el campo de ingrediente */
.campoIngrediente label {
    display: block;
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 8px;
    color: #333;
}

.campoIngrediente input[type="text"] {
    width: 80%;
    padding: 8px;
    font-size: 14px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    background-color: #f9f9f9;
}

.campoIngrediente button.botonIngrediente {
    padding: 10px 20px;
    font-size: 16px;
    color: white;
    background-color: #007bff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.campoIngrediente button.botonIngrediente:hover {
    background-color: #0056b3;
}

/* Estilos para el campo de receta */
.campoReceta input[type="submit"].botonReceta {
    padding: 10px 20px;
    font-size: 16px;
    color: white;
    background-color: #28a745;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.campoReceta input[type="submit"].botonReceta:hover {
    background-color: #218838;
}


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
