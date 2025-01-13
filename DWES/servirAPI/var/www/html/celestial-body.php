<?php
header("Content-Type:application/json");
include "Querys/BDconection.php";
$pdo=connection();
/*
● Cuerpos celestes
○ GET
■ Obtener cuerpos celestes acorde a filtros
● Cualquier campo, coincidencia total
■ Obtener todos los cuerpos celestes ordenados por nombre
● Normal o inverso
*/
$validParams=array(
	"id","nombre","tipo","radio",
	"masa","densidad");
$params=$_GET;
$query="SELECT * FROM cuerpo_celeste";
//asegurar la coincidencia total
if(count($params)>0){
	$query=$query." WHERE ";
	foreach($params as $param => $value){
		if(in_array($param,$validParams)){
			$query = $query.$param."=".$value." AND ";
		}
	}
	$query=substr($query,0,strlen($query)-5);
}
$result=$pdo->query($query);
$response=$result->fetchAll(PDO::FETCH_ASSOC);
/*
foreach($response as &$ship){
	if(!is_null($ship['id_coalicion'])){
		$ship['coalicion']="http://".$_SERVER['SERVER_NAME'].
			"/coalition.php?id=".
			$ship['id_coalicion'];
	}
	else{
		$ship['coalicion']=null;
	}
	unset($ship['id_coalicion']);
}
unset($ship);
*/
if(isset($_GET['id'])){
	if(is_numeric($_GET['id']) && $_GET['id']>0){
		$result=$pdo->query(
		"SELECT * FROM cuerpo_celeste WHERE id=".$_GET['id']
		);
		$response=$result->fetch(PDO::FETCH_ASSOC);
		if(!$response){
			$response="there is no celestial  body with that id, try again!";
			http_response_code(404);
		}
	}
	else{
		http_response_code(400);
		$response="the id has to be a numeric value";
	}
}
else if( isset($_GET["order"])){
	$orderStyle=strtolower($_GET['order']);
	$orderStyle = trim($orderStyle);
	$query = $query." order by nombre ";
	if(!empty($orderStyle) && $orderStyle == "asc"){
		$query = $query.$orderStyle;
		$result=$pdo->query($query);
	$response=$result->fetchAll(PDO::FETCH_ASSOC);
	}
	else if(!empty($orderStyle) && $orderStyle == "desc"){
		$query = $query.$orderStyle;
		$result=$pdo->query($query);
	$response=$result->fetchAll(PDO::FETCH_ASSOC);
	}
	else{
		http_response_code(400);
		$response="the ordenation style maust be in a expected format (asc/desc)";
	}

}
else if ( isset($_POST)){
		$queryToInsert;
		if(isset($_POST['nombre'],$_POST['tipo'],$_POST['radio'],$_POST['masa'],$_POST['densidad'])){
			if(is_numeric($_POST['radio'] && is_numeric($_POST['masa'])&& is_numeric($_POST['densidad']))){
					$queryToInsert="INSERT INTO cuerpo_celeste ( nombre, tipo, radio, masa, densidad) VALUES (".$_POST['nombre'].",".$_POST['tipo'].",".$_POST['radio'].",".$_POST['masa'].",".$_POST['densidad'].")";
					$result=$pdo->query($queryToInsert);
					$resultToShow=$pdo->query("SELECT * FROM cuerpo_celeste WHERE id = LAST_INSERT_ID();");
					$response= $resultToShow->fetchAll(PDO::FETCH_ASSOC);
			}

		}
}
else if ( isset($_POST["creacion"])){

}
http_response_code( 200);
echo json_encode($response);
?>
