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
$group_id = $_POST["group_id"];
$finanzas = $_POST["finanzas"];
$lang = $_POST["lang"];
$id_user = $_POST["id_user_hidde"]; //echo $office.$email.$address.$unit.$state.$city.$zipcode.$id_user;die;

$ob->insert_office($office,$email,$address,$unit,$state,$city,$zipcode,$id_user,$finanzas,$group_id);
//{
	
	header("Location: ../../views/dental_group_ceo/group_settings.php?lang=".$lang);

	//}
 ?>