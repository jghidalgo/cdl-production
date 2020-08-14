<?php
include("../../models/admin.php");
$object = new Admin();
session_start();
$user = $_SESSION['user'];
$id_user = $_SESSION['id_user'];

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
$id_employee = $_GET["id"];
$arrayTT = $object->return_data_by_idEmp($id_employee);
$array = $object->get_employee_by_id($id_user);
$array2 = $object->get_user_by_id($id_user);
$id_user_type = $array2[0]["id_user_type"];
$array_module = $object->get_module_by_user($id_user_type);
$lang=$_GET["lang"];
   
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
  <?php include("../templates/header_admin.php"); ?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
        
      <h1 style="color: #959594 !important">
        <?php echo $edit_employee_department;?>
        <!--small>Laboratorios/Empleados</small-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i><?php echo $admin;?></a></li>
        <li class="active"><?php echo $edit_employee_department;?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form name="case" id="case" method="POST" action="" role="form" >
       
      <div class="row">
	  
      <div class="col-md-12">
       <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title" style="color: #f39c12 !important"><?php echo $arrayTT[0]["employee_name"]." ".$arrayTT[0]['employee_last_name'];?></h3>
            </div>
            <div class="box-body">
              
              
                
                <div class="col-xs-4">
                  <label style="font-size: 17px !important;color: #959594 !important">
                    <?php echo $department;?></label>
                  <select name="id_deparment[]" id="id_deparment" class="form-control input-lg" multiple="">
                 
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
                  <div class="col-xs-4">
                
                <label style="font-size: 17px !important;color: #959594 !important">
                  <?php echo $start_date;?></label>
                  <input class="form-control input-lg" name="initial_date" id="initial_date" type="text" data-inputmask="'alias': 'mm-dd-yyyy'" data-mask><br>
                  <button type="button" class="btn btn-default" ><?php echo $add;?></button>
                  <a href="departments_employees.php?active=2&lang=<?php echo $lang; ?>"><button type="button" class="btn btn-default" ><?php echo $back;?></button></a>
				</div>
				
                
				
				
              </div>
			  
			  
              
              
            </div>
			<div class="box box-warning">
			    <div class="box-header with-border">
              <h3 class="box-title" style="color: #f39c12 !important"><?php echo $department;?></h3>
            </div>
			<div class="box-body">
			  <div class="col-xs-12">
			 
		       <table id="table4" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th><?php echo $department;?></th>
                  <th><?php echo $start_date;?></th>
                  <th><?php echo $end_date;?></th>
				   <th><?php echo $action;?></th>
                </tr>
                </thead>
                <tbody>
                 <?php
					foreach($arrayTT as $tr)
					{
						?>
						<tr>
						<td><?php if($lang == 'es'){echo $tr["ld_name_es"];}else{echo $tr["ld_name_es"];} ?></td><td><?php echo $tr["start_date"]; ?></td><td><?php echo $tr["end_date"]; ?></td>
						<td><img src="../../views/assets/img/icon/close.png" style="width:20px;height:20px;cursor:pointer" title="<?php echo $down; ?>"> <img src="../../views/assets/img/icon/delete.png" style="width:20px;height:20px;cursor:pointer" title="<?php echo $delete; ?>"></td>
						</tr>
						<?php
					}
				 ?>
                
            
                </tbody>
              </table>
		   </div>
			</div>
			</div>
            <!-- /.box-body -->
          </div>
		   
          <!-- /.box -->
        </div>
        
       
          <!-- /.box -->
        </div>

      </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
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
 $("#table4").DataTable();

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
 $('#id_deparment2').multiselect();
  </script>
</body>
</html>
