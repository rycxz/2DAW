<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Registro</h2>
        <form action="formularioHTML1.php" method="POST">
            <label for="username">Nombre de usuario:</label>
            <input type="text" id="username" name="username" required>


            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required>


            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>


            <label for="confirm-password">Confirmar Contraseña:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>


            <input type="submit" value="Registrar">
        </form>
    </div>
</body>
</html>

