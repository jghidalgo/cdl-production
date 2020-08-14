<?php
include("../../models/admin.php");
$ob = new Admin();

$lab_serv_name_es = $_POST["lab_service_name_es"];
$lab_serv_name_en = $_POST["lab_service_name_en"];
$lab_serv_max_quan = $_POST["lab_serv_max_quan"];
$lab_serv_days = $_POST["lab_serv_days"];
$user_id = $_POST["id_user_hidde"]; 


//echo $lab_proc_name.$lab_proc_max_quan.$lab_proc_cost.$lab_proc_days.$user_id;die;
$ob->insert_lab_service($lab_serv_name_es,$lab_serv_name_en ,$lab_serv_max_quan ,$lab_serv_days,$user_id);
//{
	
	header("Location: ../../views/admin/departments_employees.php");

	//}
 ?>