<?php
include ("../../controlador/controladorCierreSesion/controladorCierreSesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesión Cerrada</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="message-box">
            <div class="icon">
                ✅
            </div>
            <h1>Sesión cerrada con éxito</h1>
            <a href="../../controlador\controladorIndex\redireccionesIndex.php" class="button">Volver</a>
        </div>
    </div>
</body>
<style>
    /* styles.css */
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    text-align: center;
}

.message-box {
    background: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    padding: 20px 40px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.icon {
    font-size: 50px;
    color: #4caf50;
    margin-bottom: 20px;
}

h1 {
    font-size: 24px;
    color: #333333;
    margin: 0 0 20px;
}

.button {
    display: inline-block;
    text-decoration: none;
    color: white;
    background-color: #4caf50;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #45a049;
}

</style>
</html>
