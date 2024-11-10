<?php
session_start();
if(!isset($_SESSION['numeroRandom'])){
$_SESSION['numeroRandom'] = rand(1,100);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivinar numero</title>
</head>
<body>
    <h1>¡Adivina el numero!</h1>
    <form action="ejercicio6.php" method="post">
    <input type="number"  name="numeroUsuario" placeholder="Ingresa tu número" min="1" max="100">
    <button type="submit">Adivina Adivinaza</button>
    </form>
    <p>
    <?php 
 
    if(!isset($_POST['numeroUsuario'])){
        
    if($_SESSION['numeroRandom'] > $_POST['numeroUsuario']){
       echo"muy bajo";
    }
    if($_SESSION['numeroRandom'] < $_POST['numeroUsuario']){
        echo"muy alto";
    }
    elseif($_SESSION['numeroRandom'] == $_POST['numeroUsuario']){
        echo"muy bien,correcto";
        session_unset();
    }
}
    
    ?></p>
</body>
</html>                       