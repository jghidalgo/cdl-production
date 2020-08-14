<?php
include("../../models/admin.php");
$ob = new Admin();

$id_emp = $_POST["id_employee_ed"];
$emp_name = $_POST["name_edit"];
$emp_last = $_POST['last_name_edit'];
$emp_phone = $_POST["phone_edit"]; 
$emp_email = $_POST["email_edit"];
//echo $id_emp."-".$emp_name." ".$emp_last." ".$emp_phone." ".$emp_email;
/*$user_par = $_POST["user_par"];
$pass = $_POST["pass"];
$tok = bin2hex(openssl_random_pseudo_bytes(7));
$tok_expire = date('Y-m-d H:i:s', strtotime('+1 hour'));
$id_user = $_POST["id_user_hidde"]; */

$ob-> update_personal_info_lab_employee($emp_name,$emp_last,$emp_phone,$emp_email,$id_emp);
//{
	
	header("Location: ../../views/admin/departments_employees.php?lang=en&active=2");

	//}
 ?>