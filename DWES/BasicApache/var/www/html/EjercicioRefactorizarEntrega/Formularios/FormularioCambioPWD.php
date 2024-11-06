<?php
echo "Tienes la contraseña de inicio, introduce una nueva contraseña<br>";
?>
<form action="comprueboInicioSesion.php" method="post">
    <input type="hidden" id="username" name="username" value="<?php echo $nombreUsuario;?>">
    <input type="text" id="pwd" name="pwd" placeholder="Contrasena">
    <input type="submit" name="cambioPWD" value="Enviar">
</form>
<?php

?>