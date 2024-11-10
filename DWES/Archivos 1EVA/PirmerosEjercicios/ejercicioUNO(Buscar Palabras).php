<<<<<<< HEAD
<?php

/*Crea una aplicación en PHP que cuente cuantas veces se repite cada palabra y que muestre el
recuento final de todas ellas. Estará en una variable creada a piñón.*/

$palabraClave ;

$cadena = "Esta cadena contendra varias palabras que en ellas se contendra varias oraciones que contendra muchas coas que contendra mas coas";

$arrayCadena = explode(" ",$cadena);


for($i=0;$i<count($arrayCadena);  $i=$i+1){
	$cantidadRepetida =0;
	$palabraClave=$arrayCadena[$i];
	echo "<br>";
	
	for($j=$i+1;$j<count($arrayCadena)-1;  $j=$j+1){
		
	if($arrayCadena[$j] == $palabraClave){
		
		$cantidadRepetida = $cantidadRepetida+1;
		
	}
	
	}
	
	echo "la palabra ".$palabraClave." se repite ".$cantidadRepetida." veces";
	$cantidadRepetida=0;	
}

	
=======
<?php

/*Crea una aplicación en PHP que cuente cuantas veces se repite cada palabra y que muestre el
recuento final de todas ellas. Estará en una variable creada a piñón.*/

$palabraClave ;

$cadena = "Esta cadena contendra varias palabras que en ellas se contendra varias oraciones que contendra muchas coas que contendra mas coas";

$arrayCadena = explode(" ",$cadena);


for($i=0;$i<count($arrayCadena);  $i=$i+1){
	$cantidadRepetida =0;
	$palabraClave=$arrayCadena[$i];
	echo "<br>";
	
	for($j=$i+1;$j<count($arrayCadena)-1;  $j=$j+1){
		
	if($arrayCadena[$j] == $palabraClave){
		
		$cantidadRepetida = $cantidadRepetida+1;
		
	}
	
	}
	
	echo "la palabra ".$palabraClave." se repite ".$cantidadRepetida." veces";
	$cantidadRepetida=0;	
}

	
>>>>>>> origin/master
?>