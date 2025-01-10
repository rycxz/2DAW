<?php
include_once( "BDconection.php" );
  function getAllCoaltions() {
    $pdo = connection();

    $result = $pdo->query("SELECT * FROM coalicion");
    return $result->fetchAll(PDO::FETCH_ASSOC) ?: false;
}
function getOneCoaltion($id) {
    $pdo = connection();

    $result = $pdo->query("SELECT * FROM coalicion where id=$id");
    return $result->fetchAll(PDO::FETCH_ASSOC) ?: false;
}
function getShipByName($param) {
    $pdo = connection();

    $result = $pdo->query("SELECT * FROM nave where nombre=$param");
    return $result->fetchAll(PDO::FETCH_ASSOC) ?: false;
}
function getShipByIdentifier($param) {
    $pdo = connection();

    $result = $pdo->query("SELECT * FROM nave where identificador=$param");
    return $result->fetchAll(PDO::FETCH_ASSOC) ?: false;
}
function getShipByType($param) {
    $pdo = connection();

    $result = $pdo->query("SELECT * FROM nave where tipo=$param");
    return $result->fetchAll(PDO::FETCH_ASSOC) ?: false;
}
function getShipByLoadCapacity($param) {
    $pdo = connection();

    $result = $pdo->query("SELECT * FROM nave where capacidad_carga=$param");
    return $result->fetchAll(PDO::FETCH_ASSOC) ?: false;
}
function getShipByCrewMembers($param) {
    $pdo = connection();

    $result = $pdo->query("SELECT * FROM nave where n_tripulantes=$param");
    return $result->fetchAll(PDO::FETCH_ASSOC) ?: false;
}
function getShipByCoaltion($param) {
    $pdo = connection();

    $result = $pdo->query("SELECT coalicion.nombre FROM coalicion
    join nave on nave.id_coalicion = coalicion.id
     where nave.id = $param;");
    return $result->fetchAll(PDO::FETCH_ASSOC) ?: false;
}


?>
