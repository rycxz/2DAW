<<<<<<< HEAD
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de Contraseña</title>
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
        }

        input[type="password"] {
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
</head>
<body>

<div class="container">
    <h2>Cambiar Contraseña <?php echo $_POST['nombreUsuario']; ?></h2>
    <form action="comprobacionRegistro.php" method="POST">
        <input type="password" name="new_password" placeholder="Nueva Contraseña" required>
        <input type="password" name="confirm_password" placeholder="Confirmar Nueva Contraseña" required>
        <button type="submit">Cambiar Contraseña</button>
    </form>
</div>
        <?php
           include ("conexionBD.php");
        	$contrasenaHasheada=password_hash($_POST['pwd'],PASSWORD_DEFAULT);
          
            $sql = "UPDATE usuarios SET pwd='$contrasenaHasheada' WHERE username='$nombreUsuario'";
            //$pdo->query($sql)->fetch();
            $pdo->prepare($sql)->execute();
            $_SESSION['logeado']=true;
            header("Location: ventanaUsuario.php");
        ?>
</body>
</html>
=======
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de Contraseña</title>
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
        }

        input[type="password"] {
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
</head>
<body>

<div class="container">
    <h2>Cambiar Contraseña <?php echo $_POST['nombreUsuario']; ?></h2>
    <form action="comprobacionRegistro.php" method="POST">
        <input type="password" name="new_password" placeholder="Nueva Contraseña" required>
        <input type="password" name="confirm_password" placeholder="Confirmar Nueva Contraseña" required>
        <button type="submit">Cambiar Contraseña</button>
    </form>
</div>
        <?php
           include ("conexionBD.php");
        	$contrasenaHasheada=password_hash($_POST['pwd'],PASSWORD_DEFAULT);
          
            $sql = "UPDATE usuarios SET pwd='$contrasenaHasheada' WHERE username='$nombreUsuario'";
            //$pdo->query($sql)->fetch();
            $pdo->prepare($sql)->execute();
            $_SESSION['logeado']=true;
            header("Location: ventanaUsuario.php");
        ?>
</body>
</html>
>>>>>>> origin/master
