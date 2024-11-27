<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForoPlatos</title>
    <link rel="icon" href=" ../../../../imagenes/imagenesWeb/icono.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../../vistas/Headers/estilosHeaderFooter/estilosHeaderFooter.css">
</head>
<body>
    <header class=" header">

    </header>

    <main class="form-container">
        <form action="../../controlador/controladoresRecetas/confirmacionAgregarReceta.php" method="POST" enctype="multipart/form-data" class="receta-form">
            <!-- Nombre de la receta -->
            <label for="nombre">Nombre de la receta:</label>
            <input type="text" id="nombre" class="bot"  name="nombre" required placeholder="Escribe el nombre de la receta">
            <input type="hidden" name="idUsuario" value="<?php echo $_GET['idUsuario'] ?>">
            <!-- Elaboración de la receta -->
            <label for="elaboracion">Elaboración:</label>
            <textarea id="elaboracion" name="elaboracion" rows="6" required placeholder="Escribe los pasos de la receta"></textarea>

            <!-- Dificultad de la receta -->
            <label for="dificultad">Dificultad:</label>
            <select id="dificultad" name="dificultad" required>
                <option value="Facil">Fácil</option>
                <option value="Media">Media</option>
                <option value="Avanzada">Avanzada</option>
                <option value="Dificil">Difícil</option>
            </select>

            <!-- Tipo de receta -->
            <label for="tipoReceta">Tipo de receta:</label>
            <select id="tipoReceta" name="tipoReceta" required>
                <option value="Tradicional">Tradicional</option>
                <option value="SlowFood">Slow Food</option>
                <option value="Freidora sin aceite">Freidora sin aceite</option>
            </select>

            <!-- Imagen de la receta -->
            <label for="imagen">Imagen de la receta:</label>
            <input type="file" id="imagen"class="bot" name="imagen" accept="image/*"  >


            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn-submit">Añadir Receta</button>
        </form>
    </main>

    <footer class="footer">

    </footer>
</body>
<script src = "../../vistas/Headers/HeaderAdmin.js"></script>
<style>
/* Reset básico */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}


/* Header */
header {
    background-color: #007bff;
    color: #fff;
    text-align: center;
    padding: 20px;
}

/* Main Form Container */
.form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-grow: 1;
    padding: 2em;
}

.receta-form {
    background-color: #fff;
    padding: 2em;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 600px;
}

/* Estilo de los elementos del formulario */
label {
    font-weight: bold;
    margin-bottom: 8px;
    display: block;
}

.bot, textarea, select {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: #f9f9f9;
    transition: border-color 0.3s ease;
}

input:focus, textarea:focus, select:focus {
    border-color: #007bff;
    background-color: #fff;
}

/* Botón de enviar */
.btn-submit {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-submit:hover {
    background-color: #0056b3;
}

/* Footer */
footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px;
}

</style>
</html>
