<?php
setcookie('color','blanco',time()+800);
if(isset($_POST['cambio'])){
        if($_COOKIE['color']=='blanco'){
            setcookie('color','negro',time()+800);
            ?><style> body{background-color: black;}</style><?php
        }
        elseif($_COOKIE['color']=='negro'){
            ?><style> body{background-color: white;}</style><?php
        }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Ejercicio-02.php" method="post"> <button type="submit" name="cambio" value="cambiar color">Cambia Color</button></form>
   
    
</body>
</html>

