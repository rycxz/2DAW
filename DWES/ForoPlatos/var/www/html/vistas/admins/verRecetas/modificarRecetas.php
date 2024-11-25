<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForoPlatos</title>
    <link rel="stylesheet" href="../../../vistas/Headers/estilosHeaderFooter/estilosHeaderFooter.css">
    <link rel="icon" href="../../../../imagenes/imagenesWeb/icono.ico" type="image/x-icon">
</head>
<body>

<header class="header">
    <!-- Header content -->
</header>

<div class="container">
    <div class="buttons">
        <!-- Botón para modificar toda la receta -->
        <form action="../../../controlador/controladoresRecetas/modficiarReceta/modificarTodaReceta.php" method="POST">
            <input type="submit" id="btn1" value="Modificar todo">
        </form>

        <br>
        <!-- Barra para añadir un ingrediente -->
        <div class="add-bar">
            <form action="../../../controlador/controladoresRecetas/modficiarReceta/controladorIngredientes.php">
                <input type="text" id="addInput" class="ingredientePoner" placeholder="Que le pongo??..." value="" name="ingredienteEntrada">
                <button type="button" class="quantity-btn minus">-</button>
                <input type="number" name="cantidad" value="1" min="1">
                <button type="button" class="quantity-btn plus">+</button>
                <input type="text" placeholder="¿Como Lo mido?" value="" name="unidadMedida">
                <input type="button" value="Añadir Ingrediente" name="AniadirIng">
            </form>
        </div>
    </div>

    <!-- Alertas -->
    <?php
    if (isset($_GET['contieneNumeros']) && $_GET['contieneNumeros'] == "true") {
        echo '<script>alert("No se puedo añadir el ingrediente!");</script>';
    } elseif (isset($_GET['exiteIngrediente']) && $_GET['exiteIngrediente'] == "true") {
        echo '<script>alert("No se puedo añadir el ingrediente ya que ya existe en la receta!");</script>';
    } else {
        echo '<script>alert("Añadido con exito!");</script>';
    }
    ?>

    <br>
    <!-- Barra de búsqueda -->
    <div class="search-bar">
        <input type="text" id="searchInput" placeholder="Buscar ingrediente...">
        <button id="searchBtn">🔍</button>
    </div>

    <!-- Lista de ingredientes con scroll -->
    <section class="ingredient-list" id="ingredientList">
        <form action="../../../controlador/controladoresRecetas/modficiarReceta/controladorIngredientes.php" method="post">
            <?php
            $ingredientes = $_SESSION['ingReceta']; // Datos de sesión
            if (!empty($ingredientes)) {
                foreach ($ingredientes as $ing) {
                    $nombreIngrediente = sacarNombreIngrediente($ing['id_ingrediente']);
            ?>
            <div class="ingredient-item">
                <span><?php echo $nombreIngrediente; ?></span>
                <div class="quantity-controls">
                    <input type="hidden" name="id_ingrediente" value="<?php echo $ing['id_ingrediente']; ?>">
                    <input type="button" class="quantity-btn minus" value="-">
                    <input type="number" name="cantidad" value="<?php echo $ing['cantidad']; ?>" min="1">
                    <input type="button" class="quantity-btn plus" value="+">
                    <p><?php echo $ing['medida_unidad']; ?></p>
                </div>
                <input type="button" class="delete-btn" name="eliminarIngrediente" value="Eliminar ingrediente" data-id="<?php echo $ing['id_ingrediente']; ?>">
            </div>
            <?php
                }
            }
            ?>
            <button type="submit" class="submit-btn" name="guardarCambios">Guardar Cambios</button>
        </form>
    </section>

    <script>
        // Lógica para eliminar ingredientes visualmente
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
                const ingredientItem = this.closest('.ingredient-item');
                ingredientItem.classList.add('ingredient-removed');
            });
        });

        // Lógica para sumar/restar cantidad
        document.querySelectorAll('.quantity-btn').forEach(button => {
            button.addEventListener('click', function () {
                const input = this.parentElement.querySelector('input[type="number"]');
                let value = parseInt(input.value);
                if (this.classList.contains('plus')) {
                    input.value = value + 1;
                } else if (this.classList.contains('minus') && value > 1) {
                    input.value = value - 1;
                }
            });
        });

        // Lógica de búsqueda
        const searchInput = document.getElementById('searchInput');
        const searchBtn = document.getElementById('searchBtn');

        searchBtn.addEventListener('click', () => {
            const query = searchInput.value.toLowerCase().trim();
            document.querySelectorAll('.ingredient-item').forEach(item => {
                const ingredientName = item.querySelector('span').textContent.toLowerCase();
                item.style.display = ingredientName.includes(query) ? 'flex' : 'none';
            });
        });
    </script>
</div>

<footer class="footer">
    <!-- Footer content -->
</footer>

<script src="../../vistas/Headers/HeaderAdmin.js"></script>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        height: 600px;
    }

    .buttons input {
        margin-right: 10px;
        padding: 10px 20px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .buttons input:hover {
        background-color: #0056b3;
    }

    .search-bar, .add-bar {
        display: flex;
        align-items: center;
    }

    .search-bar input, .add-bar input {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        outline: none;
    }

    .search-bar button {
        padding: 10px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .search-bar button:hover {
        background-color: #0056b3;
    }

    .ingredient-list {
        margin-top: 20px;
        max-height: 300px;
        overflow-y: auto;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
    }

    .ingredient-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: white;
        transition: background-color 0.3s, color 0.3s;
    }

    .ingredient-item.ingredient-removed {
        background-color: #f0f0f0;
        color: #888;
        border-color: #ccc;
        pointer-events: none;
    }

    .quantity-controls {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .quantity-btn {
        background-color: #ddd;
        border: none;
        padding: 5px 10px;
        border-radius: 3px;
        cursor: pointer;
    }

    .quantity-btn:hover {
        background-color: #ccc;
    }

    .delete-btn {
        background-color: #FF4D4D;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 5px 10px;
        cursor: pointer;
    }

    .delete-btn:hover {
        background-color: #d93636;
    }

    .submit-btn {
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .submit-btn:hover {
        background-color: #218838;
    }

    .ingredientePoner::placeholder {
        color: white;
    }
</style>
</html>
