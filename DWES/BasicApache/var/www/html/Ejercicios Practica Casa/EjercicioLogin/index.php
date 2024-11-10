<?php
    session_start();
    ?>
<!DOCTYPE html>
 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro/Login</title>
    
</head>
<body>
 
 
<div class="container">
    <h2>Iniciar Sesión</h2>
    
    <form action="comprobacionRegistro.php" method="post">
        <input type="text" id="username" placeholder="Nombre de Usuario"  name="nombreUsuario" required>
        <input type="password" id="password" placeholder="Contraseña"  name="contra" >
        <button type="submit" name="iS" >Iniciar Sesión</button>
    </form>

 
 

 
 
    
    <form action="comprobacionRegistro.php" method="post">
        <input type="text" id="new-username" placeholder="Nombre de Usuario"  name="nombreUsuario" required>
        <input type="email" id="email" placeholder="Correo Electrónico" name="email" required>
        <input type="password" id="new-password" placeholder="Contraseña"   name="contra" required>
        <button type="submit" name="loged" >Registrarse</button>
    </form>
 
</div>

</body>
</html>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }

    input[type="text"], input[type="password"], input[type="email"] {
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        padding: 10px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #218838;
    }
</style>
