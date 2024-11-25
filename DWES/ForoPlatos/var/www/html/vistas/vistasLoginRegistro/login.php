<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForoPlatos</title>
    <link rel="stylesheet" href="estilos/estilosLogin.css">
    <link rel="icon" href=" ../../../../imagenes/imagenesWeb/icono.ico" type="image/x-icon">
</head>
<body>
    <div class="login-container">
        <h2>Inicio de sesión</h2>
        <form action="../../controlador/controladoresRegistroLogin/controladorLogin.php" method="post">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
                <?php
                if(isset($_GET['error']) && $_GET['error'] == "errorCredenciales"){
                    echo '
                    <div style="color: white; background-color: #ff4d4d; padding: 15px; border: 1px solid #ff0000; border-radius: 5px; font-family: Arial, sans-serif; text-align: center; margin: 10px 0;">
                    Error: Las credenciales proporcionadas son incorrectas.
                </div>';

                }
                if(isset($_GET['error']) && $_GET['error'] == "ingresado"){
                    echo '
                    <div style="color: #004085; background-color: #cce5ff; padding: 15px; border: 1px solid #b8daff; border-radius: 5px; font-family: Arial, sans-serif; text-align: center; margin: 10px 0;">
    Atención: El usuario ya está registrado. Por favor, inicie sesión.
</div>

                     ';
                }
                if(isset($_GET['PWDCambiada']) && $_GET['pwdCambiada'] == "exito"){
                    echo '
                <script> alert("Atencion: Contraseña cambiada con exito, porfavor inicie sesion");</script>

                     ';
                }
                ?>

            <button type="submit">Iniciar Sesión</button>
        </form>
        <a href="registro.php" class="register-link">Registrarse</a>
        <a href="cambioPassword.php" class="register-link">¿Has olvidado tu contraseña?</a>
    </div>
</body>
</html>
