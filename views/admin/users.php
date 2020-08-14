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


  <script type="text/javascript">
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
  <?php include("../templates/header_admin.php"); ?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $users;?>/<?php echo $user_types;?>
        <!--small>Laboratorios/Empleados</small-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i><?php echo $admin;?></a></li>
        <li class="active"><?php echo $users;?></li>
      </ol>
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
              <li class="active"><a href="#users" data-toggle="tab"><?php echo $users;?></a></li>
              <li ><a href="#user_types" data-toggle="tab"><?php echo $user_types;?></a></li>
              
          
              
              <!--li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li-->
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="tab-pane active" id="users" style="position: relative; ">
                <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $users_list;?></h3>
               <div class="btn-group" style="margin-left: 90% !important">
                  <button type="button" class="btn btn-warning" style="background: #fdb813 !important"><?php echo $action;?></button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" style="background: #bd1e2c !important">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target="#myModal"><?php echo $add_user;?></a></li>
                   
                  </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><?php echo $user;?></th>
                  <th><?php echo $password;?></th>
                  <th><?php echo $user_type;?></th>
                 
                </tr>
                </thead>
                <tbody>
               <?php
               $users = $object->users();
               foreach ($users as $value4) {
                 # code...
                ?>
                <tr><td><?php echo $value4["u_username"]; ?></td><td><?php echo $value4["u_password"]; ?></td>
                  <td><?php echo $value4["ut_name"]; ?>
                    
                  </td>
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
                <h4 class="modal-title" style="color: #fdb813 !important"><?php echo $add_user;?></h4>
              </div>
              <div class="modal-body">
                 <!-- Form Element sizes -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <!--h3 class="box-title">Different Height</h3-->
            </div>
            <div class="box-body">
               <form role="form" id="insert_office" method="post" action="../../controllers/admin/add_user.php">
                <input type="hidden" name="id_user_hidde" value="<?php echo $id_user; ?>">
                <input type="hidden" name="lang" value="<?php echo $lang; ?>">
                 <div class="form-group">
                  <div class="col-xs-5">
                    
                  <label><?php echo $first_name;?></label>

              <input class="form-control input-lg" name="name_user" type="text" >
            
            </div>
            </div>
            <div class="form-group">
                  <div class="col-xs-2">
                    
                  <label><?php echo $middle_name;?></label>

              <input class="form-control input-lg" name="s_name_user" type="text" >
            
            </div>
            </div>
            <div class="form-group">
                  <div class="col-xs-5">
                    
                  <label><?php echo $last;?></label>

              <input class="form-control input-lg" name="l_name_user" type="text" >
            
            </div>
            </div>
                <div class="form-group">
                  <div class="col-xs-6">
                    
                  <label><?php echo $user;?></label>

              <input class="form-control input-lg" name="user" type="text" >
            
            </div>
            </div>
            <div class="form-group">
                  <div class="col-xs-6">
                    
                  <label><?php echo $password;?></label>

              <input class="form-control input-lg" name="password" type="password" >
            
            </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12">
                  <label><?php echo $user_type;?></label>
                  <select class="form-control input-lg" name="user_type" id="user_type" onchange="showAddress()">
                    <option>-<?php echo $select;?>-</option>
                    <?php
                      $user_types = $object->return_user_type();
                      foreach ($user_types as $keyut => $valueut) {
                        # code...
                        if($valueut['id_user_type'] != '2' && $valueut['id_user_type'] != '3' && $valueut['id_user_type'] != '4' && $valueut['id_user_type'] != '5'){
                        ?>

                        <option value="<?php echo $valueut['id_user_type'];?>"><?php echo  $valueut['ut_name']; ?></option>
                        <?php
                       }
                      }
                     ?>
                  </select>
            
             
            </div>
            
           <div id="add_ress" style="display: none"> 
             <div class="form-group">
                  <div class="col-xs-5">
                    
                  <label><?php echo $group_name;?></label>

              <input class="form-control input-lg" name="group" type="text" >
            
            </div>
            </div>
             <div class="form-group">
                  <div class="col-xs-5">
                    
                  <label><?php echo $license;?></label>

              <input class="form-control input-lg" name="license_ceo" type="text" >
            
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
            <div class="form-group">
                  <div class="col-xs-12"><br>
           <table border="1" style="width:400px">
                <thead>
                <tr>
                  <th>No.</th>
                  <th><?php echo $proc_name;?></th>
                  <th><?php echo $lab_service_name;?></th>
                  <th><?php echo $cost;?></th>
                  <th><?php echo $vip_cost;?></th>
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
				 
				 //Aqui hay que mandar los id del procedimientos dinamicos
				  ?> 
                 
                  <input type="hidden" name="proc_id" value="<?php echo $proc_id; ?>">
                <tr>
                <td rowspan="<?php echo $services[0]["total_serv"];?>"><?php echo $count_proc++;?></td>
                <td rowspan="<?php echo $services[0]["total_serv"];?>"><?php if($lang == 'es'){echo $valuep["lp_name_es"];}if($lang == 'en'){echo $valuep["lp_name_en"];} ?></td>
                <td><?php if($lang == 'es'){echo $services[0]["ps_name_es"];}else{echo $services[0]["ps_name_en"];} ?></td>
                <td><input class="form-control input-lg" name="serv_cost+'<?php echo $services[0]["id_lp_ps"];?>'" type="text" ></td>
                <td><input class="form-control input-lg" name="rush_cost+'<?php echo $services[0]["id_lp_ps"];?>'" type="text" ></td>
                </tr>
                <?php for($i=1;$i<$services[0]["total_serv"];$i++)
				      {?>
				<tr>		
                <td><?php echo $services[$i]["ps_name_es"];?></td>
                <td><input class="form-control input-lg" name="serv_cost+'<?php echo $services[$i]["id_lp_ps"];?>'" type="text" ></td>
                <td><input class="form-control input-lg" name="rush_cost+'<?php echo $services[$i]["id_lp_ps"];?>'" type="text" ></td>
                </tr>  
						  
					 <?php } 
               }
			   }
			   else
			   {?>
				<tr><td colspan="5"><?php echo $no_procedures;?></td></tr>   
			<?php }
                ?>
                
            
                </tbody>
              </table>
              </div>
            </div>
              </form>
            </div>
           
            
            
           
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
              
            
            <!-- /.box-body -->
          </div>
              </div></div></div>
              <div class="tab-pane" id="user_types" style="position: relative; ">
                
              <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $user_types_title;?></h3>
               <div class="btn-group" style="margin-left: 90% !important">
                  <button type="button" class="btn btn-warning" style="background: #fdb813 !important"><?php echo $action;?></button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" style="background: #bd1e2c !important">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target="#myModal4"><?php echo $add_user_type;?></a></li>
                    
                  </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><?php echo $user_type;?></th>
                  <th><?php echo $description;?></th>
                  
                 
                </tr>
                </thead>
                <tbody>
               <?php
               $type_users = $object->get_type_users();
               foreach ($type_users as $value5) {
                 # code...
                ?>
                <tr><td><?php echo $value5["ut_name"]; ?></td><td><?php echo $value5["ut_description"]; ?></td>
                  
                </tr>
                <?php
               }
                ?>
                
            
                </tfoot>
              </table>
                <div class="example-modal">
        <div class="modal" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: #fdb813 !important"><?php echo $add_user_type;?></h4>
              </div>
              <div class="modal-body">
                 <!-- Form Element sizes -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <!--h3 class="box-title">Different Height</h3-->
            </div>
            <div class="box-body">
               <form role="form" id="insert_type_user" method="post" action="../../controllers/admin/add_type_user.php">
                <input type="hidden" name="id_user_hidde" value="<?php echo $id_user; ?>">
                <input type="hidden" name="lang" value="<?php echo $lang; ?>">
                <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label><?php echo $user_type;?></label>

              <input class="form-control input-lg" name="type_user" type="text" >
            
            </div>
            </div>
            <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label><?php echo $description;?></label>

              <input class="form-control input-lg" name="description" type="text" >
            
            </div>
            </div>
             <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label><?php echo $module;?></label>
                <!-- Note the missing multiple attribute! -->
<select id="example-multiple-selected" multiple="multiple" name="modules[]" class="form-control input-lg" >
  
                <?php
                 $modules = $object->get_modules();
                 foreach ($modules as $keym => $valuem) {
                   # code...
                  ?>
                  <option value="<?php echo $valuem['id_module'] ?>"><?php echo $valuem["m_name"]; ?></option>
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
                <button type="button" class="btn btn-primary" onclick="submitTypeUser();" style="background: #fdb813 !important"><?php echo $save;?></button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
              
            
            <!-- /.box-body --> 

              </div></div></div>
              
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
  
<script>
  $(function () {
    $("#table1").DataTable();
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
    $('#example-multiple-selected').multiselect();
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

</script>
</body>
</html>
