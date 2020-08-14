<?php
include('conexion2.php');
class Vendor extends Db
{
	public function add_vendor($user,$pass,$v_mail,$tok,$tok_exp,$p_name,$p_middle,$p_last,$dob,$phone,$fax,$company_id,$comp_name,$com_address,$comp_unit,$comp_city,$comp_state,$comp_zipcode,$comp_phone,$comp_fax,$comp_poc_name,$comp_poc_last_name,$comp_poc_email)
	{
		$sql = "call insert_vendor('".$user."','".$pass."','".$v_mail."','".$tok."','".$tok_exp."','".$p_name."','".$p_middle."','".$p_last."','".$dob."','".$phone."','".$fax."','".$company_id."','".$comp_name."','".$com_address."','".$comp_unit."','".$comp_city."','".$comp_state."','".$comp_zipcode."','".$comp_phone."','".$comp_fax."','".$comp_poc_name."','".$comp_poc_last_name."','".$comp_poc_email."')";
		$results = parent::query($sql);
        
	}
	public function add_vendor_by_representative($user,$pass,$v_mail,$tok,$tok_exp,$p_name,$p_middle,$p_last,$dob,$phone,$fax,$company_id,$comp_name,$com_address,$comp_unit,$comp_city,$comp_state,$comp_zipcode,$comp_phone,$comp_fax,$comp_poc_name,$comp_poc_last_name,$comp_poc_email,$id_representative)
	{
		$sql = "call insert_vendor_by_representative('".$user."','".$pass."','".$v_mail."','".$tok."','".$tok_exp."','".$p_name."','".$p_middle."','".$p_last."','".$dob."','".$phone."','".$fax."','".$company_id."','".$comp_name."','".$com_address."','".$comp_unit."','".$comp_city."','".$comp_state."','".$comp_zipcode."','".$comp_phone."','".$comp_fax."','".$comp_poc_name."','".$comp_poc_last_name."','".$comp_poc_email."','".$id_representative."')";
		$results = parent::query($sql);
        
	}

	public function get_plan_by_member_info($phone,$dob,$plan_card)
	{
		$sql = "call get_plan_by_member_info('".$phone."','".$dob."','".$plan_card."')";
		$rows = parent::select($sql);
        return $rows;
	}
	public function get_plan_by_member($id_member)
	{
		$sql = "call get_plan_by_member('".$id_member."')";
		$rows = parent::select($sql);
        return $rows;
	}
	public function get_member_by_id($id)
	{
		$sql = "SELECT * FROM tb_primary_member WHERE id_primary_member = '$id'";
		$rows = parent::select($sql);
        return $rows;
	}
	public function get_vendor_by_id($id)
	{
		$sql = "SELECT * FROM tb_vendor WHERE id_vendor = '$id'";
		$rows = parent::select($sql);
        return $rows;
	}
	public function get_plan_by_id($id)
	{
		$sql = "SELECT * FROM tb_plan WHERE id_plan = '$id'";
		$rows = parent::select($sql);
        return $rows;
	}
	public function get_vendor_by_iduser($id)
	{
		$sql = "SELECT * FROM tb_vendor WHERE id_user = '$id'";
		$rows = parent::select($sql);
        return $rows;
	}
	public function get_company_by_id($id)
	{
		$sql = "SELECT * FROM tb_company WHERE id_company = '$id'";
		$rows = parent::select($sql);
        return $rows;
	}
	public function get_plan_type_by_id($id)
	{
		$sql = "SELECT * FROM tb_plan_type WHERE id_plan_type = '$id'";
		$rows = parent::select($sql);
        return $rows;
	}
	public function get_payment_method_by_id($id)
	{
		$sql = "SELECT * FROM tb_payment_method WHERE id_payment_method = '$id'";
		$rows = parent::select($sql);
        return $rows;
	}
	public function get_plans_by_vendor($id)
	{

		$sql = "SELECT p.* FROM tb_plan as p JOIN tb_vendor as v WHERE v.id_vendor=p.id_vendor AND v.id_user = '$id' ORDER BY p.p_sale_date";
		$rows = parent::select($sql);
        return $rows;
	}
	public function approve_vendor($id_vendor,$id_status,$id_user,$representative)
	{
		$sql = "call approve_vendor('".$id_vendor."','".$id_status."','".$id_user."','".$representative."')";
		$results = parent::query($sql);
       // return $rows;
	}
	public function get_retentions_for_graph($id)
	{

		$sql = "call one_vendor_ytd_retention('".$id."')";
		$rows = parent::select($sql);
        return $rows;
	}
	
}

 ?>