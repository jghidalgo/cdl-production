<?php
include('conexion2.php');
class Admin extends Db
{
	public function get_lp_ps()
	{
	   $row = "SELECT * FROM tbr_lp_ps WHERE end_date ='0000-00-00'";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function get_employee_by_id($id_user)
	{
	   $row = "SELECT * FROM tb_employee WHERE id_user = '$id_user'";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function get_user_by_id($id_user)
	{
	   $row = "SELECT * FROM tb_user WHERE id_user = '$id_user'";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function get_module_by_user($id_user_type)
	{
	   $row = "call return_modules_by_user_type('".$id_user_type."')";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_doctor_by_id($doctor_id)
	{
	   $row = "call return_doctor_by_id('".$doctor_id."')";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_invoice_info($pat_lab_proc_id)
	{
	   $row = "call return_invoice_info('".$pat_lab_proc_id."')";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_patient_info_by_id($id_case)
	{
	   $row = "call return_patient_info_by_id('".$id_case."')";
	   $rows = parent::select($row);
	   return $rows;
	}
    public function return_lp_ps_by_data($material_id,$prothesis_type_id,$arch,$step_id)
	{
	   $row = "call return_lp_ps_by_data('".$material_id."','".$prothesis_type_id."','".$arch."','".$step_id."')";
	   $rows = parent::select($row);
	   return $rows;
	}
												
                                                
                                               
	public function insert_lab_service_by_patient($lab_case,$name_p,$mid_name_p,$last_name,$dob,
												$office_id,$office_pickup_id,$vip_treatment,$reservation_date_uppe,$reservation_date_lowe,$delivery_date_uppe,$delivery_date_lowe,
                                                $appoinment_date,$doctor_id,$doctor_pickup_id,$color_id_upper,$color_id_lower,$doctor_comment,
                                                $employee_user_id,$upper_dent_val,$low_dent_val,$tooth_1,$tooth_2,$tooth_3,$tooth_4,$tooth_5,$teeth_1,$teeth_2,$teeth_3,$teeth_4,$teeth_5)
	{
		$row = "call insert_lab_service_by_patient('".$lab_case."','".$name_p."','".$mid_name_p."','".$last_name."','".$dob."','".
												$office_id."','".$office_pickup_id."','".$vip_treatment."','".$reservation_date_uppe."','".$reservation_date_lowe."','".$delivery_date_uppe."','".$delivery_date_lowe."',
                                                '".$appoinment_date."','".$doctor_id."','".$doctor_pickup_id."','".$color_id_upper."','".$color_id_lower."','".$doctor_comment."',
                                                '".$employee_user_id."','".$upper_dent_val."','".$low_dent_val."',
                                                '".$tooth_1."','".$tooth_2."','".$tooth_3."','".$tooth_4."','".$tooth_5."','".$teeth_1."','".$teeth_2."','".$teeth_3."','".$teeth_4."','".$teeth_5."')";
        $rows = parent::select($row);
	     return $rows;
	}
	/*public function return_lab_services_by_procedure($id_proc)
	{
	   $row = "call return_lab_services_by_procedure('".$id_proc."')";
	   $rows = parent::select($row);
	   return $rows;
	}*/
	public function return_reservations_by_day_step($step_id,$reservation_date)
	{
	   $row = "call return_reservations_by_day_step('".$step_id."','".$reservation_date."')";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_arch()
	{
	   $row = "call return_arch()";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_teeth()
	{
	   $row = "call return_teeth()";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_prothesis_type()
	{
	   $row = "call return_prosthesis_type()";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_denture_type()
	{
	   $row = "call return_denture_type()";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_material()
	{
	   $row = "call return_material()";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_material_by_prothesis($id_proth_type,$arch)
	{
	   $row = "call return_material_by_prothesis('".$id_proth_type."','".$arch."')";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function get_lab_services()
	{
	   $row = "call return_lab_services()";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_office_by_user($id_user)
	{
	   $row = "call return_office_by_user('".$id_user."')";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_lab_services_by_procedure($id_proth,$id_material,$arch)
	{
	   $row = "call return_lab_services_by_procedure('".$id_proth."','".$id_material."','".$arch."')";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function get_services($proc_id)
	{
	   $row = "call return_lab_services_by_procedure('".$proc_id."')";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function check_module($id_module)
	{
	   $row = "SELECT * FROM tb_module WHERE id_module = '$id_module'";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function get_category_by_idmodule($id_module)
	{
	   $row = "SELECT * FROM tb_sub_categories WHERE id_module = '$id_module'";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function get_office($id_group)
	{
		
		$row = "call return_offices('".$id_group."');";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function get_teeth()
	{
		$row = "SELECT * FROM tb_color_teeth";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function get_groups()
	{
		$row = "call return_group();";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function get_departments()
	{
		$row = "SELECT * FROM tb_laboratory_department";
	   $rows = parent::select($row);
	   return $rows;
	}

	public function get_employees($id_group)
	{
		$row = "call return_office_employees('".$id_group."');";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function users()
	{
		$row = "call return_users();";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_offices($id_group)
	{
		$row = "call return_offices('".$id_group."');";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_doctor_by_group($id_group)
	{
		$row = "call return_doctor_by_group('".$id_group."');";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_lab_procedures()
	{
		$row = "call return_lab_procedures();";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_group_by_ceo($user_id)
	{
		$row = "call return_group_by_ceo('".$user_id."');";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_group_by_user($user_id)
	{
		$row = "call return_group_by_user('".$user_id."');";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function get_type_users()
	{
		$row = "call return_user_type();";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_user_type()
	{
		$row = "call return_user_type();";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function insert_office($office_name ,$email ,$address ,$unit ,$city ,$state ,$zip ,$user_id,$finanzas,$group_id)
	{
       $row = "call insert_office('".$office_name."','".$email."','".$address."','".$unit."','".$city."','".$state."','".$zip."','".$user_id."','".$finanzas."','".$group_id."');";
	   $rows = parent::query($row);
	   //return $rows;   
	}
	public function insert_teeth($model,$color,$user_id)
	{
       $row = "call insert_teeth('".$model."','".$color."','".$user_id."');";
	   $rows = parent::query($row);
	   //return $rows;   
	}
	public function insert_group($name_group,$license_group ,$user_id)
	{
       $row = "call insert_group('".$name_group."','".$license_group."','".$user_id."');";
	   $rows = parent::query($row);
	   //return $rows;   
	}
	public function insert_lab_service($lab_serv_name_es,$lab_serv_name_en ,$lab_serv_max_quan ,$lab_serv_days,$user_id)
	{
       $row = "call insert_lab_service('".$lab_serv_name_es."','".$lab_serv_name_en."','".$lab_serv_max_quan."','".$lab_serv_days."','".$user_id."');";
	   $rows = parent::query($row);
	   //return $rows;   
	}
	public function insert_employee_office($emp_name,$emp_middle,$emp_last,$emp_phone,$emp_email,$office_id,$user_par,$pass,$tok,$tok_expire,$id_user,$u_type_id)
	{
       $row = "call insert_employee_office('".$emp_name."','".$emp_middle."','".$emp_last."','".$emp_phone."','".$emp_email."','".$office_id."','".$user_par."','".$pass."','".$tok."','".$tok_expire."','".$id_user."','".$u_type_id."');";
	   $rows = parent::query($row);
	    
	}
	public function insert_user($user,$passMd5,$tok,$tok_expire,$active_user,$user_type_id,$id_user,$name_user,$s_name_user,$l_name_user,$address,$unit,$city,$state,$zipcode,$license,$group)
	{
       $row = "call insert_user('".$user."','".$passMd5."','".$tok."','".$tok_expire."','".$active_user."','".$user_type_id."','".$id_user."','".$name_user."','".$s_name_user."','".$l_name_user."',
	   '".$address."','".$unit."','".$city."','".$state."','".$zipcode."','".$license."','".$group."');";

	   $rows = parent::query($row);
	   //return $rows;   
	}
	public function insert_user_type($name_user_type,$description,$user_id,$module_id)
	{
       $row = "call insert_user_type('".$name_user_type."','".$description."','".$user_id."','".$module_id."');";
	   $rows = parent::query($row);
	   //return $rows;   
	}
	public function insert_laboratory_department($lab_dep_nameen,$lab_dep_namees,$lab_dep_description,$user_id)
	{
       $row = "call insert_laboratory_department('".$lab_dep_nameen."','".$lab_dep_namees."','".$lab_dep_description."','".$user_id."');";
	   $rows = parent::query($row);
	   //return $rows;   
	}
	public function return_step_info($id_step)
	{
		$row = "call return_step_info('".$id_step."');";
       $rows = parent::select($row);
	   return $rows; 
	}
	public function insert_lab_procedure($material,$proth_type_id,$services,$user_id)
	{

       $row = "call insert_lab_procedure('".$material."','".$proth_type_id."','".$user_id."');";
	   $rows = parent::select($row);
	   $id = $rows[0]["id_lab_procedure"];
	   $array_services = $services;
	   foreach ($array_services as $key => $value) {
	   	# code...
	   	  $sql = " CALL insert_lab_serv_to_lab_proc('".$id."','".$value."');";
	   	  $eject = parent::query($sql);
	   }
	   //return $rows;   
	}
	public function get_modules()
	{
	   $row = "SELECT * FROM tb_module";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function get_deparments()
	{
	   $row2 = "CALL return_lab_departments()";
	   $rows2 = parent::select($row2);
	   return $rows2;
	}
	public function get_procedures()
	{
	   $row = "call return_procedures()";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function get_lab_employes()
	{
	   $row = "CALL return_lab_employees()";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function get_lab_employes_by_department()
	{
	   $row = "CALL return_lab_employees_by_department()";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_lab_reservation_by_date($date_var)
	{
	   $row = "CALL return_lab_reservations_by_date('".$date_var."')";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_data_by_idEmp($id_employee)
	{
	   $row = "CALL return_lab_employee_info('".$id_employee."')";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_lab_user_types()
	{
	   $row = "CALL return_lab_user_types()";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function calc_reservation_date($proc_step,$id_proc_steps_lo,$group_id,$cant_step,$material_upp,$material_low,$proth_type_upp,$proth_type_low)
	{
	   $row = "CALL calc_reservation_date('".$proc_step."','".$id_proc_steps_lo."','".$group_id."','".$cant_step."','".$material_upp."','".$material_low."','".$proth_type_upp."','".$proth_type_low."')";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function get_lab_employees()
	{
	   $row = "call return_lab_employees()";
	   $rows = parent::select($row);
	   return $rows;
	}
	public function return_data_for_pat_proc($id_group)
	{
	   $row = "call return_data_for_pat_proc('".$id_group."')";
	   $rows = parent::select_next_result($row);
	   return $rows;
	}
	public function insert_employee_lab($user_par,$pass2,$tok,$tok_expire,$u_type_id,$emp_name,$emp_middle,$emp_last,$emp_phone,$emp_email,$lab_id,$id_user,$initial_date)
	{
	   $row3 = "call insert_employee_lab('".$user_par."','".$pass2."','".$tok."','".$tok_expire."','".$u_type_id."','".$emp_name."','".$emp_middle."','".$emp_last."','".$emp_phone."','".$emp_email."','".$lab_id."','".$id_user."','".$initial_date."')";
	   $rows = parent::select($row3);
	   return $rows;
	}
	public function insert_lab_department_to_employee($id,$l,$initial_date)
	{
	   $row3 = "call insert_lab_department_to_employee('".$id."','".$l."','".$initial_date."')";
	   $rows = parent::query($row3);
	   //return $rows;
	}
	public function delete_employee($id)
	{
	   $row3 = "call delete_lab_employee('".$id."')";
	   $rows = parent::query($row3);
	   //return $rows;
	}
	public function update_personal_info_lab_employee($emp_name,$emp_last,$emp_phone,$emp_email,$id_emp)
	{
	   $row3 = "call update_personal_info_lab_employee('".$emp_name."','".$emp_last."','".$emp_phone."','".$emp_email."','".$id_emp."')";
	   $rows = parent::query($row3);
	   //return $rows;
	}
	public function count_register_users()
	{
		 $row = "SELECT count(*) as total FROM tb_user";
		 return  parent::select($row, 0);
	}
	public function count_register_departments()
	{
		 $row = "SELECT count(*) as total FROM tb_laboratory_department";
		 return  parent::select($row, 0);
	}
	
	public function count_register_procedures()
	{
		 $row = "SELECT count(*) as total FROM tb_lab_procedure";
		 return  parent::select($row, 0);
	}
    public function count_cant_oficce()
	{
		 $row = "SELECT count(*) as total FROM tb_office";
		 return  parent::select($row, 0);
	}
	
}

 ?>