<?php
header('Access-Control-Allow-Origin: *');
require_once 'accesoBD.php';

date_default_timezone_set("UTC");

$objectResponse = new stdClass();
$objectResponse = accesoBD::leerDatos();

echo json_encode($objectResponse);
?>
