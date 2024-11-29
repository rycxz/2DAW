<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForoPlatos</title>
    <link rel="stylesheet" href="../../../../vistas/Headers/estilosHeaderFooter/estilosHeaderFooter.css">
    <link rel="icon" href="../../../../imagenes/imagenesWeb/icono.ico" type="image/x-icon">
</head>
<body>
    <header class="header">
    </header>
    <div class="container">
        <h1>Modificar Receta</h1>

        <form action="../../../controlador/controladoresRecetas/modficiarReceta/confirmacionModificarTodaReceta.php" method="POST" enctype="multipart/form-data">
            <!-- ID de la receta (oculto) -->
             <?php
             $receta = $_SESSION['receta'];
             ?>
            <input type="hidden" name="id_receta" value="<?php  echo $_SESSION['receta']['id'];  ?>">

            <!-- Nombre de la receta -->
            <div class="form-group">
                <label for="nombre">Nombre de la receta:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo  $receta['nombre'];?>"   required>
            </div>

            <!-- Elaboración -->
            <div class="form-group">
                <label for="elaboracion">Elaboración:</label>
                <textarea id="elaboracion" name="elaboracion" rows="5" placeholder="<?php echo $receta['elaboracion'];?>"  required ></textarea>
            </div>

            <!-- Fecha de publicación y modificar la valoracion media no cero que ta tendia que poner -->


            <!-- Dificultad -->
            <div class="form-group">
                <label for="dificultad">Dificultad:</label>
                <p>Antes la receta era :  <?php $receta['dificultad'];?>.</p>
                <select id="dificultad" name="dificultad" required>
                    <option value="Facil">Fácil</option>
                    <option value="Media">Media</option>
                    <option value="Avanzada">Avanzada</option>
                    <option value="Dificil">Difícil</option>
                </select>
            </div>

            <!-- Tipo de receta -->
            <div class="form-group">
                <label for="tipoReceta">Tipo de receta:</label>
                <p>Antes la receta era :  <?php $receta['tipoReceta'];?>.</p>
                <select id="tipoReceta" name="tipoReceta" required>
                    <option value="Tradicional">Tradicional</option>
                    <option value="SlowFood">Slow Food</option>
                    <option value="Freidora sin aceite">Freidora sin aceite</option>
                </select>
            </div>

            <!-- Ruta de la imagen -->
            <div class="form-group">
                <label for="rutaImagen">Imagen de la receta:</label>
                <input type="file" id="rutaImagen" name="rutaImagen" accept="image/*">
            </div>

            <!-- Botón para guardar -->
            <div class="form-actions">
                <button type="submit" value="Guardar">Guardar Cambios</button>
            </div>
        </form>
    </div>
    <footer class="footer">

    </footer>
</body>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f9;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: #007BFF;
    outline: none;
}

textarea {
    resize: none;
}

.form-actions {
    text-align: center;
    margin-top: 20px;
}

button {
    padding: 10px 20px;
    font-size: 16px;
    color: white;
    background-color: #007BFF;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}

</style>
<script src="../../../vistas/Headers/HeaderAdmin.js"></script>
</html>
