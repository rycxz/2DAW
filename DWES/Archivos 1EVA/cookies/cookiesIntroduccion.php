<?php 

setcookie("nombreDeLACookie", "valor de la cookie" , time()+44);
print_r ($_COOKIE);
echo " antes <br>";
 
echo "depue <br>";
print_r ($_COOKIE);
?>