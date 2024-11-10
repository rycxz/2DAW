<?php
session_start();

$_SESSION['operacion']=null;
header("Location : index.php");
exit();
?>