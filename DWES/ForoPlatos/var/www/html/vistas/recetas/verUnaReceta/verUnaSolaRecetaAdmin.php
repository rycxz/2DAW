<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ForoPlatos</title>
	<link rel="stylesheet" href="../../../vistas/Headers/estilosHeaderFooter/estilosHeaderFooter.css">
    <link rel="icon" href=" ../../../../imagenes/imagenesWeb/icono.ico" type="image/x-icon">
</head>
<script>
    //aqui me hare una redireccion al controlador de elminar receta:
    function eliminarReceta(id) {
        if (confirm("¿Estás seguro de que deseas eliminar esta receta? ("+id+")")) {
            window.location.href = "../../../controlador/controladoresRecetas/controladorBorrarReceta/controladorBorradoReceta.php?idReceta="+id;
        }
    }
</script>
<body>
<header class="header">

 </header>
 <main class="contenedorVistaUnaReceta">


 <?php
 //saco la receta los detalles completos
 $receta = obtenerReceta($_GET['idReceta']);

//saco los ingredientes asociados a la receta
$ingredientesReceta = obtenerIngredientesReceta($_GET['idReceta']);

// recorro los ingredientes de la receta
if(!empty($ingredientesReceta)){
foreach ($ingredientesReceta as $ingrediente) {
    // Obtengo el nombre del ingrediente
    $nombreIngrediente = sacarNombreIngrediente($ingrediente['id_ingrediente']);
    $cantidadIngrediente = $ingrediente['cantidad'];
    $medidaIngrediente = $ingrediente['medida_unidad'];
    // Concateno el nombre del ingrediente al campo 'nombreIngredientes'

}}
$idUsuario = $receta['id_usuario'];
 $usuarioPublicador = selectUsuario($receta['id_usuario']);
$_SESSION['receta']=$receta;
$_SESSION['ingReceta']=$ingredientesReceta;
 ?>

<div class="receta">
    <h1 class="nombreReceta"><?php echo $receta['nombre']; ?></h1>
    <img src="../../../imagenes/imagenesReceta/<?php echo $receta['rutaImagen']; ?>" alt="Imagen de la receta" class="imagenReceta">
    <p class="fechaPublicacion">Fecha de publicación: <span><?php echo $receta['fechaPublicacion']; ?></span></p>
    <p class="dificultad">Dificultad: <span><?php echo $receta['dificultad']; ?></span></p>
    <p class="tipoReceta">Tipo de receta: <span><?php echo $receta['tipoReceta']; ?></span></p>
    <p class="valoracionMedia">Valoración media: <span><?php echo $receta['valoracionMedia']; ?></span></p>
    <p class="publicadaPor">Publicada por: <span>
    <a href="../../../controlador/controadoresUsuarios/controladorVerUsuario.php?idUsuario=<?= $idUsuario ?>" class="textuUser">


 <?php echo $usuarioPublicador['nickname']; ?></span></a></p>


    <h2>Ingredientes para una persona</h2>
    <p class="ingredientesRecetas">
    Ingredientes de la receta: <br>
        <?php
        if(!empty($ingredientesReceta)){
    foreach ($ingredientesReceta as $ingrediente) { ?>
          <span><?php  $nombreIngrediente = sacarNombreIngrediente($ingrediente['id_ingrediente']);
        echo  $nombreIngrediente;   ?>
        con esta cantidad: <?php echo $ingrediente['cantidad']; ?>
        <?php echo $ingrediente["medida_unidad"]; ?></span><br>

        <?php } }
    else{
        echo "Vaya no sabemos los ingredientes de esta receta! 🤔🤔🤔";
    }?>

<!--
       Ingredientes de la receta: <span><?php echo  $receta['nombreIngredientes']; ?>
        con esta cantidad: <?php echo $ingredientesReceta['cantidad']; ?>
        <?php echo $ingredientesReceta["medida_unidad"]; ?></span>-->
</p>

    <h2>Elaboración</h2>

    <p class="elaboracion"><?php echo $receta['elaboracion']; ?></p>



    <!-- Botones de acción -->
    <div class="botonesAccion">
        <button class="botonModificar" onclick="location.href='../../../controlador/controladoresRecetas/modificarRecetaControlador.php' ">Modificar</button>
        <button class="botonEliminar" onclick="eliminarReceta(<?php echo $_GET['idReceta']; ?>)">Eliminar</button>
    </div>
    <div class="contenedorComentarios">
   <?php
   // Función para los comentarios padre diferentes de null
   $comentarios = sacarComentariosReceta($receta['id']);
   $idUsuarioQueComenta = $datosUsuario['id'];
   $usuarioCoemnta = selectUsuario($idUsuarioQueComenta);
   if ($comentarios != false) {
       foreach ($comentarios as &$comentario) {
           $comentario['nombre_usuario'] = $usuarioCoemnta['nickname'];
       }
   }

   function renderizarComentarios($comentarios, $comentarioPadreId, $recetaId, $idUsuarioQueComenta, $nivel = 0) {
       if ($comentarios != false) {
           foreach ($comentarios as $comentario) {
               // Si el comentario de la respuesta referencia al padre
               if ($comentario['id_comentario_respuesta'] == $comentarioPadreId) {
                   ?>
                   <div class="comentario" style="margin-left: <?php echo $nivel * 20; ?>px;">
                       <div class="comentarioHeader">
                           <span class="comentarioUsuario">
                               <?php echo $comentario['nombre_usuario']; ?>
                           </span>
                           <span class="comentarioFecha">
                               <?php echo $comentario['fecha_creacion']; ?>
                           </span>
                       </div>
                       <div class="comentarioTexto">
                           <?php echo $comentario['texto']; ?>
                       </div>

                       <!-- Botón para eliminar comentario -->
                       <form class="formEliminar" action="../../../controlador/controladoresRecetas/controladorComentarios/controladorComentario.php" method="post" style="display:inline;">
                           <input type="hidden" name="id_comentario_eliminar" value="<?php echo $comentario['id']; ?>">
                           <input type="hidden" name="id_receta" value="<?php echo $recetaId; ?>">
                           <input type="hidden" name="redirectUrl" id="redirectUrl" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                           <button type="submit" class="btnEliminar" name="eliminarComentario">Eliminar</button>
                       </form>

                       <!-- Formulario de respuesta -->
                       <form class="formRespuesta" action="../../../controlador/controladoresRecetas/controladorComentarios/controladorComentario.php" method="post">
                           <textarea name="respuesta" rows="3" placeholder="Escribe tu respuesta aquí..." maxlength="250" required></textarea>
                           <input type="hidden" name="id_comentario_respuesta" value="<?php echo $comentario['id']; ?>">
                           <input type="hidden" name="id_receta" value="<?php echo $recetaId; ?>">
                           <input type="hidden" name="id_usuario" value="<?php echo $idUsuarioQueComenta; ?>">
                           <input type="hidden" name="redirectUrl" id="redirectUrl" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                           <button type="submit" class="btnResponder" name="cnPapa">Responder</button>
                       </form>

                       <!-- Renderizar las respuestas de este comentario -->
                       <div class="respuestas">
                           <?php renderizarComentarios($comentarios, $comentario['id'], $recetaId, $idUsuarioQueComenta, $nivel + 1); ?>
                       </div>
                   </div>
                   <?php
               }
           }
       } else {
           echo "No hay comentarios";
       }
   }

   // Función para los comentarios padre con el null
   renderizarComentarios($comentarios, null, $receta['id'], $idUsuarioQueComenta);
   ?>
</div>

<div class="campo">
    <span class="valorCampoComentario">
        <form action="../../../controlador/controladoresRecetas/controladorComentarios/controladorComentario.php" method="post">
            Valoración de la receta:
            <select required name="valoracion">
                <option value="" disabled selected>Selecciona una valoración</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

            <textarea required class="comentarioPrincipal" name="comentario" rows="5" placeholder="Escribe tu comentario aquí..." maxlength="250"></textarea>

            <input type="hidden" name="nombreUsuarioComenta" value="<?php echo $nombreUsuarioQueComenta; ?>">
            <input type="hidden" name="idUsuarioComenta" value="<?php echo $idUsuarioQueComenta; ?>">
            <input type="hidden" name="idRecetaComentada" value="<?php echo $receta["id"]; ?>">
            <input type="hidden" name="redirectUrl" id="redirectUrl" value="<?php echo ($_SERVER['REQUEST_URI']); ?>">

            <div class="contenedorBotonComentar">
                <input class="enviarComentario" type="submit" value="Comentar" name="Comentar">
            </div>
        </form>
    </span>
</div>



</div>

 </main>
 <footer class="footer">
    </footer>
</body>
<script src="../../vistas/Headers/HeaderAdmin.js"></script>
<style>
/* Estilo general */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f9;
    color: #333;
    text-align: left;
}

.listaComentarios {
    list-style: none;
    padding: 0;
}

/* Estilo para comentarios */
.contenedorComentarios {
    margin-top: 40px;
}

.comentario {
    margin-bottom: 20px;
    padding: 15px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    position: relative;
}

.comentarioHeader {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    margin-bottom: 10px;
}

.comentarioUsuario {
    font-weight: bold;
    color: #45a049;
}

.comentarioTexto {
    font-size: 16px;
    margin-bottom: 10px;
}

.formRespuesta textarea {
    width: calc(100% - 20px);
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: none;
}

textarea:focus {
    outline: none;
    border-color: #45a049;
}

button.btnResponder,
button.btnEliminar {
    margin-top: 10px;
    padding: 8px 15px;
    font-size: 14px;
    border-radius: 4px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button.btnResponder {
    background-color: #45a049;
    color: white;
}

button.btnResponder:hover {
    background-color: #388e3c;
}

button.btnEliminar {
    background-color: #f44336;
    color: white;
}

button.btnEliminar:hover {
    background-color: #d32f2f;
}

/* Campo de añadir comentarios */
.campo {
    margin-top: 30px;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
}

select,
textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    resize: none;
}

input.enviarComentario {
    background-color: #45a049;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input.enviarComentario:hover {
    background-color: #388e3c;
}

/* Estilo para la receta */
main.contenedorVistaUnaReceta {
    max-width: 900px;
    margin: 40px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    position: relative;
}

.textuUser {
    color: #45a049;
    text-decoration: none;
    font-style: italic;
    font-weight: 900;
}

/* Estilo del contenido principal */
.receta {
    text-align: center;
}

.nombreReceta {
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #444;
}

.imagenReceta {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 20px 0;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.fechaPublicacion,
.dificultad,
.tipoReceta,
.valoracionMedia,
.publicadaPor,
.ingredientesRecetas {
    font-size: 16px;
    margin: 10px 0;
}

.fechaPublicacion span,
.dificultad span,
.tipoReceta span,
.valoracionMedia span,
.publicadaPor span,
.ingredientesRecetas span {
    font-weight: bold;
    color: #555;
}

h2 {
    font-size: 20px;
    margin-top: 20px;
    color: #333;
}

.elaboracion {
    text-align: center;
    line-height: 1.6;
    margin-top: 10px;
    color: #555;
}

/* Botones de acción */
.botonesAccion {
    display: flex;
    justify-content: center;
    gap: 30px;
    margin-top: 30px;
}

.botonModificar {
    background-color: #4CAF50;
    color: white;
    padding: 12px 24px;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
}

.botonModificar:hover {
    background-color: #45a049;
    transform: scale(1.05);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
}

.botonEliminar {
    background-color: #f44336;
    color: white;
    padding: 12px 24px;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
}

.botonEliminar:hover {
    background-color: #d32f2f;
    transform: scale(1.05);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
}

</style>


</html>

