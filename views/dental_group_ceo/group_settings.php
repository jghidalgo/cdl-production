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
$group = $object->return_group_by_ceo($id_user);
$id_group = $group[0]["id_group"];
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
  <script type="text/javascript">
      function submit()
      {
           // alert("OK");
           document.getElementById("insert_office").submit();
      }
      function submit2()
      {
           // alert("OK");
           document.getElementById("insert_group").submit();
      }
      function submit3()
      {
           // alert("OK");
           document.getElementById("insert_employee").submit();
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
  <?php include("../templates/header_ceo.php"); ?>
  <!-- Left side column. contains the logo and sidebar -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $group_seettings;?>
        <small><?php echo $gs_path;?></small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#sales-chart2" data-toggle="tab"><?php echo $group;?></a></li>
              <li ><a href="#revenue-chart" data-toggle="tab"><?php echo $offices;?></a></li>
              <li><a href="#sales-chart" data-toggle="tab"><?php echo $employees;?></a></li>
              
              <!--li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li-->
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane" id="revenue-chart" style="position: relative;">
                <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $offices_list;?></h3>
               <div class="btn-group" style="margin-left: 90% !important">
                  <button type="button" class="btn btn-warning" style="background: #fdb813 !important"><?php echo $action;?></button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" style="background: #bd1e2c !important">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target="#myModal"><?php echo $add_office;?></a></li>
                    
                  </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><?php echo $office_name;?></th>
                  <th><?php echo $address;?></th>
                  <th><?php echo $unit;?></th>
                  <th><?php echo $city;?></th>
                  <th><?php echo $state;?></th>
                  <th><?php echo $zipcode;?></th>
                </tr>
                </thead>
                <tbody>
               <?php
               
               $arr_office = $object->get_office($id_group);
			   if($arr_office[0]!='')
			   {
               foreach ($arr_office as $value3) {
                ?>
                <tr>
                  <td><?php echo $value3["o_name"]; ?></td>
                  <td><?php echo $value3["o_address"]; ?></td>
                  <td><?php echo $value3["o_unit"]; ?></td>
                  <td><?php echo $value3["o_city"]; ?></td>
                  <td><?php echo $value3["o_state"]; ?></td>
                  <td><?php echo $value3["o_zipcode"]; ?></td>
                  </tr>
                <?php
               }}else
			   {?>
				 <tr>
                   <td colspan="6"><?php echo $no_offices; ?></td>
                 </tr>  
			<?php	   
				}
                ?>
                
            
                </tfoot>
              </table>
                <div class="example-modal">
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: #fdb813 !important"><?php echo $add_office;?></h4>
              </div>
              <div class="modal-body">
                 <!-- Form Element sizes -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <!--h3 class="box-title">Different Height</h3-->
            </div>
            <div class="box-body">
               <form role="form" id="insert_office" method="post" action="../../controllers/dental_group_ceo/add_office.php">
                <input type="hidden" name="id_user_hidde" value="<?php echo $id_user; ?>">
                <input type="hidden" name="group_id" value="<?php echo $id_group; ?>">
                <input type="hidden" name="lang" value="<?php echo $lang; ?>">
                <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label><?php echo $office_name;?></label>

              <input class="form-control input-lg" name="office" type="text" >
            
            </div>
            </div>
            <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label><?php echo $email;?></label>

              <input class="form-control input-lg" name="email" type="text">
            
            </div>
            </div>
            <div class="form-group"><div class="col-xs-9">
                  <label><?php echo $address;?></label>
                  
              <input class="form-control input-lg" name="address" type="text">
               </div>
              <div class="col-xs-3">
                  <label><?php echo $unit;?></label>
              <input class="form-control input-lg" name="unit" type="text">
            </div>
            </div>
            <div class="form-group">
              <div class="col-xs-6">
                  <label><?php echo $city;?></label>
              <input class="form-control input-lg" name="city" type="text" >
            </div>
            </div>
            <div class="form-group">
              <div class="col-xs-6">
                  <label><?php echo $state;?></label>
              <input class="form-control input-lg" name="state" type="text" >
            </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12">
                  <label><?php echo $zipcode;?></label>
              <input class="form-control input-lg" name="zipcode" type="text" >
            </div>
            </div>
              <div class="form-group">
                <div class="col-xs-12">
                  <label><?php echo $billing_seettings;?></label>
                <select name="finanzas" class="form-control input-lg">
                  <option>-<?php echo $select;?>-</option>
                  <option value="2"><?php echo $group_billing;?></option>
                  <option value="1"><?php echo $independent_billing;?></option>
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
                <button type="button" class="btn btn-primary" onclick="submit();" style="background: #fdb813 !important"><?php echo $save;?></button>
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
              <div class="chart tab-pane" id="sales-chart" style="position: relative; ">
               
               <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $employees_list;?></h3>
               <div class="btn-group" style="margin-left: 90% !important">
                  <button type="button" class="btn btn-warning" style="background: #fdb813 !important"><?php echo $action;?></button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" style="background: #bd1e2c !important">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target="#myModal3"><?php echo $add_employee;?></a></li>
                    
                  </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><?php echo $full_name;?></th>
                  <th><?php echo $phone;?></th>
                  <th><?php echo $email;?></th>
                  
                </tr>
                </thead>
                <tbody>
               <?php
               $arr_employees = $object->get_employees($id_group);
			   if($arr_employees[0]!='')
			   {
               foreach ($arr_employees as $valuee) {
               ?>
                <tr>
                  <td><?php echo $valuee["u_name"]; ?> <?php echo $valuee["u_middle_name"]; ?> <?php echo $valuee["u_last_name"]; ?></td>
                  <td><?php echo $valuee["e_phone"]; ?></td>
                  <td><?php echo $valuee["e_email"]; ?></td>
                </tr>
                <?php
               }}
			   else
			   {?>
				    <tr>
                     <td colspan="3"><?php echo $no_employee; ?></td>
                    </tr>
				<?php
				  }
                ?>
                
            
                </tfoot>
              </table>
                <div class="example-modal">
        <div class="modal" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
            <?php if($arr_office[0]!=''){?>
               <form role="form" id="insert_employee" method="post" action="../../controllers/dental_group_ceo/add_employee.php">
                <input type="hidden" name="id_user_hidde" value="<?php echo $id_user; ?>">
                <input type="hidden" name="lang" value="<?php echo $lang; ?>">
                <div class="form-group">
                  <div class="col-xs-5">
                    
                  <label><?php echo $first_name;?></label>

              <input class="form-control input-lg" name="name_employee" type="text" >
            
            </div>
            <div class="col-xs-2">
                    
                  <label><?php echo $middle_name;?></label>

              <input class="form-control input-lg" name="mi" type="text" >
            
            </div>
            <div class="col-xs-5">
                    
                  <label><?php echo $last;?></label>

              <input class="form-control input-lg" name="last_employee" type="text" >
            
            </div>
            </div>
            <div class="form-group">
                  <div class="col-xs-6">
                    
                  <label><?php echo $user;?></label>

              <input class="form-control input-lg" name="user_par" type="text" >
            
            </div>
            
            <div class="col-xs-6">
                    
                  <label><?php echo $password;?></label>

              <input class="form-control input-lg" name="pass" type="password" >
            
            </div>
            </div>
            <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label><?php echo $email;?></label>

              <input class="form-control input-lg" name="email_employee" type="text" >
            
            </div>
            </div>
            <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label><?php echo $phone;?></label>

              <input class="form-control input-lg" name="phone_employee" type="text" >
            
            </div>
            </div>
            <div class="form-group">
               <div class="col-xs-12">
               <label><?php echo $office;?></label>
               <select name="office_id" class="form-control input-lg">
                 <option>-<?php echo $select;?>-</option>
                 <?php 
                     $all_office = $object->get_office($id_group);
                     if($all_office[0]!='')
					 {
					 foreach ($all_office as $valuead) {
                       # code...
                      ?>
                      <option value="<?php echo $valuead['id_office']; ?>"><?php echo $valuead["o_name"]; ?></option>
                      <?php
                     }}
                  ?>
               </select>
             </div>
             </div>
            
         
            
          
              </form>
              <?php }
			  else{?><label><?php echo $first_insert_office;?></label><?php }?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo $close;?></button>
                 <?php if($arr_office[0]!=''){?>
                <button type="button" class="btn btn-primary" onclick="submit3();" style="background: #fdb813 !important"><?php echo $save;?></button>
                <?php }?>
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
              <div class="chart tab-pane  active" id="sales-chart2" style="position: relative; ">
                
               <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $group_info; ?></h3>
               <div class="btn-group" style="margin-left: 90% !important">
                  <button type="button" class="btn btn-warning" style="background: #fdb813 !important"><?php echo $action;?></button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" style="background: #bd1e2c !important">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target="#myModal2"><?php echo $modify_group;?></a></li>
                    
                  </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th><?php echo $group_name;?></th>
                  <th><?php echo $group_ceo;?></th>
                  <th><?php echo $license;?></th>
                  <th><?php echo $address;?></th>
                </tr>
                </thead>
                <tbody>
               <?php
               $groups = $object->return_group_by_ceo($id_user);
               foreach ($groups as $keyg => $valueg) {
                 # code...
                ?>
                <tr>
                  <td><?php echo $valueg["g_name"]; ?></td>
                  <td><?php echo $valueg["u_name"]; ?> <?php echo $valueg["u_middle_name"]; ?> <?php echo $valueg["u_last_name"]; ?></td>
                  <td><?php echo $valueg["d_license"]; ?></td>
                  <td><?php echo $valueg["g_address"]; ?> <?php echo $valueg["g_unit"]; ?> <?php echo $valueg["g_city"]; ?> <?php echo $valueg["g_state"]; ?> <?php echo $valueg["g_zipcode"]; ?></td></tr>
                <?php
               }
                ?>
                
            
                </tfoot>
              </table>
                <div class="example-modal">
        <div class="modal" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: #fdb813 !important">Adicionar Grupo</h4>
              </div>
              <div class="modal-body">
                 <!-- Form Element sizes -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <!--h3 class="box-title">Different Height</h3-->
            </div>
            <div class="box-body">
               <form role="form" id="insert_group" method="post" action="../../controllers/dental_group_ceo/add_group.php">
                <input type="hidden" name="id_user_hidde" value="<?php echo $id_user; ?>">
                <input type="hidden" name="lang" value="<?php echo $lang; ?>">
                <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label><?php echo $group_name;?></label>

              <input class="form-control input-lg" name="group" type="text" >
            
            </div>
            </div>
            <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label><?php echo $license;?></label>

              <input class="form-control input-lg" name="licence" type="text" >
            
            </div>
            </div>
            <div class="form-group">
                  <div class="col-xs-5">
                    
                  <label><?php echo $address;?></label>

              <input class="form-control input-lg" name="address_ceo" type="text" >
            
            </div>
            </div>
            <div class="form-group">
                  <div class="col-xs-2">
                    
                  <label><?php echo $unit;?></label>

              <input class="form-control input-lg" name="unit_ceo" type="text" >
            
            </div>
            </div>
             <div class="form-group">
                  <div class="col-xs-5">
                    
                  <label><?php echo $city;?></label>

              <input class="form-control input-lg" name="city_ceo" type="text" >
              
                       
            </div>
            </div>
            <div class="form-group">
                  <div class="col-xs-2">
                    
                  <label><?php echo $state;?></label>

              <input class="form-control input-lg" name="state_ceo" type="text" >
            
            </div>
            </div><br>
            <div class="form-group">
                  <div class="col-xs-3">
                    
                  <label><?php echo $zipcode;?></label>

              <input class="form-control input-lg" name="zipcode_ceo" type="text" >
            
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
  <?php include("../templates/footer.php"); ?>

  
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

<!-- DataTables -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $("#example3").DataTable();
    $('#example2').DataTable({
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
    var dtable = $('#example2').dataTable();
    dtable.fnDestroy();
    dtable = null;
    //currentLang = (currentLang == english) ? espanol : english;
    <?php 
    if($lang == 'es')
    {
      ?>
      dtable = $('#example2').dataTable( {"oLanguage": currentLang} ); 
      <?php
    }
    if($lang == 'en')
    {
        ?>
         dtable = $('#example2').dataTable( {"oLanguage": currentLang2} ); 
         <?php
    }
     ?>  
    
    
} );
$(document).ready(function()
{ 
  //var dtable = $('#datatable-buttons').dataTable( {"oLanguage": english} );
    var dtable = $('#example3').dataTable();
    dtable.fnDestroy();
    dtable = null;
    //currentLang = (currentLang == english) ? espanol : english;
    <?php 
    if($lang == 'es')
    {
      ?>
      dtable = $('#example3').dataTable( {"oLanguage": currentLang} ); 
      <?php
    }
    if($lang == 'en')
    {
        ?>
         dtable = $('#example3').dataTable( {"oLanguage": currentLang2} ); 
         <?php
    }
     ?>  
    
    
} );

$(document).ready(function()
{ 
  //var dtable = $('#datatable-buttons').dataTable( {"oLanguage": english} );
    var dtable = $('#example1').dataTable();
    dtable.fnDestroy();
    dtable = null;
    //currentLang = (currentLang == english) ? espanol : english;
    <?php 
    if($lang == 'es')
    {
      ?>
      dtable = $('#example1').dataTable( {"oLanguage": currentLang} ); 
      <?php
    }
    if($lang == 'en')
    {
        ?>
         dtable = $('#example1').dataTable( {"oLanguage": currentLang2} ); 
         <?php
    }
     ?>  
    
    
} );
</script>
</body>
</html>
