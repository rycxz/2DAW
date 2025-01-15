<?php
header("Content-Type:application/json");
include "Querys/BDconection.php";
$pdo = connection();

/*
● Celestial Bodies
○ GET
■ Retrieve celestial bodies based on filters
● Any field, exact match
■ Retrieve all celestial bodies sorted by name
● Ascending or descending
*/

$validParams = array(
    "id", "nombre", "tipo", "radio", "masa", "densidad"
);

$params = $_GET;
$query = "SELECT * FROM cuerpo_celeste";

// Ensure exact match
if (count($params) > 0) {
    $query = $query . " WHERE ";
    foreach ($params as $param => $value) {
        if (in_array($param, $validParams)) {
            $query = $query . $param . "=" . $value . " AND ";
        }
    }
    $query = substr($query, 0, strlen($query) - 5);
    $result = $pdo->query($query);
    $response = $result->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_GET['id'])) {
    if (is_numeric($_GET['id']) && $_GET['id'] > 0) {
        $result = $pdo->query(
            "SELECT * FROM cuerpo_celeste WHERE id=" . $_GET['id']
        );
        $response = $result->fetch(PDO::FETCH_ASSOC);
        if (!$response) {
            $response = "There is no celestial body with that ID, try again!";
            http_response_code(404);
        }
    } else {
        http_response_code(400);
        $response = "The ID has to be a numeric value.";
    }
} else if (isset($_GET["order"])) {
    $orderStyle = strtolower($_GET['order']);
    $orderStyle = trim($orderStyle);
    $query = $query . " ORDER BY nombre ";
    if (!empty($orderStyle) && $orderStyle == "asc") {
        $query = $query . $orderStyle;
        $result = $pdo->query($query);
        $response = $result->fetchAll(PDO::FETCH_ASSOC);
    } else if (!empty($orderStyle) && $orderStyle == "desc") {
        $query = $query . $orderStyle;
        $result = $pdo->query($query);
        $response = $result->fetchAll(PDO::FETCH_ASSOC);
    } else {
        http_response_code(400);
        $response = "The order style must be in an expected format (asc/desc).";
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if it's a creation request
    if (isset($_POST["creation"])) {
        $queryToInsert;
        if (!empty($_POST['nombre']) && !empty($_POST['tipo']) && !empty($_POST['radio']) && !empty($_POST['masa']) && !empty($_POST['densidad'])) {
            if (
                isset($_POST['nombre'], $_POST['tipo'], $_POST['radio'], $_POST['masa'], $_POST['densidad']) &&
                is_numeric($_POST['radio']) &&
                is_numeric($_POST['masa']) &&
                is_numeric($_POST['densidad'])
            ) {
                $nombre = $_POST['nombre'];
                $tipo = $_POST['tipo'];
                $radio = $_POST['radio'];
                $masa = $_POST['masa'];
                $densidad = $_POST['densidad'];
                $queryToInsert = "INSERT INTO cuerpo_celeste (nombre, tipo, radio, masa, densidad)
                                  VALUES ('$nombre', '$tipo', $radio, $masa, $densidad)";
                $result = $pdo->query($queryToInsert);
                $resultToShow = $pdo->query("SELECT * FROM cuerpo_celeste WHERE id = LAST_INSERT_ID()");
                $response = $resultToShow->fetchAll(PDO::FETCH_ASSOC);

                echo json_encode($response);
            } else {
                echo "Error: Invalid or incomplete data.";
            }
        } else {
            $response = "All fields must be completed!";
            http_response_code(404);
        }
    } else if (isset($_POST["update"])) {
        $queryToUpdate = "UPDATE cuerpo_celeste SET ";
        if (isset($_POST['id'])) {
            if (is_numeric($_POST['id']) == 1) {
				$queryToProve = "SELECT COUNT(*) FROM cuerpo_celeste;";
				$resultToTest = $pdo->query($queryToProve);
				$count = $resultToTest->fetchColumn();
				if($_POST['id'] <= $count){


                $paramPOST = $_POST;
                if (count($paramPOST) > 0) {
                    foreach ($paramPOST as $param => $value) {
                        if (in_array($param, $validParams) && $param !== 'id') {
                            if (isset($_POST['radio'], $_POST['masa'], $_POST['densidad'])) {
                                if (is_numeric($_POST['radio']) && is_numeric($_POST['masa']) && is_numeric($_POST['densidad'])) {
                                    $queryToUpdate .= $param . "='" . $value . "', ";
                                } else {
                                    $response = "Radio, masa, and densidad must be numeric values!";
                                    http_response_code(404);
                                }
                            } else {
                                $queryToUpdate .= $param . "='" . $value . "', ";
                            }
                        }
                    }
					$queryToUpdate = rtrim($queryToUpdate, ", ");
					$queryToUpdate .= " WHERE id = " . $_POST['id'];
					$result = $pdo->query($queryToUpdate);
					$resultToShow = $pdo->query("SELECT * FROM cuerpo_celeste WHERE id = " . $_POST['id'] . ";");
					$response = $resultToShow->fetchAll(PDO::FETCH_ASSOC);
                }}else{
					$response = "the ID dosnt mach any celestial body!";
					http_response_code(404);
				}
            } else {
                $response = "The ID has to be a number!";
                http_response_code(404);
            }
        } else {
            $response = "You need an ID to do that!";
            http_response_code(404);
        }
    } else {
        $response = "No match, try again!";
        http_response_code(404);
    }
} else {
    $response = "Nothing here, boss!";
    http_response_code(404);
}

http_response_code(200);
echo json_encode($response);
?>
