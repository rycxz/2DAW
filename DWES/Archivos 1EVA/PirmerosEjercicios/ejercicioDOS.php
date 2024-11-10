<<<<<<< HEAD
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
	 
   $string1 =  fgets(STDIN , "%s", $string1);
   $string2 =  fgets(STDIN , "%s", $string2);
	$repuestaFuncion =	esPalindromo(  $string1,$string2); 
	 switch($repuestaFuncion){
		case 1:
			echo "la palabra es palindromo!";
			break;
			case 0:
			echo "la palabra no lo es";
			break;
	 };
	 
	
?>
=======
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
	 
   $string1 =  fgets(STDIN , "%s", $string1);
   $string2 =  fgets(STDIN , "%s", $string2);
	$repuestaFuncion =	esPalindromo(  $string1,$string2); 
	 switch($repuestaFuncion){
		case 1:
			echo "la palabra es palindromo!";
			break;
			case 0:
			echo "la palabra no lo es";
			break;
	 };
	 
	
?>
>>>>>>> origin/master
 