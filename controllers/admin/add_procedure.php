<?php
include("../../models/admin.php");
$ob = new Admin();

$proth_type_id = $_POST["protesis_type"];

$material = $_POST["material"];
$services = $_POST["services"];

$user_id = $_POST["id_user_hidde"]; 
$lang = $_POST["langu"];
if($dent_type_id == "-Select-")
{
	$dent_type_id= "0";
	$material = "0";
	$services[] = $_POST["value_crown_steps"];
	$proth_type_id = $_POST["value_crown"];
}
//echo $proth_type_id."-".$dent_type_id."-".$material."-".$services;die;

$ob->insert_lab_procedure($material,$proth_type_id,$services,$user_id);
//{
	
	header("Location: ../../views/admin/departments_employees.php?lang=".$lang);

	//}
 ?>