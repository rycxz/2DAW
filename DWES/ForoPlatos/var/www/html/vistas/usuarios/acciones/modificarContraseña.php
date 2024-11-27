
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
        <main class="contendor">
        <div class="form-container">
            <?php
            if(isset($_GET['contraseniaMal'] )&& $_GET['contraseniaMal']==true){
                echo ' <script> alert("la contraseña no es correcta")</script>';
            }
            if(isset($_GET['contraseniaRepe'] )&& $_GET['contraseniaRepe']==true){
                echo ' <script> alert("la contraseñas no coinciden")</script>';
            }
            if(isset($_GET['mismaPWD'] )&& $_GET['mismaPWD']==true){
                echo ' <script> alert("la contraseñas no debe ser  igual a la anterior")</script>';
            }
            ?>

        <h1>Cambiar Contraseña</h1>
        <form action="../../../controlador/controadoresUsuarios/confirmacionCambioPWD.php" method="POST" onsubmit="return validarFormulario()">
            <label for="current-password">Contraseña Actual</label>
            <input type="password" id="current-password" name="actual" required>
            <input type="hidden" name="id" value="<?php echo $datosUsuario["id"]; ?>">
            <label for="new-password">Nueva Contraseña</label>
            <input type="password" id="new-password" name="nueva" required>

            <label for="confirm-password">Confirmar Nueva Contraseña</label>
            <input type="password" id="confirm-password" name="repetida" required>

            <p id="error-message" class="error"></p>

            <button type="submit">Actualizar Contraseña</button>
        </form>
    </div>
</main>


    </form>
    <footer class="footer"></footer>
</body>
<?php if($datosUsuario['esAdmin'] == 1){
        echo'<script src="../../../vistas/Headers/HeaderAdmin.js"></script>';
}else{
echo '<script src="../../../vistas/Headers/HeaderLogged.js"></script>';


}?>

<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
    color: #333;
}
        .contendor {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 1.8em;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            background-color: #f9f9f9;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: #d9534f;
            font-size: 0.9em;
            margin-bottom: 10px;
        }
    </style>

</html>
