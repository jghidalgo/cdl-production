<?php
include("../../models/admin.php");
$ob = new Admin();

$name_user_type = $_POST["type_user"];
$description = $_POST["description"];

$lang = $_POST["lang"];
$user_id = $_POST["id_user_hidde"]; //echo $office.$email.$address.$unit.$state.$city.$zipcode.$id_user;die;
$module_id = $_POST["modules"];
$ob->insert_user_type($name_user_type,$description,$user_id,$module_id);
//{
	
	header("Location: ../../views/admin/usuarios.php?lang=".$lang);

	//}
 ?>