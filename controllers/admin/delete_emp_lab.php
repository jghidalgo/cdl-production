<?php
include("../../models/admin.php");
$ob = new Admin();

$id_emp = $_POST["id_employee"];
/*$emp_middle = $_POST["emp_middle"];
$emp_last = $_POST['emp_last'];
$emp_phone = $_POST["emp_phone"]; 
$emp_email = $_POST["emp_email"];
$office_id = $_POST["office_id"];
$user_par = $_POST["user_par"];
$pass = $_POST["pass"];
$tok = bin2hex(openssl_random_pseudo_bytes(7));
$tok_expire = date('Y-m-d H:i:s', strtotime('+1 hour'));
$id_user = $_POST["id_user_hidde"]; */

$ob->delete_employee($id_emp);
//{
	
	//header("Location: ../../views/admin/departments_employees.php?lang=en&active=2");

	//}
 ?>