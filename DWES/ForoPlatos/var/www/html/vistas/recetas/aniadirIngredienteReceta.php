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
        <?php
        if(isset($_GET['ingredienteDuplicado']) && $_GET['ingredienteDuplicado'] == true ){
            echo '    <script>alert("ingrediente duplicado!")</script>';
        }

        $recetaId =($_GET['receta']);


        ?>
    <main class="form-container">



    <!-- Formulario para añadir ingredientes -->
    <section class="add-ingredients">
        <h2>Añadir Ingredientes</h2>

        <form action="../../../controlador/controladoresRecetas/controladorIngredientesRecetaNueva.php?receta=<?php echo $recetaId; ?>"
      class="campoIngrediente" method="post">
            <label for="ingrediente">Seleccionar Ingrediente:</label>
            <select name="ingrediente" id="ingrediente" required>
                <?php
                $nombreIngrediente;

                $ingredientesReceta =obtenerTodosLosIngredientes();
                // Aquí suponemos que $ingredientes contiene los ingredientes desde la base de datos
                foreach ($ingredientesReceta as $ingrediente) {
                    $nombreIngrediente = sacarNombreIngrediente($ingrediente['id']);
                    echo "<option id='ingrediente' value='{$ingrediente['id']}'>{$nombreIngrediente}</option>";
                }
                ?>
            </select>

            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" min="1" required>

            <label for="medida_unidad">Unidad de medida:</label>
            <input type="text" name="medida_unidad" id="medida_unidad" placeholder="Ej: gramos, tazas, etc." required>


            <button type="submit" name="receta">Añadir Ingrediente</button>
        </form>  </section>
        <form action="../../../controlador/controladoresRecetas/controladorIngredientesRecetaNueva.php?receta=<?php echo $recetaId; ?>"
      class="campoIngrediente" method="post">

<label for="ingrediente">Añadir Ingrediente:</label>
<input type="text" id="ingrediente" name="ingrediente" placeholder="Escribe un ingrediente">
<input type="submit" name="ing" value="Añadir Ingrediente" class="botonIngrediente">
</form>

<form action="../../../controlador/controladoresRecetas/controladorIngredientesRecetaNueva.php" class="campoIngrediente" method="post">


<input type="submit" name="fin" value="Finalizar" class="botonIngrediente">
</form>

</main>


    <footer class="footer">

    </footer>
</body>
<script src = "../../vistas/Headers/HeaderAdmin.js"></script>
<style>
/* estilosForoPlatos.css */

/* Global Styles */
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
    background-color: #f4f4f4;
    color: #333;
}

header {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    text-align: center;
    font-size: 1.5em;
    font-weight: bold;
}

footer {
    background-color: #4CAF50;
    color: white;
    text-align: center;
    padding: 10px 20px;
    margin-top: auto;
}

main {
    padding: 20px;
    max-width: 800px;
    margin: 0 auto;
}

/* Form Container */
.form-container {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

/* Add Ingredients Section */
.add-ingredients {
    margin-top: 20px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    background-color: #f9f9f9;
}

.add-ingredients h2 {
    margin-bottom: 10px;
    font-size: 1.5em;
    color: #4CAF50;
}

.add-ingredients form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.add-ingredients label {
    font-weight: bold;
}

.add-ingredients input,
.add-ingredients select,
.add-ingredients button {
    padding: 10px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: border-color 0.3s, background-color 0.3s;
}

.add-ingredients input:focus,
.add-ingredients select:focus {
    border-color: #4CAF50;
    outline: none;
}

.add-ingredients button {
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
    border: none;
}

.add-ingredients button:hover {
    background-color: #45a049;
}

/* Buttons Styles */
.botonIngrediente {
    background-color: #4CAF50;
    color: white;
    font-size: 1em;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.botonIngrediente:hover {
    background-color: #45a049;
}

/* Responsive Design */
@media (max-width: 768px) {
    body {
        padding: 10px;
    }

    .add-ingredients form {
        gap: 10px;
    }

    .add-ingredients h2 {
        font-size: 1.2em;
    }
}

</style>
</html>
