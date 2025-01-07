<?php
if(!isset($_GET['poste'])){
	header("Location: elegirPoste.php");
}
$url="https://www.zaragoza.es/sede/servicio/urbanismo-infraestructuras/transporte-urbano/poste-autobus/".$_GET['poste'].".json";
$JSONstring=file_get_contents($url);
$data=json_decode($JSONstring,true);
foreach($data['destinos'] as $bus){
	echo "A la linea ";
	print($bus['linea']);
	echo " le quedan ";
	echo $bus['primero'];
	echo"<br><br>";
}
?>
