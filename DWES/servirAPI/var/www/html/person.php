<?php
header("Content-Type:application/json");
include "Querys/BDconection.php";
$pdo = connection();
/*
○ GET
■ Obtener personas acorde a filtros
● Cualquier campo, coincidencia total
● Obtener la nave en la que tripula (HATEOAS)
● Obtener el cuerpo celeste donde habita (HATEOAS)
*/

$validParams = array("persona.id", "nombre", "edad", "id_cuerpo_celeste");

$params = $_GET;

if (isset($params["persona_id"])) {
    $params = array_combine(
        array_map(function($key) {
            return str_replace('_', '.', $key);
        }, array_keys($params)),
        $params
    );
}

$query = "SELECT * FROM persona";
$query2 = "SELECT persona.id, persona.nombre, persona.edad, persona.id_cuerpo_celeste, nave.id as 'id_nave_persona' FROM persona
JOIN cuerpo_celeste ON persona.id_cuerpo_celeste = cuerpo_celeste.id
JOIN tripulante ON tripulante.id_persona = persona.id
JOIN nave_tripulante ON nave_tripulante.id_tripulante = tripulante.id
JOIN nave ON nave_tripulante.id_nave = nave.id";

$queryConditions = "";
$query2Conditions = "";

foreach ($params as $param => $value) {
    if (isset($params["persona.id"])) {
        if (in_array($param, $validParams)) {
            $query2Conditions .= "$param = '$value' AND ";
        }
    } else {
        if (in_array($param, $validParams)) {
            $queryConditions .= "$param = '$value' AND ";
        }
    }
}

if (!empty($queryConditions)) {
    $query .= " WHERE " . substr($queryConditions, 0, -5);
}
if (!empty($query2Conditions)) {
    $query2 .= " WHERE " . substr($query2Conditions, 0, -5);
}

if (isset($params['persona.id'])) {
    $result = $pdo->query($query2);
} else {
    $result = $pdo->query($query);
}

$response = $result->fetchAll(PDO::FETCH_ASSOC);

if (!$response) {
    $response = "No hay datos con esa coincidencia";
    echo $response;
    return;
}

if (isset($_GET["persona_id"])) {
    foreach ($response as &$person) {
        if (!is_null($person["id_cuerpo_celeste"])) {
            $person["cuerpo_celeste"] = $_SERVER["SERVER_NAME"] . "/servirApi/cuerpoCeleste.php?id=" . $person["id_cuerpo_celeste"];
        } else {
            $person["cuerpo_celeste"] = null;
        }

        if (!is_null($person["id_nave_persona"])) {
            $person["naveTripulada"] = $_SERVER["SERVER_NAME"] . "/servirApi/nave.php?id=" . $person["id_nave_persona"];
        } else {
            $person["naveTripulada"] = null;
        }

        unset($person["id_cuerpo_celeste"]);
        unset($person["id_nave_persona"]);
    }
    unset($person);
} else {
    foreach ($response as &$person) {
        if (!is_null($person["id_cuerpo_celeste"])) {
            $person["cuerpo_celeste"] = $_SERVER["SERVER_NAME"] . "/servirApi/cuerpoCeleste.php?id=" . $person["id_cuerpo_celeste"];
        } else {
            $person["cuerpo_celeste"] = null;
        }
        unset($person["id_cuerpo_celeste"]);
    }
    unset($person);
}

http_response_code(200);
echo json_encode($response);
