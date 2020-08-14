<?php
include("../../models/admin.php");
//include("../models/conexion.php");
$obj = new Admin();

if($_SERVER['REQUEST_METHOD']=="GET") {

$var = $_GET['date'];
//echo $id_proth."-".$arch."-".$id_material;
$array = $obj->return_lab_reservation_by_date($var);

echo json_encode($array);
}
 ?>