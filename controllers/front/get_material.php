<?php
include("../../models/admin.php");
//include("../models/conexion.php");
$obj = new Admin();

if($_SERVER['REQUEST_METHOD']=="POST") {
$id_proth = $_POST['id_proth'];
$arch = $_POST['arch2'];

$array = $obj->return_material_by_prothesis($id_proth,$arch);

echo json_encode($array);
}
 ?>