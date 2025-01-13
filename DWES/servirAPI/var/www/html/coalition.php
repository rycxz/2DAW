<?php
header("Content-Type:application/json");
include "Querys/BDconection.php";
$pdo=connection();
/*
○ GET
■ Obtener una coalicion por id
■ Obtener todas las coaliciones
*/
if(isset($_GET['id'])){
	if(is_numeric($_GET['id']) && $_GET['id']>0){
		$result=$pdo->query(
		"SELECT * FROM coalicion WHERE id=".$_GET['id']
		);
		$resopnse=$result->fetch(PDO::FETCH_ASSOC);
		if(!$resopnse){
			$resopnse="There is no coalition with that id";
			http_response_code(404);
		}
	}
	else{
		http_response_code(400);
		$resopnse="The id has to be numeric";
	}
}
else{
	$result=$pdo->query("SELECT * FROM coalicion");
	$resopnse=$result->fetchAll(PDO::FETCH_ASSOC);
}
http_response_code(200);
echo json_encode(value: $resopnse);
?>
