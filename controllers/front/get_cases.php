<?php
include("../../models/admin.php");
//include("../models/conexion.php");
$obj = new Admin();

$ids = $_GET["ids"];
$rd = $_GET["rd"];
//echo $id_proth."-".$arch."-".$id_material;
$array = $obj->return_reservations_by_day_step($ids,$rd);



/*$columns = array(
    array( 'db' => 'first_name', 'dt' => 0 ),
    array( 'db' => 'last_name',  'dt' => 1 ),
    array( 'db' => 'address',   'dt' => 2 ),
    array( 'db' => 'phone', 'dt' => 3,),
    array( 'db' => 'date_of_birth','dt' => 4,
        'formatter' => function( $d, $row ) {
            return date( 'd-m-Y', strtotime($d));
        }
    )
   
);*/
$array_datatable = array('data'  => $array,);
$i = 0;
/*foreach ($array as  $value) {
	# code...
	$array_datatable["id_patient"] = $value["id_patient_lab_procedure"];
	$array_datatable["p_name"] = $value["p_name"];
	$array_datatable["p_dob"] = $value["p_dob"];
	$array_datatable["pt_name_es"] = $value["pt_name_es"];
	$array_datatable["lp_material_es"] = $value["lp_material_es"];
	$array_datatable["plp_appoiment_date"] = $value["plp_appoiment_date"];
	$array_datatable["Action"] = "1";
	$i = $i+1;

}*/
echo json_encode($array_datatable);

 ?>