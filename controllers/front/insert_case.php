<?php
include("../../models/admin.php");
//include("../models/conexion.php");
$obj = new Admin();

if($_SERVER['REQUEST_METHOD']=="POST") {
$lab_case=$_POST["lab_case"];
$name_p = $_POST["name_p"];
$mid_name_p = $_POST["mid_name_p"];
$last_name=$_POST["last_name"];
$dob=$_POST["dob"];
$office_id=$_POST["office_id"];
$office_pickup_id=$_POST["office_pickup_id"];
$vip_treatment = $_POST["vip_treatment"];
$reservation_date=$_POST["reservation_date"];

$appoinment_date=$_POST["appoinment_date"];
$doctor_id = $_POST["doctor_id"];
//$doctor_pickup_id=$_POST["doctor_pickup_id"];
$doctor_pickup_id=0;
$doctor_comment=$_POST["doctor_comment"];
$employee_user_id=$_POST["employee_user_id"];
$employee_comment=$_POST["employee_comment"];
$color_id_upper = $_POST["teeth_id_upp"];
$color_id_lower = $_POST["id_color_lower"];
if($color_id_upper == "-Select-")
{
	$color_id_upper = 0;
}
if($color_id_lower == "-Select-")
{
	$color_id_lower = 0;
}
$upper_dent_val=$_POST["upper_dent_val"];

$low_dent_val = $_POST["low_dent_val"];
$number_t_up = $_POST["number_t_up"];
$number_t_low = $_POST["number_t_low"];
$reservation_date_lowe = $_POST["reservation_date_lowe"];
$reservation_date_uppe = $_POST["reservation_date_uppe"];

$delivery_date_lowe = $_POST["delivery_date_lowe"];
$delivery_date_uppe = $_POST["delivery_date_uppe"];



if ($number_t_up != null) {
	if ($number_t_up[0] != null) {
		# code...
		$tooth_1= $number_t_up[0];
		$teeth_1= 1;
	}else{$tooth_1= 0;$teeth_1= 0;}
	if ($number_t_up[1] != null) {
		# code...
		$tooth_2= $number_t_up[1];
		$teeth_2= 1;
	}else{$tooth_2= 0;$teeth_2= 0;}
    if ($number_t_up[2] != null) {
		# code...
		$tooth_3= $number_t_up[2];
		$teeth_3= 1;
	}else{$tooth_3= 0;$teeth_3= 0;}
    if ($number_t_up[3] != null) {
		# code...
		$tooth_4= $number_t_up[3];
		$teeth_4= 1;
	}else{$tooth_4= 0;$teeth_4= 0;}
    if ($number_t_up[4] != null) {
		# code...
		$tooth_5= $number_t_up[4];
		$teeth_5= 1;
	}else{$tooth_5= 0;$teeth_5= 0;}
    
}
if ($number_t_up == null && $number_t_low == null) {
	$tooth_1= 0;
    $tooth_2= 0;
    $tooth_3= 0;
    $tooth_4= 0;
    $tooth_5= 0;
    $teeth_1= 0;
    $teeth_2= 0;
    $teeth_3= 0;
    $teeth_4= 0;
    $teeth_5= 0;
}
if ($number_t_low != null) {
	if ($number_t_low[0] != '') {
		# code...
		$tooth_1= $number_t_low[0];
		$teeth_1= 1;
	}else{$tooth_1= 0;$teeth_1= 0;}
	if ($number_t_low[1] != '') {
		# code...
		$tooth_2= $number_t_low[1];
		$teeth_2= 1;
	}else{$tooth_2= 0;$teeth_2= 0;}
    if ($number_t_low[2] != '') {
		# code...
		$tooth_3= $number_t_low[2];
		$teeth_3= 1;
	}else{$tooth_3= 0;$teeth_3= 0;}
    if ($number_t_low[3] != '') {
		# code...
		$tooth_4= $number_t_low[3];
		$teeth_4= 1;
	}else{$tooth_4= 0;$teeth_4= 0;}
    if ($number_t_low[4] != '') {
		# code...
		$tooth_5= $number_t_low[4];
		$teeth_5= 1;
	}else{$tooth_5= 0;$teeth_5= 0;}
  
}
/*if ($number_t_low == null) {
	$teeth_1= 0;
    $teeth_2= 0;
    $teeth_3= 0;
    $teeth_4= 0;
    $teeth_5= 0;
}*/


    
//echo $lab_case.$name_p.$mid_name_p.$last_name.$dob.$office_id.$office_pickup_id.$vip_treatment.$reservation_date.$appoinment_date.$doctor_id.$doctor_pickup_id.$doctor_comment.
                                               // $employee_comment.$color_id_lower.$color_id_lower.$employee_user_id.$upper_dent_val.$low_dent_val.$number_t.$number_t.$number_t.$number_t.$number_t;die;
//echo $id_proc_step."-".$group_id."-".$cant_steps."-".$material_upp."-".$material_low."-".$proth_type_upp."-".$proth_type_low;
/*echo "call insert_lab_service_by_patient('".$lab_case."','".$name_p."','".$mid_name_p."','".$last_name."','".$dob."','".
												$office_id."','".$office_pickup_id."','".$vip_treatment."','".$reservation_date_uppe."','".$reservation_date_lowe."','".$delivery_date_uppe."','".$delivery_date_lowe."',
                                                '".$appoinment_date."','".$doctor_id."','".$doctor_pickup_id."','".$color_id_upper."','".$color_id_lower."','".$doctor_comment."',
                                                '".$employee_user_id."','".$upper_dent_val."','".$low_dent_val."',
                                                '".$tooth_1."','".$tooth_2."','".$tooth_3."','".$tooth_4."','".$tooth_5."','".$teeth_1."','".$teeth_2."','".$teeth_3."','".$teeth_4."','".$teeth_5."')";die;*/

$array = $obj->insert_lab_service_by_patient($lab_case,$name_p,$mid_name_p,$last_name,$dob,
												$office_id,$office_pickup_id,$vip_treatment,$reservation_date_uppe,$reservation_date_lowe,$delivery_date_uppe,$delivery_date_lowe,
                                                $appoinment_date,$doctor_id,$doctor_pickup_id,$color_id_upper,$color_id_lower,$doctor_comment,
                                                $employee_user_id,$upper_dent_val,$low_dent_val,$tooth_1,$tooth_2,$tooth_3,$tooth_4,$tooth_5,$teeth_1,$teeth_2,$teeth_3,$teeth_4,$teeth_5);

echo json_encode($array);
}
 ?>