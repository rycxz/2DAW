<?php
// Inicia la sesión para acceder a las variables de sesión
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    // Si no ha iniciado sesión, muestra un mensaje y un botón para redirigir a login.html
    echo '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sobre Nosotros</title>
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

// Verifica la preferencia del usuario utilizando la cookie
$preferencia = isset($_COOKIE['preferencia']) ? $_COOKIE['preferencia'] : 'personal';

// Función para cambiar la preferencia del usuario
function cambiarPreferencia() {
    if ($_COOKIE['preferencia'] === 'personal') {
        setcookie('preferencia', 'profesional', time() + 3600, '/');
    } else {
        setcookie('preferencia', 'personal', time() + 3600, '/');
    }
    // Redirige para evitar el reenvío del formulario al recargar la página
    header('Location: sobreNosotros.php');
    exit();
}

// Maneja el cambio de preferencia si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cambiarPreferencia'])) {
    cambiarPreferencia();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros</title>
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
        <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h1>

        <!-- Muestra la información según la preferencia del usuario -->
        <?php
        if ($preferencia === 'personal') {
            echo '<h2>Información Personal del Equipo de Desarrollo</h2>';
            echo '<p>Somos un grupo de entusiastas apasionados por la tecnología. Nos encanta la programación, la cocina y pasar tiempo juntos.</p>';
            // Muestra la información personal del equipo de desarrollo
        } else {
            echo '<h2>Información Profesional del Equipo de Desarrollo</h2>';
            echo '<p>Somos un equipo altamente calificado con experiencia en una variedad de tecnologías y proyectos. Nos dedicamos a brindar soluciones innovadoras a nuestros clientes.</p>';
            // Muestra la información profesional del equipo de desarrollo
        }
        ?>

        <!-- Formulario para cambiar la preferencia del usuario -->
        <form method="post">
            <input type="submit" name="cambiarPreferencia" value="Cambiar Preferencia">
        </form>

        <br> <br>
        
        <form action="cerrarSesion.php" method="post" style="display: inline;">
            <input type="submit" name="cerrarSesion" value="Cerrar Sesión">
        </form>
    </div>
</body>
</html>


