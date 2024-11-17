<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForoPlatos</title>
    <link rel="stylesheet" href="estilos/estilosRegistro.css">
    <link rel="icon" href=" ../../../../imagenes/imagenesWeb/icono.ico" type="image/x-icon">
</head>
<body>
    <div class="register-container">
        <h2>Registro de Usuario</h2>
        <form action="../../controlador/controladoresRegistroLogin/controladorRegistro.php" method="post" enctype="multipart/form-data">
            <input type="text" name="nickname" placeholder="Nickname" required>
            <input type="password" name="contrasenia" placeholder="Contraseña de minimo 6 caracteres" required>
            <input type="password" name="contraseniaRepetida" placeholder="Confirmar Contraseña" required>
            <input type="email" name="email" placeholder="Correo Electrónico" required>
            <input type="text" name="usuario_redes" placeholder="Usuario en Redes Sociales">
          

            <label for="foto">Foto de Perfil:</label>
            <input type="file" name="foto" id="foto">

            <label for="bannerFoto">Banner de Perfil:</label>
            <input type="file" name="bannerFoto" id="bannerFoto">

            <label for="experiencia">Nivel de Experiencia:</label>
            <select name="experiencia" id="experiencia">
                <option value="Amateur">Amateur</option>
                <option value="Promedio">Promedio</option>
                <option value="Avanzado">Avanzado</option>
                <option value="Un Crack">Un Crack</option>
            </select>
            <?php  
                if(isset($_GET['error']) && $_GET['error'] == "contraseñasNoCoincidentes"){
                    echo '
                    <div style="color: white; background-color: #ff4d4d; padding: 15px; border: 1px solid #ff0000; border-radius: 5px; font-family: Arial, sans-serif; text-align: center; margin: 10px 0;">
                    Error: Las contraseñas no coinciden.
                </div>';
                
                }
                if(isset($_GET['error']) && $_GET['error'] == "usuarioYaCogido"){
                    echo '
                    <div style="color: white; background-color: #ff4d4d; padding: 15px; border: 1px solid #ff0000; border-radius: 5px; font-family: Arial, sans-serif; text-align: center; margin: 10px 0;">
                    Error: El usuario ya esta cogido.
                </div>';
                
                }
            
                if(isset($_GET['error']) && $_GET['error'] == "contraseñaCorta"){
                    echo '
                    <div style="color: white; background-color: #ff4d4d; padding: 15px; border: 1px solid #ff0000; border-radius: 5px; font-family: Arial, sans-serif; text-align: center; margin: 10px 0;">
                    Error: La contraseña es demasido corta,
                </div>';
                
                }
            
                
                ?>
            <button type="submit">Registrarse</button>
        </form>
    </div>
</body>
</html>
