<?php
include("../../models/admin.php");
$ob = new Admin();

$user = $_POST["user"];
$pass = $_POST["password"];
$passMd5 = md5($pass);
$user_type_id = $_POST["user_type"];
$name_user = $_POST["name_user"];
$s_name_user = $_POST["s_name_user"];
$l_name_user = $_POST["l_name_user"];
$tok = bin2hex(openssl_random_pseudo_bytes(7));
$tok_expire = date('Y-m-d H:i:s', strtotime('+1 hour'));
$id_user = $_POST["id_user_hidde"]; 
$active_user = 1;
$lang = $_POST["lang"];
if($_POST["group"])
{
$address = $_POST["address_ceo"];
$unit = $_POST["unit_ceo"];
$city = $_POST["city_ceo"];
$state = $_POST["state_ceo"];
$zipcode = $_POST["zipcode_ceo"];
$license = $_POST["license_ceo"];
$group = $_POST["group"];



$services = $ob->get_lp_ps();
$array_services_proc = array();$i=0;
foreach($services as $servic)
{ 
  $var = 'serv_cost'+$servic["id_lp_ps"];
  $array_services_proc[$i]["id_lp_ps"]=$servic["id_lp_ps"];
  $array_services_proc[$i]["serv_cost"]=$_POST[$var];
  $i++;
}
}
else
{
$address = 0;
$unit = 0;
$city = 0;
$state = 0;
$zipcode =0;
$license = 0;
$group = 0;	
}
echo print_r($array_services_proc);die;
//echo $user.'-'.$passMd5.'-'.$tok.'-'.$tok_expire.'-'.$active_user.'-'.$user_type_id.'-'.$id_user.'-'.$name_user.'-'.$s_name_user.'-'.$l_name_user.'-'.$address.'-'.$unit.'-'.$state.'-'.$city.'-'.$zipcode.'-'.$license.'-'.$group;die;
//$ob->insert_user($user,$passMd5,$tok,$tok_expire,$active_user,$user_type_id,$id_user,$name_user,$s_name_user,$l_name_user,$address,$unit,$city,$state,$zipcode,$license,$group);
//{
	
	header("Location: ../../views/admin/users.php?lang=".$lang);

	//}
 ?>