<?php
include("../../models/admin.php");
//include("../models/conexion.php");
$obj = new Admin();

if($_SERVER['REQUEST_METHOD']=="POST") {
$id_employee = $_POST['id_employee'];
//echo $id_step;
//echo $id_proth."-".$arch."-".$id_material;
$array = $obj->return_data_by_idEmp($id_employee);

echo json_encode($array);
}
 ?>