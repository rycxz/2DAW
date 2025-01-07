<?php
$url="https://api.thecatapi.com/v1/images/search?limit=10";
$JSONstring=file_get_contents($url);
$data=json_decode($JSONstring,true);
foreach($data as $imagen){
	echo "<img width='400' src='{$imagen['url']}'>";
}


?>