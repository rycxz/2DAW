
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ForoPlatos</title>
	<link rel="stylesheet" href="../../../vistas/Headers/estilosHeaderFooter/estilosHeaderFooter.css">
    <link rel="icon" href=" ../../../../imagenes/imagenesWeb/icono.ico" type="image/x-icon">
</head>
<body>
        <header class="header"></header>
    <h1>Editar Perfil</h1>
    <form action="../../../controlador/controadoresUsuarios/confirmacionCambiosCuentaUsuario.php" method="post" enctype="multipart/form-data">
        <label for="nickname">Nickname :</label>
        <input type="text" name="nickname" id="nickname" value="<?php echo $usuario['nickname']; ?>" required><br>
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $usuario['email'];  ?>" required><br>

        <label for="usuario_redes">Usuario Redes:</label>
        <input type="text" name="usuario_redes" id="usuario_redes" value="<?php echo $usuario['usuario_redes']; ?>"><br>

        <label for="experiencia">Experiencia:</label>
        <select name="experiencia" id="experiencia">
            <option value="Amateur" <?= $usuario['experiencia'] === 'Amateur' ? 'selected' : '' ?>>Amateur</option>
            <option value="Promedio" <?= $usuario['experiencia'] === 'Promedio' ? 'selected' : '' ?>>Promedio</option>
            <option value="Avanzado" <?= $usuario['experiencia'] === 'Avanzado' ? 'selected' : '' ?>>Avanzado</option>
            <option value="Un Crack" <?= $usuario['experiencia'] === 'Un Crack' ? 'selected' : '' ?>>Un Crack</option>
        </select><br>

        <label for="foto">Foto de perfil:</label>
        <input type="file" name="foto" id="foto"><br>

        <label for="bannerFoto">Foto del banner:</label>
        <input type="file" name="bannerFoto" id="bannerFoto"><br>


        <button type="submit">Actualizar</button>
    </form>
    <footer class="footer"></footer>
</body>
<?php if($datosUsuario['esAdmin'] == 1){
        echo'<script src="../../../vistas/Headers/HeaderAdmin.js"></script>';
}else{
echo '<script src="../../../vistas/Headers/HeaderLogged.js"></script>';


}?>


<style>/* General */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
    color: #333;
}

h1 {
    text-align: center;
    color: #444;
    margin-top: 20px;
}

/* Contenedor del formulario */
form {
    max-width: 500px;
    margin: 30px auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Etiquetas */
label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #555;
}

/* Campos de entrada */
input[type="text"],
input[type="email"],
input[type="password"],
select,
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 14px;
    background-color: #f9f9f9;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
select:focus {
    border-color: #007bff;
    background-color: #fff;
}

/* Botón */
button {
    display: block;
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

/* Para centrar las imágenes en el formulario */
input[type="file"] {
    padding: 5px;
    background-color: #e9ecef;
    border: 1px dashed #ccc;
    font-size: 14px;
    cursor: pointer;
}

/* Estilo para mensajes */
.message {
    text-align: center;
    padding: 10px;
    margin: 10px auto;
    max-width: 500px;
    border-radius: 4px;
}

.message.success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.message.error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}
</style>
</html>
