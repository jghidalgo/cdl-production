<?php
include("../../models/admin.php");
$ob = new Admin();

$emp_name = $_POST["emp_name"];
$emp_middle = $_POST["emp_middle"];
$emp_last = $_POST['emp_last'];
$emp_phone = $_POST["emp_phone"]; 
$emp_email = $_POST["emp_email"];
$office_id = $_POST["office_id"];
$user_par = $_POST["user_par"];
$pass = $_POST["pass"];
$tok = bin2hex(openssl_random_pseudo_bytes(7));
$tok_expire = date('Y-m-d H:i:s', strtotime('+1 hour'));
$id_user = $_POST["id_user_hidde"]; //echo $office.$email.$address.$unit.$state.$city.$zipcode.$id_user;die;

$ob->insert_employee_office($user_par,$pass,$tok,$tok_exp,$u_type_id,$emp_name,$emp_middle,$emp_last,$emp_phone,$emp_email,$office_id,$user_id);
//{
	
	header("Location: ../../views/admin/oficinas_empleados.php");

	//}
 ?>