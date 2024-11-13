<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Vista/styles.css">
    <title>Perfil de Usuario</title>
</head>
<body>
    <div class="container">
        <h1>Perfil de Usuario</h1>
        <div class="profile-card">
            <h2>Nombre de Usuario: <span id="username"><?php echo $usuario['username']; ?></span></h2>
            <p>Fecha de Registro: <span id="registration-date"><?php echo $usuario['registrationDate']; ?></?></span></p>
            <p>Correo Electrónico: <span id="email"><?php echo $usuario['mail']; ?></?></span></p>
        </div>
    </div>
</body>
</html>
