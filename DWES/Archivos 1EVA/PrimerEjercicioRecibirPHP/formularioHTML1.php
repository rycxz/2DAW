<?php
	var_dump($_POST);
	if($_POST ['password']==$_POST['confirm-password']){
		echo "coinciden";
		
	}
	else{
		
		echo "mal";
	}

?>