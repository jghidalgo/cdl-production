<?php
include("../../models/admin.php");
$object = new Admin();
session_start();
$user = $_SESSION['user'];
$id_user = $_SESSION['id_user'];
$array = $object->get_employee_by_id($id_user);
$array2 = $object->get_user_by_id($id_user);
$id_user_type = $array2[0]["id_user_type"];
$array_module = $object->get_module_by_user($id_user_type);
/*$group = $object->return_group_by_user($id_user);
$id_group = $group[0]["id_group"];
$ofc = $object->get_office($id_group);
$offices_quantity = $ofc[0]['offices_quantity'];
$id_office = $ofc[0]['id_office'];*/
//$doctors = $object->return_doctor_by_group($id_group);
//$id_doctor = $doctors[0]["id_doctor"];
$date = date("Y-m-d");
//$id_module = $array_module[0]["id_module"];
////////////////////////////////////////////////////////////////////////////
if ($_SESSION["login"] != "1") { 
    //si no está logueado lo envío a la página de autentificación 
    header("Location: ../../index.html"); 
} else { 
    //sino, calculamos el tiempo transcurrido 
    $fechaGuardada = $_SESSION["tokenExpiration"]; 
    $ahora = date("Y-n-j H:i:s"); 
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada)); 

    //comparamos el tiempo transcurrido 
     if($tiempo_transcurrido >= 600) { 
     //si pasaron 10 minutos o más 
      session_destroy(); // destruyo la sesión 
      header("Location: ../../index.html"); //envío al usuario a la pag. de autenticación 
      //sino, actualizo la fecha de la sesión 
    }else { 
    $_SESSION["tokenExpiration"] = $ahora; 
   } 
} 

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CDL</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/iCheck/flat/blue.css">

  <!-- jvectormap -->
  <link rel="stylesheet" href="../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../assets/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="../assets/dist/css/bootstrap-multiselect.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../assets/plugins/iCheck/all.css">
  <link rel="stylesheet" type="text/css" href="../assets/dist/js/dropdown.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/dist/js/semantic.min.css">

  <style type="text/css">
      @media print {
        
        
        #printSection {
            position:relative;
            left:0;
            top:0;  
            margin:0px; 
           
        }

}
  </style>
  <script src="../assets/dist/js/JsBarcode.all.js"></script>
   <script type="text/javascript" src="../assets/js/code39.js"></script>
  <script type="text/javascript">
   
     function printDiv(div) {    
    // Create and insert new print section
    //alert(div);return 0;
    var elem = document.getElementById(div);
    var domClone = elem.cloneNode(true);
    var $printSection = document.createElement("div");
    $printSection.id = "printSection";
    $printSection.appendChild(domClone);
    document.body.insertBefore($printSection, document.body.firstChild);

    window.print(); 

    // Clean up print section for future use
    var oldElem = document.getElementById("printSection");
    if (oldElem != null) { oldElem.parentNode.removeChild(oldElem); } 
                          //oldElem.remove() not supported by IE

    return true;
}
    function get_object(id) {
   var object = null;
   if (document.layers) {
    object = document.layers[id];
   } else if (document.all) {
    object = document.all[id];
   } else if (document.getElementById) {
    object = document.getElementById(id);
   }
   return object;
  }
    function pad (str, max) {
  str = str.toString();
  return str.length < max ? pad("0" + str, max) : str;
}
      function get_color_upp()
      {
        document.getElementById("t_color_upp").value = document.getElementById("id_color_upper").options[document.getElementById("id_color_upper").selectedIndex].text;
        //alert(document.getElementById("t_color_upp").value);
      }
      function get_color_low()
      {
        document.getElementById("t_color_low").value = document.getElementById("id_color_lower").options[document.getElementById("id_color_lower").selectedIndex].text;
        //alert(document.getElementById("t_color_low").value);
      }
      function submitt()
      {    
            
            
            var change_date = document.getElementById("change_date").value;
            if(change_date == "")  
            {
              
              /*alert(document.getElementById("lab_case").value+"-"+document.getElementById("f_name").value+"-"+document.getElementById("middle_name").value+"-"+document.getElementById("last_name").value+"-"+document.getElementById("datemask").value+"-"+document.getElementById("id_office").value+"-"+document.getElementById("office_pickup_id").value+"-"+document.getElementById("vip_treatment").value+"-"+document.getElementById("reservation_date_sub").value+"-"+document.getElementById("appmt_date").value+"-"+document.getElementById("doctor_id").value+"-"+document.getElementById("doctor_pickup_id").value+"-"+document.getElementById("id_proth_upper").value+"-"+document.getElementById("id_proth_lower").value+"-"+document.getElementById("doctor_comment").value+"-"+document.getElementById("employee_user_id").value+"-"+document.getElementById("material_up").value+"-"+document.getElementById("material_lower").value);return 0;*/
              var  lab_case = document.getElementById("lab_case").value;
            var name_p = document.getElementById("f_name").value;
            var mid_name_p = document.getElementById("middle_name").value;
            if(mid_name_p == "")
            {
              mid_name_p = "-";
            } 
            var last_name = document.getElementById("last_name").value;
            var dobT = document.getElementById("datemask").value;
            var m=dobT.substring(0, 2);
            var d=dobT.substring(3,5);
            var y=dobT.substring(6,10);
            var dob = y+"-"+m+"-"+d;
            var office_id = document.getElementById("id_office").value;
            var office_pickup_id = document.getElementById("office_pickup_id").value;
            var vip_treatment = 1;
            var reservation_date = document.getElementById("reservation_date_sub").value;
            var appoinment_date = document.getElementById("appmt_date").value;
            var doctor_id = document.getElementById("doctor_id").value;
            jQuery.ajax({
            type: "POST",
            url: "../../controllers/front/get_doctor.php",
            data: {doctor_id: doctor_id},
            // data: {activation: b},
            success: function(response)
            { 
              //alert(response);return 0;
              var array = JSON.parse(response);
              var name_doctor = array[0]["u_name"]+""+array[0]["u_last_name"];
              document.getElementById("doctor").value = name_doctor;
              document.getElementById("doctor_invoice").innerHTML = document.getElementById("doctor").value;
          }
            
          });
            var doctor_pickup_id = document.getElementById("doctor_pickup_id").value;
            var doctor_comment = document.getElementById("doctor_comment").value;
            if (doctor_comment == '') {doctor_comment="-";}
            var employee_user_id = document.getElementById("employee_user_id").value;
           // var employee_comment = document.getElementById("employee_comment").value;
            var id_color_upper = document.getElementById("id_color_upper").value;
            var id_color_lower = document.getElementById("id_color_lower").value;
             var materia_uppe = document.getElementById("material_up").value;
             var materia_lowe = document.getElementById("material_lo").value;
            var upper_dent_val = document.getElementById("id_proth_upper").value;
            var low_dent_val = document.getElementById("id_proth_lower").value;
            var reservation_date_lowe = document.getElementById("reservation_date_lowe").value;
            if(reservation_date_lowe == 0)
            {
              reservation_date_lowe = "0000-00-00";
            }
            var reservation_date_uppe = document.getElementById("reservation_date_uppe").value;
            if(reservation_date_uppe == 0)
            {
              reservation_date_uppe = "0000-00-00";
            }
            var delivery_date_uppe = document.getElementById("delivery_date_uppe").value;
             if(delivery_date_uppe == 0)
            {
               delivery_date_uppe = "0000-00-00";
            }
            var delivery_date_lowe = document.getElementById("delivery_date_lowe").value;
            if(delivery_date_lowe == 0)
            {
               delivery_date_lowe = "0000-00-00";
            }
            
            
            
            var number_t_up = $('#id_t_number_up').val();
            var number_t_low = $('#id_t_number_lo').val();
            var id_lp_ps_up1 = document.getElementById("id_lp_ps_up").value;
            var id_lp_ps_lo1 = document.getElementById("id_lp_ps_lo").value;
           /* $('#id_t_number_up :selected').each(function(i, sel){ 
            alert( $(sel).val() ); 
            });
           /* var strValues = "";
            var count = 0;
            for ( i = 0; i < document.case.id_t_number_up.options.length; i++ ){
           document.case.id_t_number_up.options[i].selected = true;
           if (count == 0) {
            strValues = document.case.id_t_number_up.options[i].value;
          }
          else {
            strValues = strValues + "," + document.case.id_t_number_up.options[i].value;
          }
           count++;
           document.case.t_num_up.value = strValues;
          }*/
          // alert(t_num_up[0]);return 0;
            //var number_t_low = document.getElementById("id_t_number_lo").value;
           //validations-----------------------------------------------------
              if(name_p == "")
              {
                  document.getElementById("f_name").focus();
                  return 0;
              }
              if(last_name == "")
              {
                  document.getElementById("last_name").focus();
                  return 0;
              }
              if(dobT == "")
              {
                  document.getElementById("datemask").focus();
                  return 0;
              }
             // alert(document.getElementById("material_up").options[document.getElementById("material_up").selectedIndex].text);return 0;
              //----------------------------------------------------------------
            jQuery.ajax({
            type: "POST",
            url: "../../controllers/front/insert_case.php",
            data: {lab_case: lab_case, name_p: name_p, mid_name_p: mid_name_p, last_name: last_name, dob: dob, office_id: office_id, office_pickup_id: office_pickup_id, vip_treatment: vip_treatment, reservation_date: reservation_date, appoinment_date: appoinment_date, doctor_id: doctor_id, doctor_pickup_id: doctor_pickup_id,teeth_id_upp: id_color_upper,id_color_lower:id_color_lower, doctor_comment: doctor_comment, employee_user_id: employee_user_id, upper_dent_val: id_lp_ps_up1, low_dent_val: id_lp_ps_lo1, number_t_up: number_t_up,number_t_low:number_t_low,reservation_date_uppe: reservation_date_uppe, reservation_date_lowe: reservation_date_lowe, delivery_date_uppe: delivery_date_uppe, delivery_date_lowe: delivery_date_lowe},
            // data: {activation: b},
            

            success: function(response)
            { 
              //alert(response);return 0;
              var array = JSON.parse(response);
              var patient_id = array[0]["patient_id"];
              var pat_lab_proc_id = array[0]["pat_lab_proc_id"];
              document.getElementById("code5").value = pat_lab_proc_id;
              var patient_id2 = pad(patient_id, 6);
              document.getElementById("code").value = patient_id2;
              
              if(patient_id != ""){
                document.getElementById("case_code_invoice").innerHTML = patient_id2;
                document.getElementById("patient_invoice").innerHTML = document.getElementById("f_name").value+" "+document.getElementById("middle_name").value+" "+document.getElementById("last_name").value;
               // document.getElementById("reservation_date_invoice").innerHTML = document.getElementById("reservation_date_sub").value;
                document.getElementById("finish_date_invoice_upp").innerHTML = document.getElementById("appmt_date").value;
                document.getElementById("finish_date_invoice_low").innerHTML = document.getElementById("appmt_date").value;
                document.getElementById("appo_date_invoice").innerHTML = document.getElementById("appmt_date").value;
                document.getElementById("clinic_invoice").innerHTML = document.getElementById("name_office").value;
                document.getElementById("reservation_date_lo_invoice").innerHTML = document.getElementById("reservation_date_lowe").value;
                document.getElementById("reservation_date_up_invoice").innerHTML = document.getElementById("reservation_date_uppe").value;
                document.getElementById("note_invoice").innerHTML = document.getElementById("doctor_comment").value;
                document.getElementById("color_invoice_upp").innerHTML = document.getElementById("t_color_upp").value;
                document.getElementById("color_invoice_low").innerHTML = document.getElementById("t_color_low").value;



                if(document.getElementById("material_up").value == "")
                {
                     document.getElementById("case_type_upp_invoice").innerHTML = "N/A"; 
                     document.getElementById("reservation_date_up_invoice").innerHTML = "N/A";
                     document.getElementById("color_invoice_upp").innerHTML = "N/A";
                     document.getElementById("finish_date_invoice_upp").innerHTML = "N/A";
                }
                else{
                  document.getElementById("case_type_upp_invoice").innerHTML = document.getElementById("id_proth_upper").options[document.getElementById("id_proth_upper").selectedIndex].text+"("+document.getElementById("material_up").options[document.getElementById("material_up").selectedIndex].text+")";
                }
                

                
                document.getElementById("case_type_low_invoice").innerHTML = document.getElementById("id_proth_lower").options[document.getElementById("id_proth_lower").selectedIndex].text+"("+document.getElementById("material_lo").options[document.getElementById("material_lo").selectedIndex].text+")";
                if(document.getElementById("material_lo").value == "-Select-")
                {
                     
                     document.getElementById("case_type_low_invoice").innerHTML = "N/A"; 
                     document.getElementById("reservation_date_lo_invoice").innerHTML = "N/A";
                     document.getElementById("color_invoice_low").innerHTML = "N/A";
                     document.getElementById("finish_date_invoice_low").innerHTML = "N/A";
                }
                else{
                  document.getElementById("case_type_low_invoice").innerHTML = document.getElementById("id_proth_lower").options[document.getElementById("id_proth_lower").selectedIndex].text+"("+document.getElementById("material_lo").options[document.getElementById("material_lo").selectedIndex].text+")";
                }
                get_object("barcode2").innerHTML=DrawCode39Barcode(patient_id2,0);
                /*JsBarcode("#barcode2", document.getElementById("code").value, {
                format:"msi",
                displayValue:true,
                fontSize:24,
        
                lineColor: "#fdb813"
                });*/
              jQuery('#qrcodeCanvas').qrcode({
        
		          text	: document.getElementById("code").value
	             });
                /*jQuery.ajax({
            type: "POST",
            url: "../../controllers/front/get_case_info.php",
            data: {pat_lab_proc_id: pat_lab_proc_id},
            // data: {activation: b},
            

            success: function(response)
            { 
              //alert(response);return 0;
              var array = JSON.parse(response);
              
          }
            
          });*/
              $('#fullCalModal').modal('show');
            }
          }
            
          });
              
            }
            else
            {
              var appo_date = document.getElementById("app_date_hidden").value;
              var year = appo_date.substr(0, 4);
              var mes = appo_date.substr(5, 2);
              var day = appo_date.substr(8, 2);
              var substr_date = mes+"/"+day+"/"+year;
            
             // alert(year+"-"+mes+"-"+day);return 0;
             
              if (change_date<=substr_date) {
               
                $('#fullCalModal2').modal('show');
              }
            }
         
             
    
           /* var  lab_case = document.getElementById("lab_case").value;
            var name_p = document.getElementById("f_name").value;
            var mid_name_p = document.getElementById("middle_name").value;
            var last_name = document.getElementById("last_name").value;
            var dob = document.getElementById("datemask").value;
            var office_id = document.getElementById("id_office").value;
            var office_pickup_id = document.getElementById("office_pickup_id").value;
            var vip_treatment = document.getElementById("vip_treatment").value;
            var reservation_date = document.getElementById("reservation_date_sub").value;
            var appoinment_date = document.getElementById("appmt_date").value;
            var doctor_id = document.getElementById("doctor_id").value;
            var doctor_pickup_id = document.getElementById("doctor_pickup_id").value;
            var doctor_comment = document.getElementById("doctor_comment").value;
            var employee_user_id = document.getElementById("employee_user_id").value;
            var employee_comment = document.getElementById("employee_comment").value;
            var color_id = document.getElementById("id_color").value;
            var upper_dent_val = document.getElementById("id_proth_upper").value;
            var low_dent_val = document.getElementById("id_proth_lower").value;
            var number_t = document.getElementById("id_t_number_up").value;
            jQuery.ajax({
            type: "POST",
            url: "../../controllers/front/insert_case.php",
            data: {lab_case: lab_case, name_p: name_p, mid_name_p: mid_name_p, last_name: last_name, dob: dob, office_id: office_id, office_pickup_id: office_pickup_id, vip_treatment: vip_treatment, reservation_date: reservation_date, appoinment_date: appoinment_date, doctor_id: doctor_id, doctor_pickup_id: doctor_pickup_id, doctor_comment: doctor_comment, employee_user_id: employee_user_id, employee_comment: employee_comment, color_id: color_id, upper_dent_val: upper_dent_val, low_dent_val: low_dent_val, number_t: number_t },
            // data: {activation: b},

            success: function(response){ alert(response);return 0 ;
            var array = JSON.parse(response);
           var miSelect2 = document.getElementById("material_up");
           for(var i=0;i<array.length;i++){ 
            }
        var aTag = document.createElement('option');
           aTag.setAttribute('value',array[i]["id_material"]);
              if(langu == 'es'){
               aTag.innerHTML = array[i]["lp_material_es"];
              }
              if (langu == 'en') {aTag.innerHTML = array[i]["lp_material_en"];}
           
          
            
           
           miSelect2.appendChild(aTag);
     }
            }
          });*/
      }
      function submit()
      {
           // alert("OK");
           document.getElementById("insert_office").submit();
      }
       function submitTypeUser()
      {
           // alert("OK");
           document.getElementById("insert_type_user").submit();
      }
       function showAddress()
      {
          // alert(document.getElementById("user_type").value);
          if(document.getElementById("user_type").value == 6)
          {
                  document.getElementById("add_ress").style.display = "block";
          }
          else
          {
                  document.getElementById("add_ress").style.display = "none";
          }
           
          
      }
      function showChange()
      {
        document.getElementById("hidden_div").style.display = "block";
      }
      function showChange2()
      {
        document.getElementById("hidden_div").style.display = "none";
      }
      function showMe1()
      { 
        document.getElementById('lol').style.display = 'block';
        document.getElementById('lol2').style.display = 'none';
      }
      function showMe2()
      {
             document.getElementById('lol').style.display = 'none';
             document.getElementById('lol2').style.display = 'block';
             document.getElementById('scan_case').focus();
      }
      
      function selectOffice1()
      {
         
             document.getElementById('select_office').style.display = 'none';
             document.getElementById('select_doctor').style.display = 'none';
         
         
      }
      function selectOffice2()
      {
        
       

             document.getElementById('select_office').style.display = 'block';
             document.getElementById('select_doctor').style.display = 'block';
         
      }
      function show_dent_type()
      {
          var val=document.getElementById("id_proth").value;
          if (val == '1') {
            document.getElementById("dent_type").style.display = "block";
          }
          if (val == '2') {
            document.getElementById("dent_type").style.display = "none";
            document.getElementById("t_color").style.display = 'block';
          }   
      }
     /* function show_number_tooth()
      {  
            var val2 = document.getElementById("id_arch").options[document.getElementById("id_arch").selectedIndex].text;
            //alert(val2);return 0;
            if(number == '16' && val2 == '2')
            {
                document.getElementById("t_number1").style.display = "block";
                document.getElementById("t_number2").style.display = "none";
            }
      }*/
      function show_other_upper()
      {  
            var val2 = document.getElementById("id_proth_upper").value;
            if(val2 == 1 || val2 == 3)
            {
                document.getElementById("material_upper").style.display = "block";
                document.getElementById("number_upper").style.display = "none";
               // document.getElementById("hidden_steps_color_upper").style.display = "block";
                
            }
            if(val2 == 2)
            {
                document.getElementById("material_upper").style.display = "none";
                document.getElementById("number_upper").style.display = "block";
                document.getElementById("material_up_temp").value = '24';
               // document.getElementById("hidden_steps_color_upper").style.display = "block";
                //$('#id_proth_lower').attr('disabled', true);
                //document.getElementById("id_proth_lower").style.display = "none";
                 var mat_up = 24;
           var val2 = document.getElementById("id_proth_upper").value;
           var langu = document.getElementById("language").value;
           document.getElementById("id_steps_upper").options.length=0;
           var arch = 1;
           /* jQuery.ajax({
            type: "POST",
            url: "../../controllers/front/get_steps.php",
            data: {id_proth: val2, arch2: arch, material_up: mat_up},
            // data: {activation: b},

            success: function(response){ //alert(response);return 0;
            var array3 = JSON.parse(response);
           var miSelect3 = document.getElementById("id_steps_upper");
           for(var i=0;i<array3.length;i++){ 
        var aTag3 = document.createElement('option');
           aTag3.setAttribute('value',array3[i]["id_procedure_step"]);
              if(langu == 'es'){
               aTag3.innerHTML = array3[i]["name_es"];
              }
              if (langu == 'en') {aTag3.innerHTML = array3[i]["name_en"];}
           
          
            
           
           miSelect3.appendChild(aTag3);
     }
            }
          });*/
            }
            if(val2 == '-Select-')
            {
                document.getElementById("material_upper").style.display = "none";
                document.getElementById("number_upper").style.display = "none";
               // document.getElementById("hidden_steps_color_upper").style.display = "none";
            }  
            document.getElementById("material_up").options.length=0;
            var langu = document.getElementById("language").value;var arch = 1;
            jQuery.ajax({
            type: "POST",
            url: "../../controllers/front/get_material.php",
            data: {id_proth: val2, arch2: arch},
            // data: {activation: b},

            success: function(response){ 
            var array = JSON.parse(response);
           var miSelect2 = document.getElementById("material_up");
          var aTag1 = document.createElement('option');          
           aTag1.setAttribute('value',0);
           aTag1.innerHTML = "-Select-";
           miSelect2.appendChild(aTag1);
           for(var i=0;i<array.length;i++){ 
            var aTag = document.createElement('option');
                   
           aTag.setAttribute('value',array[i]["id_material"]);
              if(langu == 'es'){
               aTag.innerHTML = array[i]["lp_material_es"];
              }
              if (langu == 'en') {aTag.innerHTML = array[i]["lp_material_en"];}
           
          
            
           
           miSelect2.appendChild(aTag);
     }
            }
          });
           // var mat_up = document.getElementById("material_up").value;
            
      }
      function getColorData()
      {
            var step_upp = $('#id_steps_upper').val();
           /* jQuery.ajax({
            type: "POST",
            url: "../../controllers/front/get_color.php",
            data: {id_step: step_upp},
            // data: {activation: b},

            success: function(response){ //alert(response);return 0;
            var arrayColor = JSON.parse(response);
            var color = arrayColor[0]['requires_teeth_data'];
            if(color == 0)
            {
              document.getElementById("sd").style.display = "block";
              //document.getElementById("id_color_upper").disabled = true; 
                //$("#id_color_upper").prop('disabled', 'disabled');$("select").attr("disabled", "disabled");
                //$("#id_color_upper").attr('disabled','disabled');
               // $('#id_color_upper').prop('disabled', false);
               // $("#id_color_upper").attr('selected','selected');
            }
            else
            {
              document.getElementById("sd").style.display = "none";
            }
           // var miSelectColor = document.getElementById("id_color_upper");
           
            }
          });*/
      }
       function getColorData2()
      {
            var step_upp = $('#id_steps_lower').val();
           /* jQuery.ajax({
            type: "POST",
            url: "../../controllers/front/get_color.php",
            data: {id_step: step_upp},
            // data: {activation: b},

            success: function(response){ //alert(response);return 0;
            var arrayColor = JSON.parse(response);
            var color = arrayColor[0]['requires_teeth_data'];
            if(color == 0)
            {
              document.getElementById("sd2").style.display = "block";
              //document.getElementById("id_color_upper").disabled = true; 
                //$("#id_color_upper").prop('disabled', 'disabled');$("select").attr("disabled", "disabled");
                //$("#id_color_upper").attr('disabled','disabled');
               // $('#id_color_upper').prop('disabled', false);
               // $("#id_color_upper").attr('selected','selected');
            }
            else
            {
              document.getElementById("sd2").style.display = "none";
            }
           // var miSelectColor = document.getElementById("id_color_upper");
           
            }
          });*/
      }
      function show_steps()
      {
           var mat_up = $('#material_up').val();
           document.getElementById("material_up_temp").value = mat_up;
           var val2 = document.getElementById("id_proth_upper").value;
           var langu = document.getElementById("language").value;
           document.getElementById("id_steps_upper").options.length=0;
           var arch = 1;
           /* jQuery.ajax({
            type: "POST",
            url: "../../controllers/front/get_steps.php",
            data: {id_proth: val2, arch2: arch, material_up: mat_up},
            // data: {activation: b},

            success: function(response){ //alert(response);return 0;
            var array3 = JSON.parse(response);
           var miSelect3 = document.getElementById("id_steps_upper");
           var aTag3 = document.createElement('option');          
           aTag3.setAttribute('value',0);
           aTag3.innerHTML = "-Select-";
           miSelect3.appendChild(aTag3);
           for(var i=0;i<array3.length;i++){ 
        var aTag33 = document.createElement('option');
           aTag33.setAttribute('value',array3[i]["id_procedure_step"]);
              if(langu == 'es'){
               aTag33.innerHTML = array3[i]["name_es"];
              }
              if (langu == 'en') {aTag33.innerHTML = array3[i]["name_en"];}
           
          
            
           
           miSelect3.appendChild(aTag33);
     }
            }
          });*/
      }
       function show_steps2()
      {
           
          
          // $('#id_steps_lower').removeAttr('disabled');
         // $("#id_steps_lower").removeClass( "form-control input-lg ui fluid disabled dropdown" ).addClass( "form-control input-lg ui fluid dropdown" );
          // $("#id_steps_lower").removeClass("disabled");
           //$('#id_steps_lower').attr('disabled', false);
           var mat_lo = $('#material_lo').val();
            document.getElementById("material_up_temp").value = mat_lo;
           var val2 = document.getElementById("id_proth_lower").value;
           var langu = document.getElementById("language").value;
           document.getElementById("id_steps_lower").options.length=0;
           var arch = 2;
           /* jQuery.ajax({
            type: "POST",
            url: "../../controllers/front/get_steps.php",
            data: {id_proth: val2, arch2: arch, material_up: mat_lo},
            // data: {activation: b},

            success: function(response){ //alert(response);return 0;
            var array3 = JSON.parse(response);
           var miSelect3 = document.getElementById("id_steps_lower");
           var aTag3 = document.createElement('option');          
           aTag3.setAttribute('value',0);
           aTag3.innerHTML = "-Select-";
           miSelect3.appendChild(aTag3);
           for(var i=0;i<array3.length;i++){ 
        var aTag34 = document.createElement('option');
           aTag34.setAttribute('value',array3[i]["id_procedure_step"]);
              if(langu == 'es'){
               aTag34.innerHTML = array3[i]["name_es"];
              }
              if (langu == 'en') {aTag34.innerHTML = array3[i]["name_en"];}
           
          
            
           
           miSelect3.appendChild(aTag34);
     }
            }
          });*/
      }
      function show_other_lower()
      {  
            var val2 = document.getElementById("id_proth_lower").value;var arch = 2;
            if(val2 == 1 || val2 == 3)
            {
                document.getElementById("material_lower").style.display = "block";
                document.getElementById("number_lower").style.display = "none";
            }
            if(val2 == 2)
            {
                document.getElementById("material_lower").style.display = "none";
                document.getElementById("number_lower").style.display = "block";
                document.getElementById("material_up_temp").value = '24';

                var mat_up = 24;
           var val2 = document.getElementById("id_proth_lower").value;
           var langu = document.getElementById("language").value;
           document.getElementById("id_steps_lower").options.length=0;
           var arch = 2;
            jQuery.ajax({
            type: "POST",
            url: "../../controllers/front/get_steps.php",
            data: {id_proth: val2, arch2: arch, material_up: mat_up},
            // data: {activation: b},

            success: function(response){ //alert(response);return 0;
            var array3 = JSON.parse(response);
           var miSelect3 = document.getElementById("id_steps_lower");
           for(var i=0;i<array3.length;i++){ 
        var aTag3 = document.createElement('option');
           aTag3.setAttribute('value',array3[i]["id_procedure_step"]);
              if(langu == 'es'){
               aTag3.innerHTML = array3[i]["name_es"];
              }
              if (langu == 'en') {aTag3.innerHTML = array3[i]["name_en"];}
           
          
            
           
           miSelect3.appendChild(aTag3);
     }
            }
          });
            }
             if(val2 == '-Select-')
            {
                document.getElementById("material_lower").style.display = "none";
            } 
           document.getElementById("material_lo").options.length=0;
            var langu = document.getElementById("language").value;
            jQuery.ajax({
            type: "POST",
            url: "../../controllers/front/get_material.php",
            data: {id_proth: val2, arch2: arch},
            // data: {activation: b},

            success: function(response){
            var array = JSON.parse(response);
           var miSelect2 = document.getElementById("material_lo");
           var aTag1 = document.createElement('option');          
           aTag1.setAttribute('value',0);
           aTag1.innerHTML = "-Select-";
           miSelect2.appendChild(aTag1);
           for(var i=0;i<array.length;i++){ 
        var aTag = document.createElement('option');
           aTag.setAttribute('value',array[i]["id_material"]);
              if(langu == 'es'){
               aTag.innerHTML = array[i]["lp_material_es"];
              }
              if (langu == 'en') {aTag.innerHTML = array[i]["lp_material_en"];}
           
          
            
           
           miSelect2.appendChild(aTag);
     }
            }
          });
      }
      
     /* function show_color_tooth()
      {
           var c = document.getElementById("id_steps").value;
           if(c == 1)
           {

              document.getElementById("id_color").disabled = false;
           }
           if(c == 0)
           {
              document.getElementById("id_color").selectedIndex = 0;
              document.getElementById("id_color").disabled = true;

           }
      }*/
      
      function rush()
      {
        document.getElementById("s").disabled = false;
        var langu = document.getElementById("language").value;
        var rush = 1;var cant_steps = 1;var crown_flag = 0;
        var id_group = document.getElementById("id_group").value;
        var upper_dent = document.getElementById("id_proth_upper").value;
        var low_dent = document.getElementById("id_proth_lower").value;
        var id_steps_uppe = document.getElementById("id_steps_upper").value;
        var id_material_up = 0;
        var id_material_low = 0;
            var id_steps_lowe = document.getElementById("id_steps_lower").value;
        //var id_material_up = 0; var id_material_low = 0;
        /*if(upper_dent != "-Select-" && low_dent != "-Select-" && upper_dent != 2  && low_dent != 2)
        {
            cant_steps = 2;
        }*/
        if (upper_dent !="-Select-") {
            id_material_up = document.getElementById("material_up").value;
            if(upper_dent == '2'){
               id_material_up = '24';
                jQuery.ajax({
               type: "POST",
               url: "../../controllers/front/get_lpps.php",
               data: {material_id: id_material_up, prothesis_type_id: upper_dent, arch: 1, step_id: id_steps_uppe},
               // data: {activation: b},
            

              success: function(response)
              { 
                
                var array = JSON.parse(response);
                document.getElementById("id_lp_ps_up").value = array[0]['id_lp_ps']; 
               // var id_lp_ps_up = array[0]['id_lp_ps'];              
              }
            
              });
            }
           
        }
        if (low_dent != "-Select-") {
            id_material_low = document.getElementById("material_up_temp").value;
            if(low_dent == '2'){
               id_material_low = '24';
               jQuery.ajax({
               type: "POST",
               url: "../../controllers/front/get_lpps.php",
               data: {material_id: id_material_low, prothesis_type_id: low_dent, arch: 2, step_id: id_steps_lowe},
               // data: {activation: b},
            

              success: function(response)
              { 
                //alert(response);return 0;
                var array = JSON.parse(response);
                document.getElementById("id_lp_ps_lo").value = array[0]['id_lp_ps'];
                var id_lp_ps_lo = array[0]['id_lp_ps'];
                //alert(array[0]['id_lp_ps']);return 0;
              }
            
              });
            }
            
        }
        if (upper_dent == 2) 
        {
           var test = $("#id_t_number_up").val();
           cant_steps = test.length; 
           crown_flag = 1;
           id_material_up = document.getElementById("material_up_temp").value;
           jQuery.ajax({
               type: "POST",
               url: "../../controllers/front/get_lpps.php",
               data: {material_id: id_material_up, prothesis_type_id: upper_dent, arch: 1, step_id: id_steps_uppe},
               // data: {activation: b},
            

              success: function(response)
              { 
                
                var array = JSON.parse(response);
                document.getElementById("id_lp_ps_up").value = array[0]['id_lp_ps']; 
               // var id_lp_ps_up = array[0]['id_lp_ps'];              
              }
            
              });

        }
        if(low_dent == 2)
        {
           var test = $("#id_t_number_lo").val();
           cant_steps = test.length; 
           crown_flag = 1;
           id_material_low = document.getElementById("material_up_temp").value;
           jQuery.ajax({
               type: "POST",
               url: "../../controllers/front/get_lpps.php",
               data: {material_id: id_material_low, prothesis_type_id: low_dent, arch: 2, step_id: id_steps_lowe},
               // data: {activation: b},
            

              success: function(response)
              { 
                //alert(response);return 0;
                var array = JSON.parse(response);
                document.getElementById("id_lp_ps_lo").value = array[0]['id_lp_ps'];
                var id_lp_ps_lo = array[0]['id_lp_ps'];
                //alert(array[0]['id_lp_ps']);return 0;
              }
            
              });
        }
       /* if (crown_flag == 1) {
           
           var id_material_low = 0;
       
        }
        if(crown_flag == 0){

           var id_material_up = document.getElementById("material_up").value;
           var id_material_low = 0;
           low_dent = 0;
           //var id_material_low = document.getElementById("material_lo").value;
        }*/
        if (upper_dent == "-Select-") {
          upper_dent = 0;
          id_material_up = 0;
          //cant_steps = 1;
        }
        if (low_dent == "-Select-") {
          low_dent = 0;
          id_material_low = 0;
          //cant_steps = 1;
        }
        
        var id_steps_upp = document.getElementById("id_steps_upper").value;
        var text_steps_upp = document.getElementById("id_steps_upper").options[document.getElementById("id_steps_upper").selectedIndex].text;
        var id_steps_lo = document.getElementById("id_steps_lower").value;
        var text_steps_lo = document.getElementById("id_steps_lower").options[document.getElementById("id_steps_lower").selectedIndex].text;
        if(id_steps_upp == "-Select-")
        {
              id_steps_upp = 0;
        }
         if(id_steps_lo == "-Select-")
        {
              id_steps_lo = 0;
        }//alert(id_material_low);return 0;
        //alert(document.getElementById("id_lp_ps_up").value);return 0;

        jQuery.ajax({
     type: "POST",
     url: "../../controllers/front/get_result.php",
     data: {id_proc_step: id_steps_upp,id_proc_steps_lo:id_steps_lo,id_proc_steps_lo: id_steps_lo,group_id: id_group,cant_steps: cant_steps,material_upp: id_material_up,material_low: id_material_low,proth_type_upp:upper_dent,proth_type_low:low_dent},
      // data: {activation: b},

      success: function(response){//alert(response);return 0;
        var array = JSON.parse(response);
        document.getElementById("reservation_date").innerHTML = array[0]['rush_date_upp'];
        document.getElementById("reservation_date_sub").value = array[0]['rush_date_upp'];
        document.getElementById("reservation_date_uppe").value = array[0]['rush_date_upp'];
        document.getElementById("finish_date").innerHTML = array[0]['rush_finish_date_upp'];
        document.getElementById("delivery_date_uppe").value = array[0]['rush_finish_date_upp'];
        var suma = parseInt(array[0]['upper_proc_cost'])+parseInt(array[0]['lower_proc_cost']);
        if (upper_dent == 2) {
          if(langu == 'es')
          {
             document.getElementById("price_upp").innerHTML = "$"+array[0]['upper_proc_cost']+"(Por Unidad)";
          }
          if (langu == 'en') {
            document.getElementById("price_upp").innerHTML = "$"+array[0]['upper_proc_cost']+"(Per Unit)";
          }
          
          suma = suma * cant_steps;
        }
        else{
          document.getElementById("price_upp").innerHTML = "$"+array[0]['upper_proc_cost'];
        }
        if (low_dent == 2) {
          if(langu == 'es')
          {
             document.getElementById("price_low").innerHTML = "$"+array[0]['lower_proc_cost']+"(Por Unidad)";
          }
          if (langu == 'en') {
            document.getElementById("price_low").innerHTML = "$"+array[0]['lower_proc_cost']+"(Per Unit)";
          }
          
          suma = suma * cant_steps;
        }
       document.getElementById("reservation_date_lo").innerHTML = array[0]['rush_date_low'];
       document.getElementById("reservation_date_lowe").value = array[0]['rush_date_low'];
       document.getElementById("finish_date_lo").innerHTML = array[0]['rush_finish_date_low'];
       document.getElementById("delivery_date_lowe").value = array[0]['rush_finish_date_low'];
        document.getElementById("price_low").innerHTML = "$"+array[0]['lower_proc_cost'];
        
        document.getElementById("app_date").innerHTML = " "+array[0]['appoinment_date'];
        document.getElementById("appmt_date").value = array[0]['appoinment_date'];
        document.getElementById("app_date_hidden").value = array[0]['appoinment_date'];
        //document.getElementById("appoinment_date").innerHTML = array[0]['rush_appoinment_date'];
        
        var suma2 = parseInt(array[0]['upper_rush_cost'])+parseInt(array[0]['lower_rush_cost']);
        var total = suma + suma2;
        //document.getElementById("subtotal").innerHTML = suma;
        document.getElementById("rush").innerHTML = "$"+suma2;
        document.getElementById("total").innerHTML = "$"+total;
        document.getElementById("sub_desc").innerHTML= "$"+suma;
       /*if(low_dent == 1)
       {
           document.getElementById("sub_desc2").innerHTML= "Partial Lower Denture("+text_steps_upp+") $"+array[0]['lower_proc_cost'];
       }  
       if(low_dent == 3)
       {
           document.getElementById("sub_desc2").innerHTML= "Complete Lower Denture("+text_steps_upp+") $"+array[0]['lower_proc_cost'];
       }    
       if(upper_dent == 1)
       {
           document.getElementById("sub_desc").innerHTML= "Partial Upper Denture("+text_steps_upp+") $"+array[0]['upper_proc_cost'];
       }  
       if(upper_dent == 3)
       {
           document.getElementById("sub_desc").innerHTML= "Complete Lower Denture("+text_steps_upp+") $"+array[0]['upper_proc_cost'];
       }*/  
    }
});
      }
      function standar()
      {
        document.getElementById("s").disabled = false;
        var langu = document.getElementById("language").value;
        var rush = 0;var cant_steps = 1;var crown_flag = 0;
        var id_group = document.getElementById("id_group").value;
        var upper_dent = document.getElementById("id_proth_upper").value;
        var low_dent = document.getElementById("id_proth_lower").value;
        var id_material_up = document.getElementById("material_up_temp").value; var id_material_low = document.getElementById("material_up_temp").value;
        var id_steps_uppe = document.getElementById("id_steps_upper").value;
            var id_steps_lowe = document.getElementById("id_steps_lower").value;
        /*if(upper_dent != "-Select-" && low_dent != "-Select-" && upper_dent != 2  && low_dent != 2)
        {
            cant_steps = 2;
        }*/
        if (upper_dent !="-Select-") {
            id_material_up = document.getElementById("material_up").value;
            jQuery.ajax({
               type: "POST",
               url: "../../controllers/front/get_lpps.php",
               data: {material_id: id_material_up, prothesis_type_id: upper_dent, arch: 1, step_id: id_steps_uppe},
               // data: {activation: b},
            

              success: function(response)
              { 
               // alert(response);return 0;
                var array = JSON.parse(response);
                document.getElementById("id_lp_ps_up").value = array[0]['id_lp_ps']; 
               // var id_lp_ps_up = array[0]['id_lp_ps'];
                //alert(array[0]['id_lp_ps']);return 0;
              }
            
              });
        }
        if (low_dent != "-Select-") {
            id_material_low = document.getElementById("material_lo").value;
            jQuery.ajax({
               type: "POST",
               url: "../../controllers/front/get_lpps.php",
               data: {material_id: id_material_low, prothesis_type_id: low_dent, arch: 2, step_id: id_steps_lowe},
               // data: {activation: b},
            

              success: function(response)
              { 
                
                var array = JSON.parse(response);
                document.getElementById("id_lp_ps_lo").value = array[0]['id_lp_ps'];
                var id_lp_ps_lo = array[0]['id_lp_ps'];
                //alert(array[0]['id_lp_ps']);return 0;
              }
            
              });
        }
        if (upper_dent == 2) 
        {
           var test = $("#id_t_number_up").val();
           cant_steps = test.length; 
           crown_flag = 1;
           id_material_up = document.getElementById("material_up_temp").value;

        }
        if(low_dent == 2)
        {
           var test = $("#id_t_number_lo").val();
           cant_steps = test.length; 
           crown_flag = 1;
           id_material_low = document.getElementById("material_up_temp").value;
        }
       /* if (crown_flag == 1) {
           
           var id_material_low = 0;
       
        }
        if(crown_flag == 0){

           var id_material_up = document.getElementById("material_up").value;
           var id_material_low = 0;
           low_dent = 0;
           //var id_material_low = document.getElementById("material_lo").value;
        }*/
        if (upper_dent == "-Select-") {
          upper_dent = 0;
          //cant_steps = 1;
        }
        if (low_dent == "-Select-") {
          low_dent = 0;
          //cant_steps = 1;
        }
        
        var id_steps_upp = document.getElementById("id_steps_upper").value;
        var text_steps_upp = document.getElementById("id_steps_upper").options[document.getElementById("id_steps_upper").selectedIndex].text;
        var id_steps_lo = document.getElementById("id_steps_lower").value;
        var text_steps_lo = document.getElementById("id_steps_lower").options[document.getElementById("id_steps_lower").selectedIndex].text;
        if(id_steps_upp == "-Select-")
        {
              id_steps_upp = 0;
        }
         if(id_steps_lo == "-Select-")
        {
              id_steps_lo = 0;
        }
        jQuery.ajax({
     type: "POST",
     url: "../../controllers/front/get_result.php",
     data: {id_proc_step: id_steps_upp,id_proc_steps_lo:id_steps_lo,id_proc_steps_lo: id_steps_lo,group_id: id_group,cant_steps: cant_steps,material_upp: id_material_up,material_low: id_material_low,proth_type_upp:upper_dent,proth_type_low:low_dent},
      // data: {activation: b},

      success: function(response){//alert(response);return 0;
        var array = JSON.parse(response);
        document.getElementById("reservation_date").innerHTML = array[0]['available_date_upp'];
        document.getElementById("reservation_date_uppe").value = array[0]['available_date_upp'];
        document.getElementById("finish_date").innerHTML = array[0]['finish_date_upp'];
        document.getElementById("delivery_date_uppe").value = array[0]['finish_date_upp'];
        document.getElementById("price_upp").innerHTML = "$"+array[0]['upper_proc_cost'];
         var suma = parseInt(array[0]['upper_proc_cost'])+parseInt(array[0]['lower_proc_cost']);
        if (upper_dent == 2) {
          if(langu == 'es')
          {
             document.getElementById("price_upp").innerHTML = "$"+array[0]['upper_proc_cost']+"(Por Unidad)";
          }
          if (langu == 'en') {
            document.getElementById("price_upp").innerHTML = "$"+array[0]['upper_proc_cost']+"(Per Unit)";
          }
          
          suma = suma * cant_steps;
        }
        else{
          document.getElementById("price_upp").innerHTML = "$"+array[0]['upper_proc_cost'];
        }
        if (low_dent == 2) {
          if(langu == 'es')
          {
             document.getElementById("price_low").innerHTML = "$"+array[0]['lower_proc_cost']+"(Por Unidad)";
          }
          if (langu == 'en') {
            document.getElementById("price_low").innerHTML = "$"+array[0]['lower_proc_cost']+"(Per Unit)";
          }
          
          suma = suma * cant_steps;
        }
       document.getElementById("reservation_date_lo").innerHTML = array[0]['available_date_low'];
       document.getElementById("reservation_date_lowe").value = array[0]['available_date_low'];
       document.getElementById("finish_date_lo").innerHTML = array[0]['finish_date_low'];
       document.getElementById("delivery_date_lowe").value = array[0]['finish_date_low'];
        document.getElementById("price_low").innerHTML = "$"+array[0]['lower_proc_cost'];
        
        document.getElementById("app_date").innerHTML = " "+array[0]['appoinment_date'];
        document.getElementById("appmt_date").value = array[0]['appoinment_date'];
        document.getElementById("app_date_hidden").value = array[0]['appoinment_date'];
        //document.getElementById("appoinment_date").innerHTML = array[0]['rush_appoinment_date'];
        
        var suma2 = 0;
        var total = suma + suma2;
        //document.getElementById("subtotal").innerHTML = suma;
        document.getElementById("rush").innerHTML = "$"+suma2;
        document.getElementById("total").innerHTML = "$"+total;
        document.getElementById("sub_desc").innerHTML= "$"+suma;
       /*if(low_dent == 1)
       {
           document.getElementById("sub_desc2").innerHTML= "Partial Lower Denture("+text_steps_upp+") $"+array[0]['lower_proc_cost'];
       }  
       if(low_dent == 3)
       {
           document.getElementById("sub_desc2").innerHTML= "Complete Lower Denture("+text_steps_upp+") $"+array[0]['lower_proc_cost'];
       }    
       if(upper_dent == 1)
       {
           document.getElementById("sub_desc").innerHTML= "Partial Upper Denture("+text_steps_upp+") $"+array[0]['upper_proc_cost'];
       }  
       if(upper_dent == 3)
       {
           document.getElementById("sub_desc").innerHTML= "Complete Lower Denture("+text_steps_upp+") $"+array[0]['upper_proc_cost'];
       }*/  
    }
});
      }
    </script>
    <script type="text/javascript">
      function s2()
      {
          // alert(document.getElementById('scan_case').value);return 0;
           var c = document.getElementById('scan_case').value;
          
           jQuery.ajax({
           type: "POST",
           url: "../../controllers/front/case_details.php",
           data: {id_case: c},
           success: function(response){
           amount_response=response;
           document.getElementById('details_name').value = amount_response;
              }
           }); 
      }
      function list_services()
      {
           <?php
            if($lang == 'es')
            {
               ?>var lang='es';<?php 
            }
            if($lang == 'en')
            {
               ?>var lang='en';<?php
            }
            ?>
           var id_proc = document.getElementById("id_proc").value;
           document.getElementById("id_service").options.length=0;
           jQuery.ajax({
           type: "POST",
           url: "../../controllers/front/get_services.php",
           data: {id_proc: id_proc},
           success: function(response){
            var array = JSON.parse(response);
           var miSelect2 = document.getElementById("id_service");
           for(var i=0;i<array.length;i++){ 
        var aTag = document.createElement('option');
           aTag.setAttribute('value',array[i]["id_procedure_step"]);
           
               aTag.innerHTML = array[i]["name_en"];
           
          
            
           
           miSelect2.appendChild(aTag);
     }
           
           
           //document.getElementById('details_name').value = amount_response;
              }
           }); 
      }
</script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
  fieldset 
  {
    border: 1px solid #ddd !important;
    margin: 0;
    xmin-width: 0;
    padding: 10px;       
    position: relative;
    border-radius:4px;
    background-color:#f5f5f5;
    padding-left:10px!important;
  } 
  
    legend
    {
      font-size:14px;
      font-weight:bold;
      margin-bottom: 0px; 
      width: 50%; 
      border: 1px solid #ddd;
      border-radius: 4px; 
      padding: 5px 5px 5px 10px; 
      background-color: #ffffff;
    }
  .modal.modal-wide .modal-dialog {
  width: 120%;
}
    input[type=text]:focus {
 border-color: rgba(191, 30, 46, 1) !important;
 box-shadow: 6px 6px 6px rgba(0, 0, 0, 0) inset, 6px 6px 6px rgba(0, 0, 0, 0) !important;
}
input[type=password]:focus {
 border-color: rgba(191, 30, 46, 1) !important;
 box-shadow: 6px 6px 6px rgba(0, 0, 0, 0) inset, 6px 6px 6px rgba(0, 0, 0, 0) !important;
}
input[type=email]:focus {
 border-color: rgba(191, 30, 46, 1) !important;
 box-shadow: 6px 6px 6px rgba(0, 0, 0, 0) inset, 6px 6px 6px rgba(0, 0, 0, 0) !important;
}
textarea:focus {
 border-color: rgba(191, 30, 46, 1) !important;
 box-shadow: 6px 6px 6px rgba(0, 0, 0, 0) inset, 6px 6px 6px rgba(0, 0, 0, 0) !important;
}
select:focus {
 border-color: rgba(191, 30, 46, 1) !important;
 box-shadow: 6px 6px 6px rgba(0, 0, 0, 0) inset, 6px 6px 6px rgba(0, 0, 0, 0) !important;
}
input[type=select]:focus {
 border-color: rgba(191, 30, 46, 1) !important;
 box-shadow: 6px 6px 6px rgba(0, 0, 0, 0) inset, 6px 6px 6px rgba(0, 0, 0, 0) !important;
}
input, input[type="text"]{
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px ;
    border-radius: 4px ;

    
}
.border {
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px ;
    border-radius: 4px ;
}
  </style>


</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
 <?php //include("../templates/menu.php"); 
   $lang=$_GET["lang"];
   if($lang == 'es'){
        include("../assets/lang/es.php");
        }
        if($lang == 'en')
        {
          include("../assets/lang/en.php"); 
        }

?>
  <?php include("../templates/header_fd.php"); ?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
        
      <h1 style="color: #959594 !important">
        <?php echo $new_pat_proc;?>
        <!--small>Laboratorios/Empleados</small-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i><?php echo $front_desk;?></a></li>
        <li class="active"><?php echo $new_pat_proc;?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form name="case" id="case" method="POST" action="" role="form" >
        <input type="hidden" name="id_group" id="id_group" value="<?php echo $id_group; ?>">
        <input type="hidden" name="language" id="language" value="<?php echo $lang; ?>">
        <input type="hidden" name="lab_case" id="lab_case" value="0">
        <input type="hidden" name="id_office" id="id_office" value="<?php echo $id_office; ?>">
        <input type="hidden" name="office_pickup_id" id="office_pickup_id" value="0">
        <input type="hidden" name="vip_treatment" id="vip_treatment" value="0">
        <input type="hidden" name="reservation_date_sub" id="reservation_date_sub" value="0000-00-00">
        <input type="hidden" name="reservation_date_uppe" id="reservation_date_uppe" value="0000-00-00">
        <input type="hidden" name="reservation_date_lowe" id="reservation_date_lowe" value="0000-00-00">
        <input type="hidden" name="appmt_date" id="appmt_date" value="0000-00-00">
        <input type="hidden" name="doctor" id="doctor">
        <input type="hidden" name="doctor_id" id="doctor_id" value="<?php echo $id_doctor; ?>">
        <input type="hidden" name="doctor_pickup_id" id="doctor_pickup_id" value="0">
        <input type="hidden" name="employee_user_id" id="employee_user_id" value="<?php echo $id_user; ?>">
        <input type="hidden" name="app_date_hidden" id="app_date_hidden" >
        <input type="hidden" name="material_up_temp" id="material_up_temp" >
        <input type="hidden" name="material_lo_temp" id="material_lo_temp" >
        <input type="hidden" name="id_color" id="id_color">
        <input type="hidden" name="t_color_upp" id="t_color_upp" value="N/A">
        <input type="hidden" name="t_color_low" id="t_color_low" value="N/A">
        <input type="hidden" name="t_num_up" id="t_num_up">
        <input type="hidden" name="id_lp_ps_up" id="id_lp_ps_up" value="0">
        <input type="hidden" name="id_lp_ps_lo" id="id_lp_ps_lo" value="0">
        <input type="hidden" name="delivery_date_uppe" id="delivery_date_uppe">
        <input type="hidden" name="delivery_date_lowe" id="delivery_date_lowe">
        <input type="hidden" name="code" id="code">
        <input type="hidden" name="code5" id="code5">
      <div class="row">
      <div class="col-md-12">
       <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title" style="color: #f39c12 !important"><?php echo $personal_information;?></h3>
            </div>
            <div class="box-body">
              
              <div class="row">
                
                <div class="col-xs-12">
                  <label style="font-size: 17px !important;color: #959594 !important">
                    <?php echo $new;?>
                  <input type="radio" name="r5" id="radio1" class="minimal-red"  value="1" checked="checked"  >
                  
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label style="font-size: 17px !important;color: #959594 !important">
                  <?php echo $registered;?>
                  <input type="radio" name="r5" id="radio2" class="minimal-red"  value="2" >
                  
                </label>
                </div>
              </div><br>
            <div id="lol" style="display: block">
              <div class="row">
                <div class="col-xs-4">
                  <input type="text" id="f_name" name="f_name"  class="form-control input-lg" placeholder="<?php echo $first_name;?>" required>
                </div>
                <div class="col-xs-1">
                  <input type="text" class="form-control input-lg" name="middle_name" id="middle_name" placeholder="<?php echo $middle_name;?>">
                </div>
                <div class="col-xs-4">
                  <input type="text" class="form-control input-lg" placeholder="<?php echo $last;?>" id="last_name" name="last_name" >
                </div>
              
            
             
                <div class="col-xs-3">
                  <input type="text" id="datemask" name="datemask" class="form-control input-lg" placeholder="<?php echo $pat_dob;?>" data-inputmask="'alias': 'mm-dd-yyyy'" data-mask>
                </div>
                </div>
               <br>
               
              
              </div>
              <div id="lol2" style="display: none">
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="scan_case" class="form-control input-lg" id="scan_case" placeholder="<?php echo $add_patient_case_number;?>" oninput="s2()">
                </div></div><br>
                <div class="row">
                <div class="col-xs-4">
                  <input type="text" class="form-control input-lg" placeholder="<?php echo $first_name;?>" disabled="disabled" id="details_name" name="details_name">
                </div>
                <div class="col-xs-1">
                  <input type="text" class="form-control input-lg" placeholder="<?php echo $middle_name;?>" disabled="disabled" id="details_mi" name="details_mi">
                </div>
                <div class="col-xs-4">
                  <input type="text" class="form-control input-lg" placeholder="<?php echo $last;?>" disabled="disabled" id="details_lname" name="details_lname">
                </div>
             
                <div class="col-xs-3">
                  <input type="text" class="form-control input-lg" placeholder="<?php echo $pat_dob;?>" id="details_dob" name="details_dob" disabled="disabled">
                </div>
                
               
               
              </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
         <div class="col-md-12">
       <div class="box box-warning">
            <div class="box-header with-border">
              <?php 
                  // $offi = $object->return_office_by_user($id_user);
                  
                         
                        
                   
                  ?>
              <h3 class="box-title" style="color: #f39c12 !important;color: #959594 !important"><?php echo $office;?>: <?php echo $offi[0]['o_name']; ?></h3>
              <input type="hidden" name="name_office" id="name_office" value="<?php echo $offi[0]['o_name']; ?>">
            </div>
            <div class="box-body">
              
              
                <div id="porlet_arch" style="display: block;">
                 <div class="row">
                 <div class="col-xs-6">
          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Upper Arch</h3>

              <div class="box-tools pull-right">
                
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
              <div class="col-xs-6">
                   <label style="font-size: 17px !important;color: #959594 !important"><?php echo $prothesis;?></label>
               <select name="id_proth_upper" id="id_proth_upper" class="form-control input-lg ui fluid dropdown" onchange="show_other_upper()">
                 <option>-<?php echo $select;?>-</option>
                 <?php 
                   $d = $object->return_prothesis_type();
                   foreach ($d as $k => $v) {
                     # code...
                      ?><option value="<?php echo $v['id_prothesis_type']; ?>"><?php if($lang == 'es'){echo $v["pt_name_es"];}if($lang == 'en'){echo $v["pt_name_en"];}  ?></option> <?php 
                   }
                  ?>
                
               </select>
                </div>
                <div id="material_upper" style="display: none;">
                <div class="col-xs-6">
                   <label style="font-size: 17px !important;color: #959594 !important"><?php echo $material;?></label>
                  <select id="material_up" name="material_up" class="form-control input-lg ui fluid dropdown" onchange="show_steps()">
                   
                  </select>
                </div>
              </div>
              <div id="number_upper" style="display: none;">
                <div class="col-xs-6">
                <label style="font-size: 17px !important;color: #959594 !important"><?php echo "Thooth Number";?></label>
                 <select name="id_t_number_up[]" id="id_t_number_up"  class="form-control input-lg ui fluid dropdown" multiple="">
                 <option value="">-Select-</option>
                 <option value="1">1</option>
                 <option value="2">2</option>
                 <option value="3">3</option>
                 <option value="4">4</option>
                 <option value="5">5</option>
                 <option value="6">6</option>
                 <option value="7">7</option>
                 <option value="8">8</option>
                 <option value="9">9</option>
                 <option value="10">10</option>
                 <option value="11">11</option>
                 <option value="12">12</option>
                 <option value="13">13</option>
                 <option value="14">14</option>
                 <option value="15">15</option>
                 <option value="16">16</option>
                 </select></div>
              </div>

              </div>
              <div id="hidden_steps_color_upper" style="display: block;">
               <div class="row">
            <div class="col-xs-6">
                   <label style="font-size: 17px !important;color: #959594 !important"><?php echo $steps;?></label>
               <select name="id_steps_upper" id="id_steps_upper" class="form-control input-lg ui fluid dropdown" onchange="getColorData()">
                 <option>-<?php echo $select;?>-</option>
                 <?php
                  $t = $object->get_lab_services();
                  foreach ($t as $ke => $va) {
                    # code...
                    ?>
                     <option value="<?php echo $va['id_procedure_step']; ?>"><?php if($lang == "es"){echo $va['ps_name_es'];}if($lang == "en"){echo $va['ps_name_en'];}  ?></option>
                    <?php
                  }

                  ?>
               </select>
                </div>
                <div id="sd" style="display: none;">
            <div class="col-xs-6">
                   <label style="font-size: 17px !important;color: #959594 !important"><?php echo $teeth_color_title;?></label>
               <select name="id_color_upper" id="id_color_upper" class="form-control input-lg ui fluid dropdown" onchange="get_color_upp()" >
                   <option>-Select-</option>
                 <?php
                 /* $t = $object->return_teeth();
                  foreach ($t as $ke => $va) {
                    # code...
                    ?>
                     <option value="<?php echo $va['id_teeth']; ?>"><?php echo $va['t_color']; ?></option>
                    <?php
                  }*/

                  ?>
               </select>
                </div></div>
          </div></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
         <div class="col-xs-6">
          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Lower Arch</h3>

              <div class="box-tools pull-right">
                
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
              <div class="col-xs-6">
                   <label style="font-size: 17px !important;color: #959594 !important"><?php echo $prothesis;?></label>
               <select name="id_proth_lower" id="id_proth_lower" class="form-control input-lg ui fluid dropdown" onchange="show_other_lower()">
                 <option>-<?php echo $select;?>-</option>
                 <?php 
                   $d = $object->return_prothesis_type();
                   foreach ($d as $k => $v) {
                     # code...
                      ?><option value="<?php echo $v['id_prothesis_type']; ?>"><?php if($lang == 'es'){echo $v["pt_name_es"];}if($lang == 'en'){echo $v["pt_name_en"];}  ?></option> <?php 
                   }
                  ?>
                
               </select>
                </div>
                <div id="material_lower" style="display: none">
                <div class="col-xs-6">
                   <label style="font-size: 17px !important;color: #959594 !important"><?php echo $material;?></label>
                  <select id="material_lo" name="material_lo" class="form-control input-lg ui fluid dropdown" onchange="show_steps2()">
                   <option >-<?php echo $select;?>-</option>
                     <?php
                    $ax2 = $object->return_material();
                    
                     foreach ($ax2 as $keyad => $valuead) {
                       # code...
                      ?>
                      <option value="<?php echo $valuead['id_material']; ?>"><?php if($lang == 'en'){echo $valuead["lp_material_en"];}if($lang == 'es'){echo $valuead["lp_material_es"];}  ?></option>
                      <?php
                     }
                  
                     ?>
                  </select>
                </div></div>
                <div id="number_lower" style="display: none;">
                <div class="col-xs-6">
                <label style="font-size: 17px !important;color: #959594 !important"><?php echo "Thooth Number";?></label>
                 <select name="id_t_number_lo" id="id_t_number_lo"  class="form-control input-lg ui fluid dropdown" multiple="">
                 <option value="">-Select-</option>
                 <option value="1">17</option>
                 <option value="2">18</option>
                 <option value="3">19</option>
                 <option value="4">20</option>
                 <option value="5">21</option>
                 <option value="6">22</option>
                 <option value="7">23</option>
                 <option value="8">24</option>
                 <option value="9">25</option>
                 <option value="10">26</option>
                 <option value="11">27</option>
                 <option value="12">28</option>
                 <option value="13">29</option>
                 <option value="14">30</option>
                 <option value="15">31</option>
                 <option value="16">32</option>
                 </select></div>
              </div>
              </div>
               <div class="row">
            <div class="col-xs-6">
                   <label style="font-size: 17px !important;color: #959594 !important"><?php echo $steps;?></label>
               <select name="id_steps_lower" id="id_steps_lower" class="form-control input-lg ui fluid dropdown" onchange="getColorData2()">
                 <option>-<?php echo $select;?>-</option>
                 <?php
                  $t = $object->get_lab_services();
                  foreach ($t as $ke => $va) {
                    # code...
                    ?>
                     <option value="<?php echo $va['id_procedure_step']; ?>"><?php if($lang == "es"){echo $va['ps_name_es'];}if($lang == "en"){echo $va['ps_name_en'];}  ?></option>
                    <?php
                  }

                  ?>
               </select>
                </div>
                <div id="sd2" style="display: none;">
            <div class="col-xs-6">
                   <label style="font-size: 17px !important;color: #959594 !important"><?php echo $teeth_color_title;?></label>
               <select name="id_color_lower" id="id_color_lower" class="form-control input-lg ui fluid dropdown" onchange="get_color_low()" >
                   <option>-Select-</option>
                 <?php
                 /* $t = $object->return_teeth();
                  foreach ($t as $ke => $va) {
                    # code...
                    ?>
                     <option value="<?php echo $va['id_teeth']; ?>"><?php echo $va['t_color']; ?></option>
                    <?php
                  }*/

                  ?>
               </select>
                </div></div>
          </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
            </div> 
          
         

            </div>    
             <br>
              <div class="row">
               <div class="col-xs-12">
                  <label style="font-size: 17px !important;color: #959594 !important"><?php echo $doctor_note;?>:</label>
                  <textarea class="form-control border" id="doctor_comment" name="doctor_comment" rows="3" placeholder="<?php echo $note;?>"></textarea>
                </div>
                <!--div class="col-xs-6">
                  <label style="font-size: 17px !important;color: #959594 !important"><?php echo $front_desk_note;?>:</label>
                  <textarea class="form-control border" id="employee_comment" name="employee_comment" rows="3" placeholder="<?php echo $note;?>"></textarea>
                </div-->
              </div>
              
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
       <div class="col-md-12">
       <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title" style="color: #f39c12 !important">
                <?php 
               /* $rush_var= 0;$id_proc_step=3;$id_lp_ps=1;
			  $dates = $object->calc_reservation_date();*/
			  echo $reservation_details;?></h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-xs-2">
                  <label style="font-size: 17px !important;color: #959594 !important"><?php echo $termination_time;?>:</label>
                </div>
                <div class="col-xs-4">
                  <label style="font-size: 17px !important;color: #959594 !important">
                  <?php echo $rush_finish;?>
                  <input type="radio" name="r3" id="r32" class="minimal-red" >
                  
                </label>
                  <label style="font-size: 17px !important;color: #959594 !important">
                    <?php echo $standard;?>
                  <input type="radio" name="r3" id="r3" class="minimal-red"  >
                  
                </label>
                
                </div>
                <div class="col-xs-6">
                  <?php if($offices_quantity == '1'){
                ?>
                  <div id="get_new_office" >
                <div class="row"  >
                
                   <div class="col-xs-6">
                <label style="font-size: 17px !important;color: #959594 !important"><?php echo $office_pick_up;?>:</label></div>
                <div class="col-xs-4">

                  <label>
                  <input type="radio" name="r4" id="r4" class="minimal-red" checked >
                  <?php echo $yes;?>
                </label>
                <label>
                  <input type="radio" name="r4" id="r42" class="minimal-red" >
                  <?php echo $no;?>
                </label>
                </div>
                   </div>
                <div class="row">
                <div id="select_office" style="display: none;">
                <div class="col-xs-6">
               
                <select name="id_off" class="form-control input-lg ui fluid dropdown">
                 <option>-<?php echo $select;?>-</option>
                 <?php 
                   $offi = $object->return_offices($id_group);
                   foreach ($offi as $key => $value) {
                     # code...
                        ?>
                        <option value="<?php echo $value['id_office']; ?>"><?php echo $value['o_name']; ?></option>
                        <?php 
                   }
                  ?>
                 
               </select>
              </div>
              </div>
              <div id="select_doctor" style="display: none;">
                <div class="col-xs-6">
               
                <select name="id_dc" class="form-control input-lg ui fluid dropdown">
                 <option>-<?php echo $select;?>-</option>
                 <?php 
                  /* $offi = $object->return_doctor_by_group($id_group);
                   foreach ($offi as $key => $value) {
                     # code...
                        ?>
                        <option value="<?php echo $value['id_user']; ?>"><?php echo $value['u_name']." ".$value['u_last_name']; ?></option>
                        <?php 
                   }*/
                  ?>
                 
               </select>
              </div>
              </div>
            </div>
              </div>
                <?php
              }
              else
              {
                   ?>
<div id="get_new_office" style="display: block">
                <div class="row"  >
                
                   <div class="col-xs-3">
                <label style="font-size: 17px !important;color: #959594 !important"><?php echo $office_pick_up;?></label></div>
                <div class="col-xs-2">

                  <label>
                  <input type="radio" name="r2"  checked onclick="selectOffice('1')">
                 <?php echo $yes;?>
                </label>
                <label>
                  <input type="radio" name="r2" onclick="selectOffice('2')">
                  <?php echo $no;?>
                </label>
                </div>
                   </div>
                <div class="row">
                <div id="select_office" >
                <div class="col-xs-3">
               
                <select name="id_off" class="form-control input-sm">
                 <option>-<?php echo $select;?>-</option>
                 <?php 
                   $offi = $object->return_offices($id_group);
                   foreach ($offi as $key => $value) {
                     # code...
                        ?>
                        <option value="<?php echo $value['id_office']; ?>"><?php echo $value['o_name']; ?></option>
                        <?php 
                   }
                  ?>
                 
               </select>
              </div>
              </div>
              <div id="select_doctor" >
                <div class="col-xs-3">
               
                <select name="id_dc" class="form-control input-sm">
                 <option>-<?php echo $select;?>-</option>
                 <?php 
                   $offi = $object->return_doctor_by_group($id_group);
                   foreach ($offi as $key => $value) {
                     # code...
                        ?>
                        <option value="<?php echo $value['id_user']; ?>"><?php echo $value['u_name']." ".$value['u_last_name']; ?></option>
                        <?php 
                   }
                  ?>
                 
               </select>
              </div>
              </div>
            </div>
              </div>
                   <?php
               }
               ?>
                </div>
              </div>
              
      <!-- /.col -->
      <div class="row">
                <div class="col-xs-6" >
                 <br><br>
                  <fieldset class="col-md-12">     
          <legend style="font-size: 17px !important;color: #f39c12 !important">Details of Upper Arch</legend>
          
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="font-size: 17px !important;color: #959594 !important"><?php echo $reservation_date;?>:</th>
              <td>
                <label id="reservation_date" style="font-size: 15px !important;color: #959594 !important"></label>
                <?php /*if($rush_var==0){echo substr($dates[0]["available_date"], 5,2).'-'.substr($dates[0]["available_date"],8,2).'-'.substr($dates[0]["available_date"],0,4);}else echo substr($dates[0]["rush_date"], 5,2).'-'.substr($dates[0]["rush_date"],8,2).'-'.substr($dates[0]["rush_date"],0,4);*/?></td>
            </tr>
            <tr>
              <th style="font-size: 17px !important;color: #959594 !important"><?php echo $finish_date;?>:</th>
              <td>
                <label id="finish_date" style="font-size: 15px !important;color: #959594 !important"></label>
                <?php /*if($rush_var==0){echo substr($dates[0]["finish_date"], 5,2).'-'.substr($dates[0]["finish_date"],8,2).'-'.substr($dates[0]["finish_date"],0,4);}else substr($dates[0]["rush_finish_date"], 5,1).'-'.substr($dates[0]["rush_finish_date"],8,2).'-'.substr($dates[0]["rush_finish_date"],0,4);*/?></td>
            </tr>
            
            <tr>
              <th style="font-size: 17px !important;color: #959594 !important"><?php echo "Price";?>:</th>
              <td>
               <label id="price_upp" style="font-size: 15px !important;color: #959594 !important"></label>
              
                <?php /* if($rush_var==0){echo substr($dates[0]["appoinment_date"], 5,2).'-'.substr($dates[0]["appoinment_date"],8,2).'-'.substr($dates[0]["appoinment_date"],0,4);}else echo substr($dates[0]["rush_appoinment_date"], 5,2).'-'.substr($dates[0]["rush_appoinment_date"],8,2).'-'.substr($dates[0]["rush_appoinment_date"],0,4);*/?></td>
            </tr>
          </table>
        </div>
            </div>
          </div>
          
        </fieldset>       
        
        <div class="clearfix"></div>
            </div>
              <div class="col-xs-6" >
                 <br><br>
                  <fieldset class="col-md-12">     
          <legend style="font-size: 17px !important;color: #f39c12 !important">Details of Lower Arch</legend>
          
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="font-size: 17px !important;color: #959594 !important"><?php echo $reservation_date;?>:</th>
              <td>
                <label id="reservation_date_lo" style="font-size: 15px !important;color: #959594 !important"></label>
                <?php /*if($rush_var==0){echo substr($dates[0]["available_date"], 5,2).'-'.substr($dates[0]["available_date"],8,2).'-'.substr($dates[0]["available_date"],0,4);}else echo substr($dates[0]["rush_date"], 5,2).'-'.substr($dates[0]["rush_date"],8,2).'-'.substr($dates[0]["rush_date"],0,4);*/?></td>
            </tr>
            <tr>
              <th style="font-size: 17px !important;color: #959594 !important"><?php echo $finish_date;?>:</th>
              <td>
                <label id="finish_date_lo" style="font-size: 15px !important;color: #959594 !important"></label>
                <?php /*if($rush_var==0){echo substr($dates[0]["finish_date"], 5,2).'-'.substr($dates[0]["finish_date"],8,2).'-'.substr($dates[0]["finish_date"],0,4);}else substr($dates[0]["rush_finish_date"], 5,1).'-'.substr($dates[0]["rush_finish_date"],8,2).'-'.substr($dates[0]["rush_finish_date"],0,4);*/?></td>
            </tr>
           
            <tr>
              <th style="font-size: 17px !important;color: #959594 !important"><?php echo "Price";?>:</th>
              <td>
               <label id="price_low" style="font-size: 15px !important;color: #959594 !important"></label>
                <?php /* if($rush_var==0){echo substr($dates[0]["appoinment_date"], 5,2).'-'.substr($dates[0]["appoinment_date"],8,2).'-'.substr($dates[0]["appoinment_date"],0,4);}else echo substr($dates[0]["rush_appoinment_date"], 5,2).'-'.substr($dates[0]["rush_appoinment_date"],8,2).'-'.substr($dates[0]["rush_appoinment_date"],0,4);*/?></td>
            </tr>
          </table>
        </div>
            </div>
          </div>
          
        </fieldset>       
        
        <div class="clearfix"></div>
            </div>      
                
                </div>
                <div class="col-xs-6">
        <!--p class="lead"><?php //echo $amount_due;?><?php // echo date('m-d-Y');?></p-->
         <br><br>
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%;font-size: 17px !important;color: #959594 !important">Subtotal:</th>
              <td><label id="sub_desc" style="font-size: 15px !important;color: #959594 !important"></label><!--label id="sub_desc2"--></label>
                <?php /*$subtotal=0;$subtotal = $dates[0]["proc_cost"]; echo $subtotal;*/?></td>
            </tr>
            <tr>
              <th style="width:50%;font-size: 17px !important;color: #959594 !important"><?php echo $rush_finish;?>:</th>
              <td> <label id="rush" style="font-size: 15px !important;color: #959594 !important"></label>
                <?php /*if($rush_var==0){?>0.00<?php }else echo $dates[0]["rush_cost"];*/?></td>
            </tr>
            <tr>
              <th style="width:50%;font-size: 17px !important;color: #959594 !important"><b>TOTAL:</b></th>
              <td><b> <label id="total" style="font-size: 15px !important;color: #959594 !important"></label>
               <?php /*if($rush_var==0){echo $subtotal;}else echo ($subtotal+$dates[0]["rush_cost"]);*/?></b></td>
            </tr>
          </table>
        </div>
      </div> <br><br><div class="col-xs-3"><label style="font-size: 17px !important;color: #959594 !important">Appoinment Date:</label><label id="app_date" style="font-size: 15px !important;color: #959594 !important"></label></div><div class="col-xs-3"><img src="../assets/img/change.png" style="width: 25px;height: 25px;cursor: pointer;" title="Change Date" onclick="showChange()"></div><br><div id="hidden_div" style="display: none;"><div class="col-xs-3 pull-right"><label style="font-size: 17px !important;color: #959594 !important">Date:</label><input type="text" id="change_date"  class="form-control" name="change_date" data-inputmask="'alias': 'mm/dd/yyyy'"  data-mask=""></div></div><br><br><br><br><div class="col-xs-3 pull-right" align="">
             <!--a href="#fullCalModal"  data-toggle="modal"--><button disabled type="button" class="btn btn-block btn-danger" onclick="submitt()" id="s" ><?php echo $send; ?></button><!--/a--></div>
              </div>

              
             
             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  </div>
  <div id="fullCalModal" class="modal">

          <div class="modal-dialog" style="width:800px;">
            <div class="modal-content" >
              <div class="modal-header" style="background: #CDFVVV !important">
               
                <h4 id="modalTitle" class="modal-title"></h4>
              </div>
              <div class="modal-body">
                <div id="printMe">
                <div class="col-xs-12">
                <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active" style="background: #fdb813 !important">
              <h3 class="widget-user-username">CDL CONTACT: (786) 393-6867</h3>
              <h5 class="widget-user-desc"></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="../assets/dist/img/cdl.jpg" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-5 border-right">
                  <div class="description-block">
                    <span class="description-text">Código Caso</span>
                    <h5 class="description-header"><p id="case_code_invoice"></p></h5>
                    <span class="description-text">Paciente</span>
                    <h5 class="description-header"><p id="patient_invoice"></p></h5>
                    
                    
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <!--span class="description-text">Fecha de Reserva</span>
                    <h5 class="description-header"><p id="reservation_date_invoice"></p></h5>
                    <span class="description-text">Fecha de Devolución</span>
                    <h5 class="description-header"><p id="finish_date_invoice"></p></h5-->
                   
                    
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-5">
                  <div class="description-block">
                    <span class="description-text">Clínica</span>
                    <h5 class="description-header"><p id="clinic_invoice"></p></h5>
                    <span class="description-text">Doctor</span>
                    <h5 class="description-header"><p id="doctor_invoice"></p></h5>
                     <span class="description-text">Fecha de la Cita</span>
                    <h5 class="description-header"><p id="appo_date_invoice"></p></h5>
                    <!--span class="description-text">Procedimiento</span>
                     <h5 class="description-header"><p id="procedimiento_invoice"></p></h5-->
                    
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-sm-5 border-right">
                  <div class="description-block">
                    <span class="description-text">Tipo de Caso Upp</span>
                    <h5 class="description-header"><p id="case_type_upp_invoice"></p></h5>
                    <span class="description-text">Color</span>
                    <h5 class="description-header"><p id="color_invoice_upp"></p></h5>
                    <span class="description-text">Fecha de Devolución</span>
                    <h5 class="description-header"><p id="finish_date_invoice_upp"></p></h5>
                     <span class="description-text">Fecha de Reserva</span>
                    <h5 class="description-header"><p id="reservation_date_up_invoice"></p></h5>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              <div class="col-sm-2">
                 
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-5">
                  <div class="description-block">
                  <span class="description-text">Tipo de Caso Low</span>
                    <h5 class="description-header"><p id="case_type_low_invoice"></p></h5>
                    <span class="description-text">Color</span>
                    <h5 class="description-header"><p id="color_invoice_low"></p></h5>
                    <span class="description-text">Fecha de Devolución</span>
                    <h5 class="description-header"><p id="finish_date_invoice_low"></p></h5>
                     <span class="description-text">Fecha de Reserva</span>
                    <h5 class="description-header"><p id="reservation_date_lo_invoice"></p></h5>
                  </div>
                  <!-- /.description-block -->
                </div>
                 
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-sm-12 border-right">
                  <div class="description-block">
                    <span class="description-text">Observaciones</span>
                    <h5 class="description-header"><p id="note_invoice"></p></h5>
                    
                  </div>
                  <!-- /.description-block -->
                </div>
                
              </div>
              <div class="row">
                <div class="col-sm-5 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                    <span class="description-text">Inspect. Laboratorio</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <div class="col-sm-2">
                 
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-5 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                    <span class="description-text">Inspect. Clinic</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
              </div>
              <div class="row">
              <div class="col-sm-5 border-right">
                <div id="barcode2" ></div>
              <!--img id="barcode2"/>
                  < /.description-block -->
                </div>
                <div class="col-sm-2 border-right">
                
              <!--img id="barcode2"/>
                  < /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-5 border-right" align="left">
                
                <div id="qrcodeCanvas"></div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
            </div>
          </div>
                
    
        </div>
        
                </div>
              <div class="modal-footer">
                
               <button type="button"  class="btn btn-block btn-warning noprint" onclick="window.open('print_label.php?idcaso='+document.getElementById('code5').value);" >Print</button> <button type="button" class="btn btn-block btn-warning noprint" data-dismiss="modal">Close</button>
              </div>
</div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
         <div id="fullCalModal2" class="modal" >
          <div class="modal-dialog" >
            <div class="modal-content" >
              <div class="modal-header" style="background: #CDFVVV !important">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 id="modalTitle" class="modal-title"></h4>
              </div>
              <div class="modal-body">
              <div class="alert alert-danger alert-dismissible">
                
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                La fecha no puede ser menor...
              </div>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  <!-- /.content-wrapper -->
 <?php include("../templates/footer.php"); ?>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
  <!-- jQuery 2.2.3 -->
<script src="../assets/plugins/jQuery/jquery-2.2.3.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 3.3.6 -->
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<!-- InputMask -->
<script src="../assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../assets/plugins/select2/select2.full.min.js"></script>
<!-- FastClick -->
<script src="../assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/app.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../assets/plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<script type="text/javascript" src="../src/jquery.qrcode.js"></script>
<script type="text/javascript" src="../src/qrcode.js"></script>
<!-- DataTables -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="../assets/dist/js/bootstrap-multiselect.js"></script>
  <script type="text/javascript" src="../assets/dist/js/dropdown.min.js"></script>
  <script type="text/javascript" src="../assets/dist/js/semantic.min.js"></script>
  <script type="text/javascript" src="../assets/dist/js/jquery.qrcode.js"></script>
<script type="text/javascript" src="../assets/dist/js/qrcode.js"></script>

<script>
 

  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

   
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    
  });
  $("#r3").on("ifChecked", standar);
  $("#r32").on("ifChecked", rush);
  $("#radio1").on("ifChecked", showMe1);
  $("#radio2").on("ifChecked", showMe2);
  $("#r4").on("ifChecked", selectOffice1);
  $("#r42").on("ifChecked", selectOffice2);
  $("#change").on("ifChecked", showChange);
  $("#change").on("ifUnchecked", showChange2);
</script>
<script>
  $(document)
    .ready(function() {
      $('.ui.fluid.dropdown').dropdown();
     
    })
  ;
jQuery.fn.extend({
  printElem: function() {
    var cloned = this.clone();
    var printSection = $('#printSection');
    if (printSection.length == 0) {
      printSection = $('<div id="printSection"></div>')
      $('body').append(printSection);
    }
    printSection.append(cloned);
    var toggleBody = $('body *:visible');
    toggleBody.hide();
    $('#printSection, #printSection *').show();
    window.print();
    printSection.remove();
    toggleBody.show();
  }
});

$(document).ready(function(){
  $(document).on('click', '#btnPrint', function(){
    $('#printMe').printElem();
  });
});
  </script>
</body>
</html>
