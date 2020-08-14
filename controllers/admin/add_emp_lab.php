<?php
include("../../models/admin.php");
$ob = new Admin();

$emp_name = $_POST["name"];
$emp_middle = $_POST["mi"];
$emp_last = $_POST['last_name'];
$emp_phone = $_POST["phone"]; 
$emp_email = $_POST["email"];
$lab_id = $_POST["id_deparment"];
$user_par = $_POST["name"];
$pass = $_POST["name"];
$initial_date = date("Y-m-d", strtotime($_POST["initial_date"]));
$pass2 = md5($pass);
$tok = bin2hex(openssl_random_pseudo_bytes(7));
$tok_expire = date('Y-m-d H:i:s', strtotime('+1 hour'));
$id_user = $_POST["id_user_hidde"]; //echo $office.$email.$address.$unit.$state.$city.$zipcode.$id_user;die;
$u_type_id= 2;
$cont = 0;$id = 0;
foreach($lab_id as $l)
{
	if($cont == 0)
	{
		
		$id =$ob->insert_employee_lab($user_par,$pass2,$tok,$tok_expire,$u_type_id,$emp_name,$emp_middle,$emp_last,$emp_phone,$emp_email,$l,$id_user,$initial_date);
		$cont = 1;
		
	}
	else
	{
		    $ob->insert_lab_department_to_employee($id[0]["emp_id"],$l,$initial_date);
			
	}
}
//echo $user_par.$pass.$tok.$tok_expire.$u_type_id.$emp_name.$emp_middle.$emp_last.$emp_phone.$emp_email.$lab_id.$id_user;die;

//{
	
	header("Location: ../../views/admin/departments_employees.php?lang=en&active=2");

	//}
 ?>