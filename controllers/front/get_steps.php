<?php
include("../../models/admin.php");
//include("../models/conexion.php");
$obj = new Admin();

if($_SERVER['REQUEST_METHOD']=="POST") {
$id_proth = $_POST['id_proth'];
$arch = $_POST['arch2'];
$id_material = $_POST['material_up'];
//echo $id_proth."-".$arch."-".$id_material;
$array = $obj->return_lab_services_by_procedure($id_proth,$id_material,$arch);

echo json_encode($array);
}
 ?>