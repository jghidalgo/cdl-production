<?php
include("../models/conexion2.php");
$obj = new Db();

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$user = $_POST["loginUsername"];
$pass = $_POST["loginPassword"];
$lang = $_POST["lang"];
$passMd5 = md5($pass);
//$lang = $_POST["lang"];
$flag = 0;
$sql = "SELECT * FROM tb_user";
$array = $obj->select($sql);
//print_r($array);die;
foreach ($array as $ar) {
if($user == $ar['u_username'] && $pass == $ar['u_password'] && $ar['u_active'] == 1)
{
    $token = bin2hex(openssl_random_pseudo_bytes(8)); //generate a random token
    $tokenExpiration = date('Y-m-d H:i:s');
    $flag = 1;
    session_start();
    $_SESSION['user'] = $user;
    $_SESSION['id_user'] = $ar['id_user'];
  //  $_SESSION['email'] = $ar['u_email'];
    $_SESSION['id_user_type'] = $ar['id_user_type'];
    $_SESSION["token"] = $token;
    $_SESSION["tokenExpiration"] = $tokenExpiration;
    $_SESSION["login"] = '1';
    
    //echo $token." ".$tokenExpiration;die;
    if($ar['id_user_type'] == 1){
     
        header("HTTP/1.1 302 Moved Temporarily");
        if($lang == 'es'){
        header("Location: ../views/admin/main_admin.php?lang=es");
        }
        if($lang == 'en'){
        header("Location: ../views/admin/main_admin.php?lang=en");
        }
    }
    elseif($ar['id_user_type'] == 2)
    {
        header("HTTP/1.1 302 Moved Temporarily");
        if($lang == 'es'){
        header("Location: ../views/lab_employee/main_lab_employee.php?lang=es");
        }
        if($lang == 'en'){
        header("Location: ../views/lab_employee/main_lab_employee.php?lang=en");
        }
        
    }
    elseif($ar['id_user_type'] == 3)
    {
        header("HTTP/1.1 302 Moved Temporarily");
         if($lang == 'es'){
            $var=date('Y-m-30');
        header("Location: ../views/front_desck/main_frontdesck.php?lang=es&date=".$var);
        }
        if($lang == 'en'){
            $var=date('Y-m-30');
        header("Location: ../views/front_desck/main_frontdesck.php?lang=en&date=".$var);
        }
    }
    elseif($ar['id_user_type'] == 4)
    {
        header("HTTP/1.1 302 Moved Temporarily");
        if($lang == 'es'){
        header("Location: ../views/doctor/main_doctor.php?lang=es");
        }
        if($lang == 'en'){
        header("Location: ../views/doctor/main_doctor.php?lang=es");
        }
    }
    elseif($ar['id_user_type'] == 5)
    {
        header("HTTP/1.1 302 Moved Temporarily");
         if($lang == 'ES'){
        header("Location: ../views/main_provider.php?lang=es");
        }
        if($lang == 'EN'){
        header("Location: ../views/main_provider.php?lang=en");
        }
    }elseif($ar['id_user_type'] == 6)
    {
         header("HTTP/1.1 302 Moved Temporarily");
        if($lang == 'es'){
        header("Location: ../views/dental_group_ceo/main_ceo.php?lang=es");
        }
        if($lang == 'en'){
        header("Location: ../views/dental_group_ceo/main_ceo.php?lang=en");
        }
    }elseif($ar['id_user_type'] == 7)
    {
        header("HTTP/1.1 302 Moved Temporarily");
         if($lang == 'ES'){
        header("Location: ../views/main_leader.php?lang=es");
        }
        if($lang == 'EN'){
        header("Location: ../views/main_leader.php?lang=en");
        }
    }elseif($ar['id_user_type'] == 8)
    {
        header("HTTP/1.1 302 Moved Temporarily");
         if($lang == 'ES'){
        header("Location: ../views/main_company_vendor.php?lang=es");
        }
        if($lang == 'EN'){
        header("Location: ../views/main_company_vendor.php?lang=en");
        }
    }
 else {
      header("HTTP/1.1 302 Moved Temporarily");
        header("Location: ../views/page_404.php");  
    }

}

}
if($flag == 0)
{
   header("Location: ../index.html"); 
}
//echo 'response ok!';
/*echo print_r($decoded);die;
var_export($decoded->response);*/

