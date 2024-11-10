<?php
// Inicia la sesión para acceder a las variables de sesión
session_start();

//Comentario de Guillermo: Esto lo hizo un poco raro, como se podia consultar en Internet
 //cogió una biblioteca que no hemos visto ni teneis por qué conocer.
// Función para obtener el apellido del nombre de usuario
function obtenerApellido($usuario) {
    // Divide el nombre de usuario en palabras
    $palabras = preg_split('/(?=[A-Z])/', $usuario, -1, PREG_SPLIT_NO_EMPTY);
    // Toma la última palabra como el apellido
    $apellido = end($palabras);
    // Asegura que la primera letra del apellido esté en mayúscula
    $apellido = ucfirst($apellido);
    return $apellido;
}

// Verifica si el usuario ha iniciado sesión y si tiene el nombre de usuario almacenado en la sesión
if (!isset($_SESSION['usuario'])) {
    // Si no ha iniciado sesión, muestra un mensaje y un botón para redirigir a login.html
    echo '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página de Inicio</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f9f9f9;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .container {
                text-align: center;
                margin-bottom: 20px;
            }
            h1 {
                background-color: #e74c3c;
                color: #fff;
                padding: 10px 20px;
                border-radius: 10px;
            }
            button {
                background-color: #3498db;
                color: #fff;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                margin: 10px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
            button:hover {
                background-color: #2980b9;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- Mensaje de bienvenida -->
            <h1>Es necesario iniciar sesión para acceder a nuestra fantástica funcionalidad.</h1>

            <!-- Botón para ir a la página de inicio de sesión -->
            <a href="login.html"><button>Iniciar Sesión</button></a>
        </div>
    </body>
    </html>';
    // Detiene la ejecución del resto de la página
    exit();
}

$usuario = $_SESSION['usuario'];
// Obtiene el apellido del usuario utilizando la función obtenerApellido
$apellidoUsuario = obtenerApellido($usuario);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            margin-bottom: 20px;
        }
        h1 {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border-radius: 10px;
        }
        button {
            background-color: #2ecc71;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Mensaje de bienvenida -->
        <h1>Bienvenido, Sr./Sra. <?php echo $apellidoUsuario; ?></h1>

        <!-- Botón para ir a la página sobreNosotros.php -->
        <a href="sobreNosotros.php"><button>Sobre Nosotros</button></a>

        <!-- Botón para cerrar sesión -->
        <a href="cerrarSesion.php"><button>Cerrar Sesión</button></a>
    </div>
</body>
</html>



