<?php
include("../../models/admin.php");
$ob = new Admin();

$lab_dep_nameen = $_POST["deparmenten"];
$lab_dep_namees = $_POST["deparmentes"];
$lab_dep_description = $_POST["description"];

$user_id = $_POST["id_user_hidde"]; 
//echo $lab_dep_nameen.$lab_dep_namees.$lab_dep_description.$user_id;die;
$ob->insert_laboratory_department($lab_dep_nameen,$lab_dep_namees,$lab_dep_description,$user_id);
//{
	
	header("Location: ../../views/admin/departments_employees.php");

	//}
 ?>