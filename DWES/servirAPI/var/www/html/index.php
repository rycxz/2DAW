<?php
header('Content-Type: application/json');
include "Consultas/BDconection.php";
if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $result =getOneCoaltion($_GET['id']);
        if($result == false){
            http_response_code(404);
        }
    }
    else{
        http_response_code(400);
    }
http_response_code(200);
echo json_encode($result);
?>
