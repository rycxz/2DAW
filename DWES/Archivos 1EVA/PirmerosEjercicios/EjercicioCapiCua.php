<?php
	function esCapicua($numero){
	return $numero==strrev($numero);


		}
	function esPrimo($numero){
		$divisor=$numero-1;
		while($numero%$divisor!=0){
			$divisor--;
			
		}
		 
			return ($divisor ==1);
			
		}
		
		function siguientePrimo($numero){
			$numero++;
			while(esPrimo($numero) != false){
				$numero++;
				
					
				
				
			}
			
		}
		function potencia($base,$exponente){
			$resultado= $base;
			for($i = 1;$i<$exponente;$i++){
				$resultado = $resultado * $base;
			}
			return $resultado;
			
		}
		echo potencia(2,12);
	function digitos($numero){
		return strlen($numero);
		
	}
	function digitoN ($numero, $n){
			return substr($numero,$n,1);
	}
	echo "<br>";
	echo digitoN(234233,4);
	function ej15(){
		 
	for($i = 2;$i<1000;$i++){
	 
		if(esPrimo($i)){
				 echo  $i ;echo "<br>";
		}
				
				 
	}
	}
		/*echo ej15();*/
		
	function capicuaAl10000(){
			for($i = 1;$i<1000;$i++){
			if(esCapicua($i)){
			echo $i;
			echo "<br>";
			}
			}
		}
	/*	echo "<br>";
		echo capicuaAl10000();
			*/
			
			function pasarBinarioDecimal($numeroBinario){
				$baseBinaria = 2;
				$numeroFinal=0;
				for($i = strlen($numeroBinario);$i>=0;$i--){
					$numeroFinal = intval(substr($numeroBinario,$i,1)) * $baseBinaria;
					
					
					
				}
				return $numeroFinal;
				
				
			}
			echo pasarBinarioDecimal(10101100);

?>