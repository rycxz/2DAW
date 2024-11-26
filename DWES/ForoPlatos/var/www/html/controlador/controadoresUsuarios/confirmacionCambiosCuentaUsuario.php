<?php







// Verifica si se subió la foto de perfil
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    // Genera un nombre único para la imagen
    $nombreImagen = time() . "_" . basename($_FILES['foto']['name']);
    // Mueve la imagen de los archivos temporales a tu carpeta
    move_uploaded_file($_FILES['foto']['tmp_name'], "../../imagenes/imagenUsuarioPerfil/" . $nombreImagen);
}

// Verifica si se subió la foto del banner
if (isset($_FILES['bannerFoto']) && $_FILES['bannerFoto']['error'] === UPLOAD_ERR_OK) {
    // Genera un nombre único para la imagen
    $nombreImagenBanner = time() . "_" . basename($_FILES['bannerFoto']['name']);
    // Mueve la imagen de los archivos temporales a tu carpeta
    move_uploaded_file($_FILES['bannerFoto']['tmp_name'], "../../imagenes/imagenUsuarioBanner/" . $nombreImagenBanner);
}
?>
