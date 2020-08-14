<?php
include("../../models/admin.php");
//include("../models/conexion.php");
$obj = new Admin();

if($_SERVER['REQUEST_METHOD']=="POST") {
$material_id=$_POST["material_id"];
$prothesis_type_id=$_POST["prothesis_type_id"];
$arch = $_POST["arch"];
$step_id=$_POST["step_id"];

//echo $material_id."-".$prothesis_type_id."-".$arch."-".$step_id;die;

$array = $obj->return_lp_ps_by_data($material_id,$prothesis_type_id,$arch,$step_id);

echo json_encode($array);
}
 ?>