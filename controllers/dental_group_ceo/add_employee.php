<?php
include("../../models/admin.php");
$ob = new Admin();

$emp_name = $_POST["name_employee"];
$emp_middle = $_POST["mi"];
$emp_last = $_POST['last_employee'];
$emp_phone = $_POST["phone_employee"]; 
$emp_email = $_POST["email_employee"];
$office_id = $_POST["office_id"];
$user_par = $_POST["user_par"];
$pass = $_POST["pass"];$pass2 = md5($pass);
$tok = bin2hex(openssl_random_pseudo_bytes(7));
$tok_expire = date('Y-m-d H:i:s', strtotime('+1 hour'));
$id_user = $_POST["id_user_hidde"]; 
$u_type_id=3;//echo $office.$email.$address.$unit.$state.$city.$zipcode.$id_user;die;
$lang = $_POST["lang"];
$ob->insert_employee_office($emp_name,$emp_middle,$emp_last,$emp_phone,$emp_email,$office_id,$user_par,$pass,$tok,$tok_expire,$id_user,$u_type_id);
	header("Location: ../../views/dental_group_ceo/group_settings.php?lang=".$lang);

	
?>