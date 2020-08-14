<?php
include("../../models/admin.php");
//include("../models/conexion.php");
$obj = new Admin();
$discount = 0;
if($_SERVER['REQUEST_METHOD']=="POST") {
$id_proc = $_POST['id_proc'];


$array = $obj->return_lab_services_by_procedure($id_proc);

echo json_encode($array);
}
 ?>