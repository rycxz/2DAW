<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receta Eliminada</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php 
    include("../../../controlador/controladoresRecetas/borrarReceta.php");
    
     ?>
    <main class="contenedorEliminacion">
        <div class="mensajeExito">
            <h1>¡Receta eliminada con éxito!</h1>
            <p>La receta ha sido eliminada correctamente de la base de datos.</p>
            <button onclick="window.location.href='index.php';">Volver al Inicio</button>
        </div>
    </main>
</body>
<style>
    /* Estilo general */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

main.contenedorEliminacion {
    text-align: center;
    max-width: 600px;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.mensajeExito h1 {
    font-size: 24px;
    color: #4CAF50;
    margin-bottom: 10px;
}

.mensajeExito p {
    font-size: 18px;
    color: #555;
    margin-bottom: 20px;
}

button {
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    background-color: #4CAF50;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #45a049;
}

</style>
</html>
 