<?php
include("../../models/admin.php");
//include("../models/conexion.php");
$obj = new Admin();

if($_SERVER['REQUEST_METHOD']=="POST") {
$id_step = $_POST['id_step'];
//echo $id_step;
//echo $id_proth."-".$arch."-".$id_material;
$array = $obj->return_step_info($id_step);

echo json_encode($array);
}
 ?>