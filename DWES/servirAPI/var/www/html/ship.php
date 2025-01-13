<?php
header("Content-Type:application/json");
include "Querys/BDconection.php";
$pdo=connection();
/*
Naves
○ GET
■ Obtener naves acorde a filtros
● Cualquier campo, coincidencia total
● Obtener la coalicion a la que pertenece (HATEOAS)
*/
$validParams=array(
	"id","nombre","identificador","tipo",
	"capacidad_carga","n_tripulantes",
	"id_cuerpo_celeste","id_coalicion");
$params=$_GET;
$query="SELECT * FROM nave";
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

if(isset($_GET['id'])){
	if(is_numeric($_GET['id']) && $_GET['id']>0){
		$result=$pdo->query(
		"SELECT * FROM nave WHERE id=".$_GET['id']
		);
		$response=$result->fetch(PDO::FETCH_ASSOC);
		if(!$response){
			$response="we dont have any ship with that id, try again";
			http_response_code(404);
		}
	}
	else{
		http_response_code(400);
		$response="the id must be a numeric value";
	}
}
http_response_code( 200);
echo json_encode($response);
?>
