<?php
include("../../models/admin.php");
$ob = new Admin();

$office = $_POST["office"];
$address = $_POST["address"];
$unit = $_POST['unit'];
$state = $_POST["state"]; 
$city = $_POST["city"];
$zipcode = $_POST["zipcode"];
$email = $_POST["email"];
$group_id = $_POST["groups"];
$independent = $_POST["independent"];
$general_billing = $_POST["general_billing"];
$id_user = $_POST["id_user_hidde"]; //echo $office.$email.$address.$unit.$state.$city.$zipcode.$id_user;die;

$ob->insert_office($office,$email,$address,$unit,$state,$city,$zipcode,$id_user,$independent,$general_billing,$group_id);
//{
	
	header("Location: ../../views/admin/oficinas_empleados.php");

	//}
 ?>