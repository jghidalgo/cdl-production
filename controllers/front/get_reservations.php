<?php
include("../../models/admin.php");
//include("../models/conexion.php");
$obj = new Admin();


$step_id = $_GET['step_id'];
$reservation_date = $_GET['reservation_date'];

//echo $id_proth."-".$arch."-".$id_material;
$array = $obj->return_reservations_by_day_step($step_id,$reservation_date);

echo json_encode($array);

 ?>