<?php
include("../../models/admin.php");
//include("../models/conexion.php");
$obj = new Admin();

if($_SERVER['REQUEST_METHOD']=="POST") {
$doctor_id = $_POST['doctor_id'];
//echo $id_step;
//echo $id_proth."-".$arch."-".$id_material;
$array = $obj->return_doctor_by_id($doctor_id);

echo json_encode($array);
}
 ?>