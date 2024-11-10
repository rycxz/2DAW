<<<<<<< HEAD
<?PHP
 
//incio sesion
session_start();
//le doy un nombre a la sesion
$_SESSION['contador'];
//si no esta inicada la sesion (si no tiene valor)que lo ponga  a 0
if(!isset($_SESSION['contador'])){
   $_SESSION['contador'] =0;
}else{
  //si , si que tiene valor que lo ponga a + 1 cada vez
  $_SESSION['contador']++ ;
}
//lo imprimo
echo $_SESSION['contador'];
 ?>
 
=======
<?PHP
 
//incio sesion
session_start();
//le doy un nombre a la sesion
$_SESSION['contador'];
//si no esta inicada la sesion (si no tiene valor)que lo ponga  a 0
if(!isset($_SESSION['contador'])){
   $_SESSION['contador'] =0;
}else{
  //si , si que tiene valor que lo ponga a + 1 cada vez
  $_SESSION['contador']++ ;
}
//lo imprimo
echo $_SESSION['contador'];
 ?>
 
>>>>>>> origin/master
   