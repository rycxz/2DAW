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
    <header class="header"></header>
    <main class="contenedor">
        <h1>Bienvenido <?php echo $datosUsuario['nickname']; ?></h1>

        <section class="list-section">
            <h2>Usuarios Registrados</h2>
            <div class="scroll-container">
                <?php
                // Verifica que $todosUsuarios no esté vacío
                if (!empty($todosUsuarios)) {
                    foreach ($todosUsuarios as $usuario) {


                        // Muestra cada usuario como un enlace con su ID
                        echo "<a href=' ../../../controlador\controadoresUsuarios\controladorVerUsuario.php?idUsuario=" . $usuario['id'] . "'>" . ($usuario['nickname']) . "</a>";
                    }
                } else {
                    echo "<p>No hay usuarios registrados.</p>";
                }
                ?>
            </div>
        </section>
        <section class="list-section">
            <h2>Recetas Disponibles</h2>
            <div class="scroll-container">
                <?php
                // Verifica que $todasRecetas no esté vacío
                if (!empty($todasRecetas)) {
                    foreach ($todasRecetas as $receta) {

                        // Muestra cada receta como un enlace con su ID
                        echo "<a href='../../../controlador\controladoresRecetas\controladorVerUnaReceta.php?idReceta=" . ($receta['id']) . "'>" . ($receta['nombre']) . "</a>";
                    }
                } else {
                    echo "<p>No hay recetas disponibles.</p>";
                }
                ?>
            </div>
        </section>
    </main>
    <footer class="footer"></footer>
</body>
<script src = "../../../vistas/Headers/HeaderAdmin.js"></script>
<style>
/* Estilos básicos */
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

.contenedor {
    flex: 1;
    padding: 20px;
    max-width: 800px;
    margin: 0 auto;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

h1 {
    margin-bottom: 20px;
    text-align: center;
    color: #4CAF50;
}

/* Section Styles */
.list-section {
    margin-top: 20px;
}

.list-section h2 {
    font-size: 1.5em;
    margin-bottom: 10px;
    color: #4CAF50;
}

.scroll-container {
    max-height: 250px; /* Controla la altura del contenedor */
    overflow-y: auto; /* Habilita el scroll vertical */
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.scroll-container a {
    display: block;
    padding: 5px 10px;
    margin-bottom: 5px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    text-decoration: none;
    color: #333;
    transition: background-color 0.3s, color 0.3s;
}

.scroll-container a:hover {
    background-color: #4CAF50;
    color: white;
}

/* Responsive Design */
@media (max-width: 768px) {
    .contenedor {
        padding: 10px;
    }

    .list-section h2 {
        font-size: 1.2em;
    }
}

</style>
</html>
