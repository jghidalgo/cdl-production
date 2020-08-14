<?php
include("../../models/admin.php");
//include("../models/conexion.php");
$obj = new Admin();
$discount = 0;
if($_SERVER['REQUEST_METHOD']=="POST") {
$id_case = $_POST['id_case'];

echo $id_case;
$array = $obj->return_patient_info_by_id($id_case);

echo $array;
}
 ?>