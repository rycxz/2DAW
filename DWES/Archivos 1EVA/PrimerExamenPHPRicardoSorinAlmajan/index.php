<?php
 
session_start();
 
if (!isset($_SESSION['usuario'])) {
    // Si no ha iniciado sesión, muestra un mensaje y un botón para redirigir a login.html
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 120)) {
       
        session_unset();    
        session_destroy();   
    }
    $_SESSION['LAST_ACTIVITY'] = time(); 
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
 
       
        
        

        
 
    $contador = 0;
    if(isset($_POST['enviarDosNumeros'])){ 
        $contador = $contador+1;
    
                //aqui parseo el valor a un int  y lo guardo en una varibale de sesion
                if(isset($_POST['numeroUno']) && isset( $_POST['numeroDos'])){
                    $numero= intval($_POST['numeroUno']);
                    $_SESSION['numeroUno']=$numero;
                    //aqui parseo el valor a un int y lo guardo en una varibale de sesion
                    $numero1= intval($_POST['numeroDos']);
                    $_SESSION['numeroDos']=$numero1;
            
                    //me guardo la varibale resultado para poder meterla a operacion 
                    $resultado = $numero+$numero1;
                    //meto todas la componentes en un string para poder mostralo y guardarlo 
                    $operaciones = $_SESSION['numeroUno']."+".$_SESSION['numeroDos']."=".$resultado;
                    $_SESSION['operacionActual'] = $operaciones;
                    $operacionesHistorial = array("");
                    //hago que operaciones sea una varibale de sesion
                   
            
                    $_SESSION['operacion']=  $operacionesHistorial ;
                   
                    array_push(  $_SESSION['operacion'], $operaciones);
                    
                    foreach($_SESSION['operacion'] as $opera){
                        echo ($opera); }
                }
                        
                 
                }
 

    elseif(isset($_POST['enviarUnNumero'])){
        $obtenerResultado = explode("=" , $_SESSION['operacionActual']) ;
        //lo separo
     
        $numero4= intval($obtenerResultado[1] );
   
        
        //lo muestro 
        $numero5= intval($_POST['numeroTres']  );
        //obtengo el numero 3 y lo parseo a int 
        $_SESSION['numeroTres'] = $numero5;
        //lo guardo en un asesion 
            //lo sumo 
        $operacionUnNumero = $numero4+$numero5;
        echo($operacionUnNumero);
       //lo meto al array pero no lo suma lo concadena 
            
            array_push( $_SESSION['operacion'], $operacionUnNumero);
    }


elseif(isset($_POST['reseteo'])){
    $_SESSION['operacion'] = null;
}

 

 
 


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
        
    <form action="" method="post">
            
            <input type="submit" name="reseteo"  value="Resetear">
            </form>
    <!-- lo que quiero hacer con esto es hacer un boton que nos rediriga para borrar el historial que tenemos -->
    <a href="cerrarSesion.php"><button>Cerrar Sesión</button></a>
        <center>

   
            <form action="" method="post">
            <input type="text" name="numeroUno"  >
            <input type="text" name="numeroDos"  >
            <input type="submit" name="enviarDosNumeros"  >
            </form>
            <form action="" method="post">
            <input type="text" name="numeroTres"  >
            <input type="submit" name="enviarUnNumero"  >
            </form>

        </center>
    </div>
</body>
</html>



