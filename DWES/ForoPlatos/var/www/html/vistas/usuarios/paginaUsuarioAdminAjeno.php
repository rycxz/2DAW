<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ForoPlatos</title>
	<link rel="stylesheet" href="../../../vistas/Headers/estilosHeaderFooter/estilosHeaderFooter.css">
    <link rel="icon" href=" ../../../../imagenes/imagenesWeb/icono.ico" type="image/x-icon">
</head>
<body>
    <header class="header"></header>
    <div class="profile-container">
        <div class="banner">
            <img src="../../imagenes/imagenUsuarioBanner/<?php echo $datosUsuario['bannerFoto'];?>" alt="Banner del usuario" class="banner-img">
        </div>
        <br>
            <br>
            <br>
        <div class="profile-info">
            <img src="../../imagenes/imagenUsuarioPerfil/<?php echo $datosUsuario['foto'];?>" alt="Foto del usuario" class="profile-pic">
            <h1 class="nickname"><?php echo $datosUsuario['nickname'];?></h1>
            <p class="email"><?php echo $datosUsuario['email'];?></p>
            <p class="experiencia">Nivel de experiencia: <span><?php echo $datosUsuario['experiencia'];?></span></p>
            <p class="experiencia">Usuario en redes: <span><?php echo $datosUsuario['usuario_redes'];?></span></p>
            <p class="registro"><?php echo $datosUsuario['fechaRegistro'];?></p>
        </div>
        <form class="actions" action="../../controlador/controadoresUsuarios/controlAccionesUsuario.php?idUsuario=<?= $datosUsuario['id'] ?>" method="post">
            <input type="submit" name="botonAccion"  class="btn make-admin" value="Hacer Adminstrador">
            <input type="submit"  name="botonAccion"    class="btn edit-profile" value="Editar perfil">
            <input type="submit" name="botonAccion"    class="btn delete-account" value="Eliminar cuenta">

        </form>
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
    </div>
    <footer class="footer"></footer>
</body>
<script src="../../vistas/Headers/HeaderAdmin.js"></script>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
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

.profile-container {
    max-width: 800px;
    margin: 20px auto;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.banner {
    position: relative;
    height: 200px;
    background-color: #ddd;
}

.banner-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.profile-info {
    text-align: center;
    padding: 20px;
}

.profile-pic {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 3px solid #fff;
    margin-top: -60px;
    object-fit: cover;
}

.nickname {
    font-size: 24px;
    font-weight: bold;
    margin: 10px 0;
}

.email,
.experiencia,
.registro {
    font-size: 16px;
    margin: 5px 0;
}

.experiencia span {
    font-weight: bold;
    color: #007bff;
}

.actions {
    display: flex;
    justify-content: space-around;
    padding: 20px;
    background-color: #f1f1f1;
}

.btn {
    padding: 10px 20px;
    font-size: 14px;
    font-weight: bold;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.change-password {
    background-color: #007bff;
}

.change-password:hover {
    background-color: #0056b3;
}

.edit-profile {
    background-color: #28a745;
}

.edit-profile:hover {
    background-color: #1e7e34;
}
.make-admin:hover{
    background-color:  #007bff;
}

.delete-account {
    background-color: #dc3545;
}
.make-admin{
    background-color: #333;
}
.delete-account:hover {
    background-color: #a71d2a;
}

</style>
</html>
