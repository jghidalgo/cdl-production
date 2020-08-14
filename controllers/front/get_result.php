<?php
include("../../models/admin.php");
//include("../models/conexion.php");
$obj = new Admin();

if($_SERVER['REQUEST_METHOD']=="POST") {
$id_proc_step=$_POST["id_proc_step"];
$id_proc_steps_lo=$_POST["id_proc_steps_lo"];
$group_id = $_POST["group_id"];
$cant_steps=$_POST["cant_steps"];
$material_upp=$_POST["material_upp"];
$material_low=$_POST["material_low"];
$proth_type_upp=$_POST["proth_type_upp"];
$upper_dent = $_POST["upper_dent"];
$proth_type_low=$_POST["proth_type_low"];
//echo $id_proc_step."-".$id_proc_steps_lo."-".$group_id."-".$cant_steps."-".$material_upp."-".$material_low."-".$proth_type_upp."-".$proth_type_low;die;

$array = $obj->calc_reservation_date($id_proc_step,$id_proc_steps_lo,$group_id,$cant_steps,$material_upp,$material_low,$proth_type_upp,$proth_type_low);

echo json_encode($array);
}
 ?>