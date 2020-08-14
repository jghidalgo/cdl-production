<?php
include("../../models/admin.php");
$ob = new Admin();

$group = $_POST["group"];
$licence = $_POST["licence"];

$id_user = $_POST["id_user_hidde"]; //echo $office.$email.$address.$unit.$state.$city.$zipcode.$id_user;die;

$ob->insert_group($group,$licence,$id_user);
//{
	
	header("Location: ../../views/dental_group_ceo/group_settings.php");

	//}
 ?>