<?php
include("../../models/admin.php");
//include("../models/conexion.php");
$obj = new Admin();

if($_SERVER['REQUEST_METHOD']=="POST") {
$pat_lab_proc_id = $_POST['pat_lab_proc_id'];
echo $pat_lab_proc_id;die;

$array = $obj->return_invoice_info($pat_lab_proc_id);

echo json_encode($array);
}
 ?>