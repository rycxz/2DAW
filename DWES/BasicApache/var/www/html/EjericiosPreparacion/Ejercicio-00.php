<<<<<<< HEAD
<?php /*Ejercicio 1: Contador de visitas usando cookies*/

if(!isset($_COOKIE['visitas'])){
    //visitas se crea para que no vuelva a entrar al mimsmo if 
    setcookie("visitas",0,time()+999);
    echo "has visitado esta pagina 0";
   
}
else{
    $visitas = $_COOKIE['visitas'] + 1;
 setcookie('visitas',$visitas,time()+999);
    echo $_COOKIE['visitas'];
}

 
?>