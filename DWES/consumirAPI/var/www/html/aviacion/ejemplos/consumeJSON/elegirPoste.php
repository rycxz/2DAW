<?php
$url="https://www.zaragoza.es/api/recurso/urbanismo-infraestructuras/transporte-urbano/poste.json";
$JSONstring=file_get_contents($url);
$data=json_decode($JSONstring,true);
echo '<select form="elFormulario" name="poste">';
foreach($data['result'] as $poste){
	echo '<option value="';
	echo $poste['id'];
	echo '">';
	echo $poste['title'];
	echo '</option>';
	echo "<br><br>";
}
echo "</select>";
?>
<form id="elFormulario" action="posteConcreto.php" method="get">
<input type="submit" value="Ver buses">
</form>