<<<<<<< HEAD
 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Alumnos</title>
     
</head>
<body>
  <?php
	 
	//la primera vez qeu entra crea la cookie 
	if(!isset($_COOKIE["clave"])){
		setcookie("clave","Personal",time()+60);
		//creacion cookie
		
		
			}
			//si la cookie estab creada:
		else{
			$claveVerion= $_COOKIE["clave"];
			//si exite lo cookie sacamos su valor 
			if(isset($_POST["boton"])){
				
					if($claveVerion=="Persona"){
						
						$clave = "Profesional";
						
					}else{
						
						$claveVerion="Personal";
					}
					

					setcookie("clave",$clave,time()+60);
	 
					
				}
			}
		
		if($clave == "Profesional"){
			echo "info profesional perro";
			
		}
			else {
			echo "info perosnal perro";
			
		}
		
		
	
		
		
 ?>
	<h1> sobreNosotros   </h1>	
	<p>Este equipo es un gran equipo bla ba bla bla</p>
 
        	<a href="infoPersona.php">
        <input type="button" value="InformacionPersonal"   id="sobreNosotros" name="sobreNosotros" required><br><br>
	 </a>
		 
 
 
</body>
=======
 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Alumnos</title>
     
</head>
<body>
  <?php
	 
	//la primera vez qeu entra crea la cookie 
	if(!isset($_COOKIE["clave"])){
		setcookie("clave","Personal",time()+60);
		//creacion cookie
		
		
			}
			//si la cookie estab creada:
		else{
			$claveVerion= $_COOKIE["clave"];
			//si exite lo cookie sacamos su valor 
			if(isset($_POST["boton"])){
				
					if($claveVerion=="Persona"){
						
						$clave = "Profesional";
						
					}else{
						
						$claveVerion="Personal";
					}
					

					setcookie("clave",$clave,time()+60);
	 
					
				}
			}
		
		if($clave == "Profesional"){
			echo "info profesional perro";
			
		}
			else {
			echo "info perosnal perro";
			
		}
		
		
	
		
		
 ?>
	<h1> sobreNosotros   </h1>	
	<p>Este equipo es un gran equipo bla ba bla bla</p>
 
        	<a href="infoPersona.php">
        <input type="button" value="InformacionPersonal"   id="sobreNosotros" name="sobreNosotros" required><br><br>
	 </a>
		 
 
 
</body>
>>>>>>> origin/master
</html>