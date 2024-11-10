<<<<<<< HEAD
<?php
 
 setcookie("colorUsuario",$_POST['colores'],time()+60);
 
  
 
?>
   <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegir Color</title>
     
</head>
<body 	<?php  echo "style =   background-color:".$_COOKIE["colorUsuario"]."; "; ?>  >
 
 <h2>Formulario Color</h2>
    <label for="colores">Elige un color:</label>
	 <form action="/Ejercicios Sesiones-Cookies/ejercicio03.php" method="post">
    <select id="colores" name="colores">
        <option value="red" name="colores">Rojo</option>
        <option value="blue" name="colores" >Azul</option>
        <option value="green" name="colores">Verde</option>
        <option value="yellow" name="colores" >Amarillo</option>
		   
    </select>
	 <input type="submit" name="enviadar" >
	</form>
 
</body>
</html>





=======
<?php
 
 setcookie("colorUsuario",$_POST['colores'],time()+60);
 
  
 
?>
   <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegir Color</title>
     
</head>
<body 	<?php  echo "style =   background-color:".$_COOKIE["colorUsuario"]."; "; ?>  >
 
 <h2>Formulario Color</h2>
    <label for="colores">Elige un color:</label>
	 <form action="/Ejercicios Sesiones-Cookies/ejercicio03.php" method="post">
    <select id="colores" name="colores">
        <option value="red" name="colores">Rojo</option>
        <option value="blue" name="colores" >Azul</option>
        <option value="green" name="colores">Verde</option>
        <option value="yellow" name="colores" >Amarillo</option>
		   
    </select>
	 <input type="submit" name="enviadar" >
	</form>
 
</body>
</html>





>>>>>>> origin/master
 