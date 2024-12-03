<?php
/*
include ("../../modelo/conexionBD.php");
	$pdo=conexionBD();
	$receta=$pdo->query("SELECT * FROM receta WHERE id={$_GET['idReceta']}")->fetch(PDO::FETCH_ASSOC);
	foreach($receta as $campo => $valor){
		echo "$campo: $valor <br>";
	}
	*/


?>
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
 <main class="contenedorVistaUnaReceta">

<?php
//saco la receta los detalles completos
$receta = obtenerReceta($_GET['idReceta']);
//añado un campo mas al que operar
$receta['nombreIngredientes'] = "";
//saco los ingredientes asociados a la receta
$ingredientesReceta = obtenerIngredientesReceta($_GET['idReceta']);

// recorro los ingredientes de la receta
if(!empty($ingredientesReceta)){
foreach ($ingredientesReceta as $ingrediente) {
   // Obtengo el nombre del ingrediente
   $nombreIngrediente = sacarNombreIngrediente($ingrediente['id_ingrediente']);
   // Concateno el nombre del ingrediente al campo 'nombreIngredientes'
   if (!empty($receta['nombreIngredientes'])) {
       $receta['nombreIngredientes'] .= ", "; // Agrega una coma como separador
   }
   $receta['nombreIngredientes'] .= $nombreIngrediente;
}}
   $idUsuario = $receta['id_usuario'];
$usuarioPublicador = selectUsuario($receta['id_usuario']);

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
       <?php echo $usuarioPublicador['nickname']; ?>
   </a>
   </span></p>

   <h2>Ingredientes para una persona</h2>
   <p class="ingredientesRecetas">
   Ingredientes de la receta: <br>
       <?php
         if(!empty($ingredientesReceta)){
           foreach ($ingredientesReceta as $ingrediente) { ?>
             <span>
               <?php
               $nombreIngrediente = sacarNombreIngrediente($ingrediente['id_ingrediente']);
               echo  $nombreIngrediente;   ?>
               con esta cantidad: <?php echo $ingrediente['cantidad']; ?>
               <?php echo $ingrediente["medida_unidad"]; ?>
             </span><br>
       <?php } }
       else {
           echo "Vaya no sabemos los ingredientes de esta receta! 🤔🤔🤔";
       } ?>
   </p>

   <h2>Elaboración</h2>
   <p class="elaboracion"><?php echo $receta['elaboracion']; ?></p>

   <div class="contenedorComentarios">
   <?php
// Funcion para los comentarios padre diferentes de null

    // Asegúrate de que sacarComentariosReceta devuelva siempre un array
    $comentarios = sacarComentariosReceta($receta['id']);

    $idUsuarioQueComenta = $datosUsuario['id'];
    $usuarioCoemnta = selectUsuario($idUsuarioQueComenta);
    if($comentarios != false){
    foreach ($comentarios as &$comentario) {
        $comentario['nombre_usuario'] = $usuarioCoemnta['nickname'];
    }}


function renderizarComentarios($comentarios, $comentarioPadreId, $recetaId, $idUsuarioQueComenta, $nivel = 0) {
    if($comentarios != false){
        foreach ($comentarios as $comentario) {
            // Si el comentario de la respuesta referencia al padre
            if ($comentario['id_comentario_respuesta'] == $comentarioPadreId) {
                ?>

                <div class="comentario" style="margin-left: <?php /*le cambio el nivel */echo $nivel * 20; ?>px;">

                    <div class="comentarioHeader">
                        <span class="comentarioUsuario">
                            <?php
                            echo $comentario['nombre_usuario'];
                            ?>
                        </span>
                        <span class="comentarioFecha">
                            <?php echo $comentario['fecha_creacion']; ?>
                        </span>
                    </div>
                    <div class="comentarioTexto">
                        <?php echo $comentario['texto']; ?>
                    </div>

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
    }
    else{
        echo "No hay comentarios";
    }

}

// Funcion para los comentarios padre con el null
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
</div>
</main>

 <footer class="footer">
    </footer>
</body>
<script src="../../vistas/Headers/HeaderLogged.js"></script>
<style>

/* Estilo general */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f9;
    color: #333;
}

/* Estilo del contenedor principal de la receta */
main.contenedorVistaUnaReceta {
    max-width: 900px;
    margin: 40px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    position: relative;
}

/* Estilo de la receta */
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

/* Estilo para los comentarios */
.contenedorComentarios {
    margin-top: 30px;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.comentario {
    background-color: #fff;
    margin-bottom: 20px;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.comentarioHeader {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.comentarioUsuario {
    font-weight: bold;
    color: #45a049;
}

.comentarioFecha {
    font-size: 12px;
    color: #777;
}

.comentarioTexto {
    font-size: 14px;
    line-height: 1.6;
    color: #333;
    margin: 10px 0;
}

.formRespuesta {
    margin-top: 10px;
}

.formRespuesta textarea {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 10px;
    resize: none;
}

.formRespuesta button {
    background-color: #45a049;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.formRespuesta button:hover {
    background-color: #4CAF50;
}

/* Respuestas a comentarios */
.respuestas {
    margin-top: 20px;
    padding-left: 20px;
    border-left: 2px solid #ddd;
}

/* Estilo para la valoración de la receta */
.campo {
    margin-top: 30px;
    text-align: center;
}

.valorCampoComentario {
    font-size: 16px;
}

select,
textarea {
    width: 100%;
    max-width: 600px;
    margin-bottom: 10px;
}

.enviarComentario {
    background-color: #45a049;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.enviarComentario:hover {
    background-color: #4CAF50;
}

/* Estilos de los comentarios principales */
.comentarioPrincipal {
    margin-top: 10px;
    width: 100%;
    max-width: 600px;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 5px;
    resize: none;
}



.textuUser {
    text-decoration: none;
    font-style: italic;
    font-weight: 900;
    color: #45a049;
}





</style>
</style>

</html>
