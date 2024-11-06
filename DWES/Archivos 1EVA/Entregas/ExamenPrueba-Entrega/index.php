 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Alumnos</title>
     
</head>
<body>
<?php
$paswwHashed = password_hash("estoLoAprueboFijo",PASSWORD_DEFAULT);
if($_POST["usuario"]=="Ricardo Sorin Almajan"){
	if(password_verify( $_POST["password"],$paswwHashed )){
	$nombreCompletoUsuario = explode(" ", $_POST["usuario"]);
	
	$apellidoUsuario= $nombreCompletoUsuario[2];
	
	
	
 	
?>
	<h1> Bienveindo <?php echo $apellidoUsuario; ?> </h1>	
 
  <a href = "sobreNosotros.php"> 
   <input type="button" value="sobreNosotros" id="sobreNosotros" name="sobreNosotros" required>
   </a>
      
        
		<br>
		 <a href = "cerrarSesion.php"> 
   <input type="button" value="cerrarSesion" id="sobreNosotros" name="sobreNosotros" required>
   </a>
 
   
      
<?php
}
}
else{
	
	?>
	<h1>Es necesiario registarse</h1>
		<a href="index.php">
        <input type="button" value="index"   id="index" name="index" required><br><br>
	 </a>
 
<?php
 }
?>
 
</body>
</html>