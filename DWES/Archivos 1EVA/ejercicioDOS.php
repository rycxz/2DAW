<?php
function esPalindromo($palabraUno,$palabraDos){
	$palabraDos=strrev($palabraDos);
	
	if($palabraUno == $palabraDos){
		return true;
	}else{
		return false;
	}
	
	

	
};
	echo "<br>";
	 
 
	$repuestaFuncion =	esPalindromo("cosa","amor"); 
	 switch($repuestaFuncion){
		case 1:
			echo "la palabra es palindromo!";
			break;
			case 0:
			echo "la palabra no lo es";
			break;
	 };
	 
	
?>