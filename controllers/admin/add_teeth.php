<?php
include("../../models/admin.php");
$ob = new Admin();
$model = $_POST["model"];
$color = $_POST["color"];
$user_id = $_POST["id_user_hidde"]; 

$ob->insert_teeth($model,$color,$user_id);

	
header("Location: ../../views/admin/departments_employees.php");

	//}
 ?>