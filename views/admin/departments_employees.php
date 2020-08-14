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
     if($tiempo_transcurrido >= 600){ 
     //si pasaron 10 minutos o más 
      session_destroy(); // destruyo la sesión 
      header("Location: ../../index.html"); //envío al usuario a la pag. de autenticación 
      //sino, actualizo la fecha de la sesión 
    }else { 
    $_SESSION["tokenExpiration"] = $ahora; 
   } 
} 
 $lang=$_GET["lang"];
   if($lang == 'es'){
        include("../assets/lang/es.php");
        
        }
        if($lang == 'en')
        {
          include("../assets/lang/en.php"); 
         
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
  <!-- Morris chart -->
  <link rel="stylesheet" href="../assets/plugins/morris/morris.css">
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
  <link rel="stylesheet" type="text/css" href="../assets/dist/js/dropdown.min.css">
  <!-- jQuery 2.2.3 -->
<script src="../assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
   <?php
if($_GET)
  {

     if($_GET['active'] == 2)
     {
      ?>
      <script type="text/javascript">
       
        $(document).ready(function(){
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
        $('#myTab2 a[href="' + activeTab + '"]').tab('show');
       }
      });
    

      </script>
      <?php
    }
    if($_GET['active'] == 3)
     {
      ?>
      <script type="text/javascript">
       
        $(document).ready(function(){
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
        $('#myTab2 a[href="' + activeTab + '"]').tab('show');
       }
      });
    

      </script>
      <?php
    }
   
    
    if($_GET['active'] == 1)
     {
      ?>
      <script type="text/javascript">
       
        $(document).ready(function(){
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
        $('#myTab2 a[href="' + activeTab + '"]').tab('show');
       }
      });
    

      </script>
      <?php
    }
  }

 ?>
  <script type="text/javascript">
      function submit2()
      {
           // alert("OK");
           document.getElementById("insert_deparment").submit();
      }
      function submitteeth()
      {
           // alert("OK");
           document.getElementById("insert_teeth").submit();
      }
      function submitproc()
      {
           // alert("OK");
           document.getElementById("material").disabled = false;
           document.getElementById("insert_procedure").submit();
      }
      function submitemp()
      {
           // alert("OK");
           document.getElementById("insert_emp").submit();
      }
	  function submitempDelete()
      {
            if (confirm('Se dispone a borrar un trabajador. Esta seguro?')) {
                
                document.getElementById("delete_emp").submit();
            } else {
                document.getElementById("delete_emp").reset();
            }
           
      }
	  
	  function submitempEdit(id)
	  {
		   
			document.getElementById("edit_emp"+id).submit();
	  }
	  function deleteEmp(id)
	  {
		  //alert(id);return 0;
		  if (confirm('Se dispone a borrar un trabajador. Esta seguro?')) {
                jQuery.ajax({
            type: "POST",
            url: "../../controllers/admin/delete_emp_lab.php",
            data: {id_employee: id},
            // data: {activation: b},

            success: function(response){ 
			    window.location.href = "../../views/admin/departments_employees.php?lang=en&active=2";
			    // var tableDel = $('#tableDel').DataTable();
                // alert("Deleteing");
				 //tableDel.ajax.reload();
             // location.reload();
			  
            }
          });
                //document.getElementById("delete_emp").submit();
            } else {
                //document.getElementById("delete_emp").reset();
            }
	  }
       function submitemp2()
      {
           // alert("OK");
           document.getElementById("insert_lab_service").submit();
      }
       function show_denture_type()
      {
           // alert("OK");
           var val = document.getElementById("protesis_type").value;
           if(val == '1'){
           //document.getElementById("denture_type_hidde").style.display="block";
           document.getElementById("steps_hidden2").style.display="none";
           document.getElementById("all_services").style.display="block"; 
           document.getElementById("material_hidde").style.display="none";
         }
           if(val == '2'){
           //document.getElementById("denture_type_hidde").style.display="none";
            document.getElementById("steps_hidden2").style.display="block";
            document.getElementById("all_services").style.display="none"; 
            document.getElementById("material_hidde").style.display="none";
         }
      }
      
	  function showData()
      {
            var users = $('#users').val();
			//alert(users);
            jQuery.ajax({
            type: "POST",
            url: "../../controllers/admin/get_employee_data.php",
            data: {id_employee: users},
            // data: {activation: b},

            success: function(response){ //alert(response);return 0;
            var arrayEmp = JSON.parse(response);
			var name = arrayEmp[0]['employee_name'];
			var lname = arrayEmp[0]['employee_last_name'];
			var phone = arrayEmp[0]['e_phone'];
			var email = arrayEmp[0]['e_email'];
			document.getElementById('name_edit').value = name;
			document.getElementById('last_name_edit').value = lname;
			document.getElementById('phone_edit').value = phone;
			document.getElementById('email_edit').value = email;
			//$('#name_edit').val(name);
            /*var color = arrayColor[0]['requires_teeth_data'];
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
            }*/
           // var miSelectColor = document.getElementById("id_color_upper");
           
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
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <?php include("../templates/header_admin.php"); ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">
    <!-- Content Header (Page header) -->
    <?php include("../templates/path.php"); ?>

    <!-- Main content -->
    <section class="content">
      
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom" id="MyTab2">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#sales-chart3" data-toggle="tab" role="tab"><?php echo $lab_services;?></a></li>
              <li ><a href="#sales-chart2" data-toggle="tab" role="tab"><?php echo $procedures_title;?></a></li>
              <li ><a href="#revenue-chart2" data-toggle="tab" role="tab"><?php echo $teeth;?></a></li>
              <li ><a href="#revenue-chart" data-toggle="tab" role="tab"><?php echo $departments_title;?></a></li>
              <li><a href="#sales-chart" data-toggle="tab" role="tab"><?php echo $laboratory_employees;?></a></li>
              
              <!--li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li-->
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane" id="revenue-chart" style="position: relative; ">
                <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $deparments_list;?></h3>
               <div class="btn-group" style="margin-left: 90% !important">
                  <button type="button" class="btn btn-warning" style="background: #fdb813 !important"><?php echo $action;?></button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" style="background: #bd1e2c !important">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target="#myModalD"><?php echo $add_department;?></a></li>
                   
                  </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table4" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th><?php echo $departments_title;?></th>
                  <th><?php echo $description;?></th>
                  
                </tr>
                </thead>
                <tbody>
               <?php $counter_dep=1;
              // $deparments2 = $object->get_deparments();
               $all_deparments1 = $object->get_deparments();
               if($all_deparments1[0]!='')
			   {
			   foreach ($all_deparments1 as $valued) {
               ?>
                <tr>
                <td><?php echo $counter_dep++;?></td>
                  <td><?php if($lang=='es'){echo $valued["ld_name_es"];}if($lang=='en'){echo $valued["ld_name_en"];} ?></td>
                  <td><?php echo $valued["ld_decription"]; ?></td>
                </tr>
                <?php
               }}
			   else
			   {?><tr>
                   <td colspan="2"><?php echo $no_departments;?></td>
                  </tr>
				<?php }
                ?>
                
            
                </tbody>
              </table>
                <div class="example-modal">
        <div class="modal" id="myModalD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: #fdb813 !important"><?php echo $add_department;?></h4>
              </div>
              <div class="modal-body">
                 <!-- Form Element sizes -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <!--h3 class="box-title">Different Height</h3-->
            </div>
            <div class="box-body">
               <form role="form" id="insert_deparment" method="post" action="../../controllers/admin/add_deparment.php">
                <input type="hidden" name="id_user_hidde" value="<?php echo $id_user; ?>">
                <div class="form-group">
                  <div class="col-xs-6">
                    
                  <label><?php echo $deparment_name;?></label>

              <input class="form-control input-lg" name="deparmentes" placeholder="Español" type="text" >
            
            </div>
            </div>
             <div class="form-group">
                  <div class="col-xs-6">
                    
                  <label><?php echo $deparment_name;?></label>

              <input class="form-control input-lg" name="deparmenten" placeholder="Ingles" type="text" >
            
            </div>
            </div>
            <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label><?php echo $description;?></label>

              <textarea class="form-control"  rows="3" name="description"></textarea>
            </div>
            </div>
           
            
           
          
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo $close;?></button>
                <button type="button" class="btn btn-primary" onclick="submit2();" style="background: #fdb813 !important"><?php echo $save;?></button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
              
            </div>
            <!-- /.box-body -->
          </div>
              </div>
               <div class="chart tab-pane" id="revenue-chart2" style="position: relative; ">
                <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $teeth_list;?></h3>
               <div class="btn-group" style="margin-left: 90% !important">
                  <button type="button" class="btn btn-warning" style="background: #fdb813 !important"><?php echo $action;?></button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" style="background: #bd1e2c !important">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target="#myModalT"><?php echo $add_teeth;?></a></li>
                   
                  </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th><?php echo $teeth_model;?></th>
                  <th><?php echo $teeth_color;?></th>
                  
                </tr>
                </thead>
                <tbody>
               <?php $count_teeth=1;
               $teeth_list = $object->get_teeth();
               if($teeth_list[0]!=""){
			   foreach ($teeth_list as $teeth) {
               ?>
                <tr>
                    <td><?php echo $count_teeth++;?></td>
                    <td><?php echo $teeth["t_model"]; ?></td>
                    <td><?php echo $teeth["t_color"]; ?></td>
                </tr>
                <?php
               }}else{?><tr><td ><?php echo $no_teeth; ?></td><td></td></tr><?php }
                ?>
                
            
                </tbody>
              </table>
                <div class="example-modal">
        <div class="modal" id="myModalT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: #fdb813 !important"><?php echo $add_teeth;?></h4>
              </div>
              <div class="modal-body">
                 <!-- Form Element sizes -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <!--h3 class="box-title">Different Height</h3-->
            </div>
            <div class="box-body">
               <form role="form" id="insert_teeth" method="post" action="../../controllers/admin/add_teeth.php">
                <input type="hidden" name="id_user_hidde" value="<?php echo $id_user; ?>">
                <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label><?php echo $model;?></label>

              <input class="form-control input-lg" name="model" type="text" >
            
            </div>
            </div>
            <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label><?php echo $color;?></label>

              <input class="form-control input-lg" name="color" type="text" >
            </div>
            </div>
           
            
           
          
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo $close;?></button>
                <button type="button" class="btn btn-primary" onclick="submitteeth();" style="background: #fdb813 !important"><?php echo $save;?></button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
              
            </div>
            <!-- /.box-body -->
          </div>
              </div>
               <div class="chart tab-pane active" id="sales-chart3" style="position: relative; ">
                <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $lab_services_list;?></h3>
               <div class="btn-group" style="margin-left: 90% !important">
                  <button type="button" class="btn btn-warning" style="background: #fdb813 !important"><?php echo $action;?></button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" style="background: #bd1e2c !important">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target="#myModalLabService"><?php echo $add_lab_service;?></a></li>
                   
                  </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th><?php echo $lab_service_name;?></th>
                  <th><?php echo $max_quantity;?></th>
                  <th><?php echo $estimated_days;?></th>
                  
                  
                </tr>
                </thead>
                <tbody>
               <?php $count_serv=1;
               $arr_lab_services = $object->get_lab_services();//print_r($lab_employes);
                if($arr_lab_services[0]!=""){
         foreach ($arr_lab_services as $valuele) {
               ?>
                 <tr>
                     <td><?php echo $count_serv++;?></td>
                     <td><?php if($lang=='es'){echo $valuele["ps_name_es"];}else{echo $valuele["ps_name_en"];} ?></td>
                     <td><?php echo $valuele["ts_max_quantity_by_day"]; ?></td>
                     <td><?php echo $valuele["ts_estimated_days"]; ?></td>
                 </tr>
                <?php
               }}else{?><tr><td ><?php echo $no_lab_services; ?></td><td></td><td></td></tr><?php }
               

			  
                ?>
              </tbody>
              </table>
                <div class="example-modal">
        <div class="modal" id="myModalLabService" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: #fdb813 !important"><?php echo $add_lab_service;?></h4>
              </div>
              <div class="modal-body">
                 <!-- Form Element sizes -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <!--h3 class="box-title">Different Height</h3-->
            </div>
            <div class="box-body">
               <form role="form" id="insert_lab_service" method="post" action="../../controllers/admin/add_lab_service.php">
                <input type="hidden" name="id_user_hidde" value="<?php echo $id_user; ?>">
                <div class="form-group">
                  <div class="col-xs-6">
                    
                  <label><?php echo $lab_service_name;?></label>

              <input class="form-control input-lg" name="lab_service_name_es" placeholder="Español" type="text" >
            
            </div>
            <div class="col-xs-6">
                    
                  <label><?php echo $lab_service_name;?></label>

              <input class="form-control input-lg" name="lab_service_name_en" placeholder="Ingles" type="text" >
            
            </div>
            </div>
           
                  <div class="col-xs-6">
                    
                  <label><?php echo $daily_max_quantity;?></label>

              <input class="form-control input-lg" name="lab_serv_max_quan" type="text" >
            </div>
           
             <div class="col-xs-6">
                    
                  <label><?php echo $estimated_days;?></label>

             <input class="form-control input-lg" name="lab_serv_days" type="text" >
          
           </div>
             
          
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo $close;?></button>
                <button type="button" class="btn btn-primary" onclick="submitemp2();" style="background: #fdb813 !important"><?php echo $save;?></button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
              
            </div>
            <!-- /.box-body -->

              </div></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; ">
                <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $laboratory_employees_list;?></h3>
               <div class="btn-group" style="margin-left: 85% !important">
                  <button type="button" class="btn btn-warning" style="background: #fdb813 !important"><?php echo $action;?></button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" style="background: #bd1e2c !important">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target="#myModalE"><?php echo $add_employee;?></a></li>
					<li><a href="#" ><?php echo $edit_employee;?></a></li>
                    <li><a href="#" data-toggle="modal" data-target="#myModalDel"><?php echo $delete_employee;?></a></li>
					
                  </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tableDel"   class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th><?php echo $full_name;?></th>
                  <th><?php echo $phone;?></th>
                  <th><?php echo $email;?></th>
                  <th><?php echo $department;?></th>
				  <th><?php echo $action;?></th>
                </tr>
                </thead>
                <tbody>
               <?php $counter=1;
               $lab_employes = $object->get_lab_employes_by_department();//print_r($lab_employes);
                if($lab_employes[0]!=""){
					for($i = 0;$i<count($lab_employes);$i++)
         {
			 if($lab_employes[$i]["cant_dep"] == 1)
			 {
				 ?>
				 <tr>
                   <td><?php echo $counter++;?></td>
				   
                   <td ><?php echo $lab_employes[$i]["employee_name"]; ?><?php echo " ".$lab_employes[$i]["employee_last_name"]; ?></td><td><?php echo $lab_employes[$i]["e_phone"]; ?></td><td><?php echo $lab_employes[$i]["e_email"]; ?></td><td><?php if($lang=='es'){echo $lab_employes[$i]["ld_name_es"]; }else{echo $lab_employes[$i]["ld_name_en"]; } ?></td>
				   <td><img src="../../views/assets/img/icon/edit.jpg" style="width:18px;height:15px;cursor:pointer" data-toggle="modal" data-target="#myModalEd<?php echo $lab_employes[$i]["id_employee"];  ?>"> 
				   <a href="edit_employee_department.php?lang=<?php echo $lang; ?>&id=<?php echo $lab_employes[$i]["id_employee"];  ?>"><img src="../../views/assets/img/icon/calendar.png" style="width:18px;height:18px;cursor:pointer" ></a>
				   <img src="../../views/assets/img/icon/delete.png" style="width:20px;height:20px;cursor:pointer" onclick="deleteEmp(<?php echo $lab_employes[$i]["id_employee"];  ?>)"></td>
				   </tr>
                   
				 <?php
			 }else{
				 if($lab_employes[$i]["id_employee"]!= $lab_employes[$i-1]["id_employee"])
				 {
               ?>
                 <tr >
                   <td rowspan="<?php echo $lab_employes[$i]["cant_dep"];?>"><?php echo $counter++;echo $lab_employes[$i]["cant_dep"];?></td>
				   
                   <td rowspan="<?php echo $lab_employes[$i]["cant_dep"]; ?>"><?php echo $lab_employes[$i]["employee_name"]; ?><?php echo " ".$lab_employes[$i]["employee_last_name"]; ?></td>
                   <td rowspan="<?php echo $lab_employes[$i]["cant_dep"]; ?>"><?php echo $lab_employes[$i]["e_phone"]; ?></td>
                   <td rowspan="<?php echo $lab_employes[$i]["cant_dep"]; ?>"><?php echo $lab_employes[$i]["e_email"]; ?></td>
                   <td ><?php if($lang=='es'){echo $lab_employes[$i]["ld_name_es"]; }else{echo $lab_employes[$i]["ld_name_en"]; } ?></td>
				   <td><img src="../../views/assets/img/icon/edit.jpg" style="width:18px;height:15px;cursor:pointer" data-toggle="modal" data-target="#myModalEd<?php echo $lab_employes[$i]["id_employee"];  ?>"> 
                     <a href="edit_employee_department.php?lang=<?php echo $lang; ?>&id=<?php echo $lab_employes[$i]["id_employee"];  ?>"><img src="../../views/assets/img/icon/calendar.png" style="width:18px;height:18px;cursor:pointer" ></a>
				   <img src="../../views/assets/img/icon/delete.png" style="width:20px;height:20px" onclick="deleteEmp(<?php echo $lab_employes[$i]["id_employee"];  ?>)"></td>
				   </tr>
				  
                  
				 <?php }
				 else{ ?>
                   <tr ><td><?php if($lang=='es'){echo $lab_employes[$i]["ld_name_es"]; }else{echo $lab_employes[$i]["ld_name_en"]; } ?></td><td></td></tr>
			    
			   <?php
				 }
			 }
			 ?>
			 <div class="modal" id="myModalEd<?php echo $lab_employes[$i]["id_employee"];  ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
				  <?php $array = $object->return_data_by_idEmp($lab_employes[$i]["id_employee"]);//echo print_r($array); ?>
                <h4 class="modal-title" style="color: #fdb813 !important"><?php echo $edit_employee." ".$array[0]["employee_name"]." ".$array[0]["employee_last_name"];?></h4>
              </div>
              <div class="modal-body">
                 <!-- Form Element sizes -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <!--h3 class="box-title">Different Height</h3-->
            </div>
            <div class="box-body">
               <form role="form" id="edit_emp<?php echo $lab_employes[$i]["id_employee"]; ?>" method="post" action="../../controllers/admin/edit_emp_lab.php">
                <input type="hidden" name="id_employee_ed" value="<?php echo $lab_employes[$i]["id_employee"]; ?>">
                
           
             
          
			 <div class="form-group">
                  <div class="col-xs-5">
                    
                  <label><?php echo $employee_name;?></label>

              <input class="form-control input-lg" name="name_edit" id="name_edit" type="text" value="<?php echo $array[0]["employee_name"]  ?>">
            
            </div>
            
                  <div class="col-xs-2">
                    
                  <label>MI</label>

              <input class="form-control input-lg" name="mi_edit" id="mi_edit" type="text" >
            </div>
            <div class="col-xs-5">
                    
                  <label><?php echo $last;?></label>

             <input class="form-control input-lg" name="last_name_edit" id="last_name_edit" type="text" value="<?php echo $array[0]["employee_last_name"]; ?>" >
            </div>
            
            </div>
			 <div class="form-group">
              <div class="col-xs-6">
                    
                  <label><?php echo $phone;?></label>

              <input class="form-control input-lg" name="phone_edit"  id="phone_edit" type="text" value="<?php echo $array[0]["e_phone"];  ?>" >
            
            </div>
             <div class="col-xs-6">
                    
                  <label><?php echo $email;?></label>

              <input class="form-control input-lg" name="email_edit" id="email_edit" type="text" value="<?php echo $array[0]["e_email"]; ?>" >
            
            </div>
           </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo $cancel;?></button>
                <button type="button" class="btn btn-primary" onclick="submitempEdit(<?php echo $lab_employes[$i]["id_employee"]; ?>);" style="background: #fdb813 !important"><?php echo $edit;?></button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
			 <?php
               }}else{?><tr><td ><?php echo $no_lab_employee; ?></td><td></td><td></td><td></td><td></td></tr><?php }
               

			  
                ?>
                
            
                </tbody>
              </table>
                <div class="example-modal">
        <div class="modal" id="myModalE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: #fdb813 !important"><?php echo $add_employee;?></h4>
              </div>
              <div class="modal-body">
                 <!-- Form Element sizes -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <!--h3 class="box-title">Different Height</h3-->
            </div>
            <div class="box-body">
               <form role="form" id="insert_emp" method="post" action="../../controllers/admin/add_emp_lab.php">
                <input type="hidden" name="id_user_hidde" value="<?php echo $id_user; ?>">
                <div class="form-group">
                  <div class="col-xs-5">
                    
                  <label><?php echo $employee_name;?></label>

              <input class="form-control input-lg" name="name" type="text" >
            
            </div>
            
                  <div class="col-xs-2">
                    
                  <label>MI</label>

              <input class="form-control input-lg" name="mi" type="text" >
            </div>
            <div class="col-xs-5">
                    
                  <label><?php echo $last;?></label>

             <input class="form-control input-lg" name="last_name" type="text" >
            </div>
            
            </div>
           <div class="form-group">
              <div class="col-xs-6">
                    
                  <label><?php echo $phone;?></label>

              <input class="form-control input-lg" name="phone" type="text" >
            
            </div>
             <div class="col-xs-6">
                    
                  <label><?php echo $email;?></label>

              <input class="form-control input-lg" name="email" type="text" >
            
            </div>
           </div>
		   
             <div class="form-group">
               <div class="col-xs-6">
			   <br>
               <label><?php echo $department;?></label>
               <select name="id_deparment[]" id="id_deparment" class="form-control input-lg" multiple="">
                 <option>-<?php echo $select;?>-</option>
                 <?php 
                     $all_deparments = $object->get_deparments();
                     foreach ($all_deparments as  $valuead) {
                       # code...
                      ?>
                      <option value="<?php echo $valuead['id_laboratory_department']; ?>"><?php echo $valuead["ld_name_en"]; ?></option>
                      <?php
                     }
                  ?>
               </select>
             </div>
			 <div class="col-xs-6">
                    
                  <label><?php echo "Fecha Inicio";?></label>

              <input class="form-control input-lg" name="initial_date" id="initial_date" type="text" data-inputmask="'alias': 'mm-dd-yyyy'" data-mask>
            
            </div>
             </div>
             
          <div class="form-group">
               
			 <div class="col-xs-12">
                    
                  <label><?php echo $user_type;?></label>
                  <select name="user_type" id="user_type" class="form-control input-lg" >
                 <option>-<?php echo $select;?>-</option>
                 <?php 
                     $user_type = $object->return_lab_user_types();
                     foreach ($user_type as  $valueu) {
                       # code...
                      ?>
                      <option value="<?php echo $valueu['id_user_type']; ?>"><?php echo $valueu["ut_name"]; ?></option>
                      <?php
                     }
                  ?>
               </select>
             
            
            </div>
             </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo $close;?></button>
                <button type="button" class="btn btn-primary" onclick="submitemp();" style="background: #fdb813 !important"><?php echo $save;?></button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		
        <!-- /.modal -->
		<div class="modal" id="myModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: #fdb813 !important"><?php echo $delete_employee;?></h4>
              </div>
              <div class="modal-body">
                 <!-- Form Element sizes -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <!--h3 class="box-title">Different Height</h3-->
            </div>
            <div class="box-body">
               <form role="form" id="delete_emp" method="post" action="../../controllers/admin/delete_emp_lab.php">
                <input type="hidden" name="id_user_hidde" value="<?php echo $id_user; ?>">
                
           
             
          <div class="form-group">
               
			 <div class="col-xs-12">
                    
                  <label><?php echo $employees;?></label>
                  <select name="users" id="users" class="form-control input-lg" >
                 <option>-<?php echo $select;?>-</option>
                 <?php 
                     $user_type = $object->get_lab_employes();
                     foreach ($user_type as  $valueu) {
                       # code...
					   ?>
                      <option value="<?php echo $valueu['id_employee']; ?>"><?php echo $valueu["employee_name"]." ".$valueu["employee_last_name"]; ?></option>
                     
                      <?php
                     }
                  ?>
               </select>
             
            
            </div>
             </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo $cancel;?></button>
                <button type="button" class="btn btn-primary" onclick="submitempDelete();" style="background: #fdb813 !important"><?php echo $delete;?></button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
              
            </div>
            <!-- /.box-body -->

              </div></div>
              <div class="chart tab-pane" id="sales-chart2" style="position: relative; ">
                <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $proc_list;?></h3>
               <div class="btn-group" style="margin-left: 90% !important">
                  <button type="button" class="btn btn-warning" style="background: #fdb813 !important"><?php  echo $action;?></button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" style="background: #bd1e2c !important">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target="#myModalP"><?php echo $add_procedure;?></a></li>
                  
                  </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table border="1"  style="width:100%" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th><?php echo $prothesis;?></th>
                  <th><?php echo $material;?></th>
                  <th><?php echo $lab_service_name;?></th>
                </tr>
                </thead>
                <tbody>
               <?php $count_proc=1;
               $procedures = $object->get_procedures();$services='';
               if($procedures[0]!='')
         {
         foreach ($procedures as $valuep) {
                 $proc_id=$valuep["id_lab_procedure"];
         $services = $object->get_services($proc_id);
          ?>
                <tr>
                <td rowspan="<?php echo $services[0]["total_serv"];?>"><?php echo $count_proc++;?></td>
                <td rowspan="<?php echo $services[0]["total_serv"];?>"><?php if($lang == 'es'){echo $valuep["pt_name_es"];}if($lang == 'en'){echo $valuep["pt_name_en"];} ?></td>
               
                <td rowspan="<?php echo $services[0]["total_serv"];?>"><?php if($valuep["lp_material_es"]!=""){if($lang == 'es'){echo $valuep["lp_material_es"];}if($lang == 'en'){echo $valuep["lp_material_en"];}}else{echo "N/A";} ?></td>
                <td><?php if($lang == 'es'){echo $services[0]["name_es"];}else{echo $services[0]["name_en"];} ?></td>
                </tr>
                <?php for($i=1;$i<$services[0]["total_serv"];$i++)
              {?>
        <tr>    
                <td><?php if($lang == 'es'){ echo $services[$i]["name_es"];}else{echo $services[$i]["name_en"];}?></td>
                </tr>  
              
           <?php } 
               }
         }
         else
         {?>
        <tr><td colspan="5"><?php echo $no_procedures;?></td></tr-->   
      <?php }
                ?>
                
            
                </tbody>
              </table>
                <div class="example-modal">
        <div class="modal" id="myModalP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: #fdb813 !important"><?php echo $add_procedure;?></h4>
              </div>
              <div class="modal-body">
                 <!-- Form Element sizes -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <!--h3 class="box-title">Different Height</h3-->
            </div>
            <div class="box-body">
               <form role="form" id="insert_procedure" method="post" action="../../controllers/admin/add_procedure.php">
                <input type="hidden" name="id_user_hidde" value="<?php echo $id_user; ?>">
                <div class="form-group">
                  <div class="col-xs-4">
                    
                  <label><?php echo $prothesis; $ax3 = $object->return_prothesis_type();//echo print_r($ax); ?></label>
                  <select id="protesis_type" name="protesis_type" class="form-control input-sm" onchange="show_denture_type()">
                    <option>-<?php echo $select;?>-</option>
                    <?php
                   
                    
                     foreach ($ax3 as $valuead3) {
                       # code...
                      ?>
                      <option value="<?php echo $valuead3['id_prothesis_type']; ?>"><?php if($lang == 'en'){echo $valuead3["pt_name_en"];}if($lang == 'es'){echo $valuead3["pt_name_es"];}  ?></option>
                      <?php
                     }
                  
                     ?>
                  </select> 
              
            
            </div>
           
            <div id="material_hidde" style="display: none">
             <div class="col-xs-4">
                    
                  <label><?php echo $material;?></label>
                  <select id="material" name="material" class="form-control input-sm">
                    <option >-<?php echo $select;?>-</option>
                     <?php
                    $ax22 = $object->return_material();
                    
                     foreach ($ax22 as $valuead22) {
                       # code...
                      ?>
                      <option value="<?php echo $valuead22['id_material']; ?>"><?php if($lang == 'en'){echo $valuead22["lp_material_en"];}if($lang == 'es'){echo $valuead22["lp_material_es"];}  ?></option>
                      <?php
                     }
                  
                     ?>
                  </select>
             
            
            </div>
           </div>
            <div id="steps_hidden2" style="display: none">
              <div class="form-group">
                  <div class="col-xs-6">
                    
                  <label><?php echo $steps;?></label><br>
                  <input type="text" name="services_crown" value="Crown" disabled="disabled" class="form-control input-sm">
                  <input type="hidden" name="value_crown" value="2">
                  <input type="hidden" name="value_crown_steps" value="10">
                  <input type="hidden" name="langu" value="<?php echo $lang; ?>">
                  </div>
           
             
            </div>
            </div>
            <div id="all_services" style="display: none">
            <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label><?php echo $steps;?></label><br>

              <select id="example-multiple-selected" multiple="multiple" name="services[]" class="form-control input-lg">
  
                <?php
                 $modules = $object->get_lab_services();
                 foreach ($modules as $valuem) {
                  ?>
                  <option value="<?php echo $valuem['id_procedure_step'] ?>"><?php echo $valuem["ps_name_en"]; ?></option>
                  <?php
                 }
                 ?>
              </select>
            </div>
           
             
            </div></div>
            
          
              </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo $close;?></button>
                <button type="button" class="btn btn-primary" onclick="submitproc();" style="background: #fdb813 !important"><?php echo $save;?></button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
              
            </div>
            <!-- /.box-body -->
              </div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->

          

          

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
      
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  </div>
  <!-- /.content-wrapper -->
  <?php include("../templates/footer.php") ?>

 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../assets/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/app.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap-multiselect.js"></script>
<script type="text/javascript" src="../assets/dist/js/dropdown.min.js"></script>
<!-- InputMask -->
<script src="../assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script type="text/javascript">
    $('#id_deparment').multiselect();
	
</script>
<script>

  $(function () {
    $("#table1").DataTable();
    $("#table3").DataTable();
    $("#table4").DataTable();
    
    $('#table2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
<script type="text/javascript">
 
$(document).ready(function(){
$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
localStorage.setItem('activeTab', $(e.target).attr('href'));
// alert(localStorage.getItem('activeTab'));
});       
}); 
</script>
<script type="text/javascript">
var english = {"sProcessing": "Processing...",
                 "sLengthMenu": "Show _MENU_ entries",
                 "sZeroRecords": "There are 0 results",
                 "sInfo": "Showing from _START_ to _END_ de _TOTAL_ registros",
                 "sInfoEmpty": "There are 0 entries",
                 "sInfoFiltered": "(filtrado de un total de _MAX_ líneas)",
                 "sInfoPostFix": "",
                 "sSearch": "Search:",
                 "oPaginate": {
            "sFirst":    "First",
            "sLast":    "Last",
            "sNext":    "Next",
            "sPrevious": "Previous"
        },
                 "sUrl": ""
              };    
var espanol = {"sProcessing": "Procesando...",
                 "sLengthMenu": "Mostrar _MENU_ registros",
                 "sZeroRecords": "No se encontraron resultados",
                 "sInfo": "Mostrando desde _START_ hasta _END_ de _TOTAL_ registros",
                 "sInfoEmpty": "No existen registros",
                 "sInfoFiltered": "(filtrado de un total de _MAX_ líneas)",
                 "sInfoPostFix": "",
                 "sSearch": "Buscar:",
                "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
                 "sUrl": ""
              };

var currentLang = espanol;
var currentLang2 = english;
$(document).ready(function()
{ 
  //var dtable = $('#datatable-buttons').dataTable( {"oLanguage": english} );
    var dtable = $('#table2').dataTable();
    dtable.fnDestroy();
    dtable = null;
    //currentLang = (currentLang == english) ? espanol : english;
    <?php 
    if($lang == 'es')
    {
      ?>
      dtable = $('#table2').dataTable( {"oLanguage": currentLang} ); 
      <?php
    }
    if($lang == 'en')
    {
        ?>
         dtable = $('#table2').dataTable( {"oLanguage": currentLang2} ); 
         <?php
    }
     ?>  
    
    
} );
$(document).ready(function()
{ 
  //var dtable = $('#datatable-buttons').dataTable( {"oLanguage": english} );
    var dtable = $('#table3').dataTable();
    dtable.fnDestroy();
    dtable = null;
    //currentLang = (currentLang == english) ? espanol : english;
    <?php 
    if($lang == 'es')
    {
      ?>
      dtable = $('#table3').dataTable( {"oLanguage": currentLang} ); 
      <?php
    }
    if($lang == 'en')
    {
        ?>
         dtable = $('#table3').dataTable( {"oLanguage": currentLang2} ); 
         <?php
    }
     ?>  
    
    
} );
$(document).ready(function()
{ 
  //var dtable = $('#datatable-buttons').dataTable( {"oLanguage": english} );
    var dtable = $('#table4').dataTable();
    dtable.fnDestroy();
    dtable = null;
    //currentLang = (currentLang == english) ? espanol : english;
    <?php 
    if($lang == 'es')
    {
      ?>
      dtable = $('#table4').dataTable( {"oLanguage": currentLang} ); 
      <?php
    }
    if($lang == 'en')
    {
        ?>
         dtable = $('#table4').dataTable( {"oLanguage": currentLang2} ); 
         <?php
    }
     ?>  
    
    
} );
$(document).ready(function()
{ 
  //var dtable = $('#datatable-buttons').dataTable( {"oLanguage": english} );
    var dtable = $('#table1').dataTable();
    dtable.fnDestroy();
    dtable = null;
    //currentLang = (currentLang == english) ? espanol : english;
    <?php 
    if($lang == 'es')
    {
      ?>
      dtable = $('#table1').dataTable( {"oLanguage": currentLang} ); 
      <?php
    }
    if($lang == 'en')
    {
        ?>
         dtable = $('#table1').dataTable( {"oLanguage": currentLang2} ); 
         <?php
    }
     ?>  
    
    
} );
</script>
<?php
if($_GET)
{
  if($_GET['active'] == 2)
  {
    ?>
    <script type="text/javascript">       
    $(document).ready(function()
    {
		
      var activeTab = localStorage.getItem('activeTab');
      if(activeTab)
      {
        $('#myTab2 a[href="' + activeTab + '"]').tab('show');
      }
    });    
    </script>
    <?php
  }    
  if($_GET['active'] == 1)
  {
  ?>
    <script type="text/javascript">      
    $(document).ready(function()
    {
      var activeTab = localStorage.getItem('activeTab');
      if(activeTab)
      {
        $('#myTab2 a[href="' + activeTab + '"]').tab('show');
      }
    });    
    </script>
  <?php
  }
  }
 ?>
 <script type="text/javascript">
 $(document)
    .ready(function() {
      $('.ui.fluid.dropdown').dropdown();
     
    })
  ;
  $("#initial_date").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});

  
 </script>
</body>
</html>
 
